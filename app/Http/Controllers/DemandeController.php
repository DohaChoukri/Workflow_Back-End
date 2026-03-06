<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DemandeController extends Controller
{
    public function index()
    {
        // Important: charger les relations
        return Demande::with(['client', 'produits', 'progress'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'remise' => 'nullable|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'motif' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
            'progress_id' => 'nullable|exists:progresses,id',
            'produits' => 'required|array|min:1',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|numeric|min:1',
            'produits.*.prix_initial' => 'required|numeric',
            'produits.*.prix_promo' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            // Créer la demande
            $demande = Demande::create([
                'remise' => $data['remise'] ?? 0,
                'date_debut' => $data['date_debut'],
                'date_fin' => $data['date_fin'],
                'motif' => $data['motif'] ?? '',
                'statut' => 'brouillon',
                'client_id' => $data['client_id'],
                'progress_id' => $data['progress_id'] ?? null,
            ]);

            // IMPORTANT: Attacher les produits avec les données du pivot
            $produitsData = [];
            foreach ($data['produits'] as $produit) {
                $produitsData[$produit['id']] = [
                    'quantite' => $produit['quantite'],
                    'prix_initial' => $produit['prix_initial'],
                    'prix_promo' => $produit['prix_promo'],
                ];
            }

            $demande->produits()->attach($produitsData);

            DB::commit();

            return response()->json($demande->load(['client', 'produits', 'progress']), 201);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur store demande: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function show(Demande $demande)
    {
        return $demande->load(['client', 'produits', 'progress']);
    }

    public function update(Request $request, Demande $demande)
    {
        $data = $request->validate([
            'remise' => 'nullable|numeric',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'motif' => 'nullable|string',
            'client_id' => 'required|exists:clients,id',
            'progress_id' => 'nullable|exists:progresses,id',
            'produits' => 'required|array|min:1',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|numeric|min:1',
            'produits.*.prix_initial' => 'required|numeric',
            'produits.*.prix_promo' => 'required|numeric',
        ]);

        try {
            DB::beginTransaction();

            // Mettre à jour la demande
            $demande->update([
                'remise' => $data['remise'] ?? 0,
                'date_debut' => $data['date_debut'],
                'date_fin' => $data['date_fin'],
                'motif' => $data['motif'] ?? '',
                'client_id' => $data['client_id'],
                'progress_id' => $data['progress_id'] ?? null,
            ]);

            // Préparer les données des produits
            $produitsData = [];
            foreach ($data['produits'] as $produit) {
                $produitsData[$produit['id']] = [
                    'quantite' => $produit['quantite'],
                    'prix_initial' => $produit['prix_initial'],
                    'prix_promo' => $produit['prix_promo'],
                ];
            }

            // IMPORTANT: Utiliser sync() pour remplacer les relations
            $demande->produits()->sync($produitsData);

            DB::commit();

            return response()->json($demande->load(['client', 'produits', 'progress']));

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur update demande: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function destroy(Demande $demande)
    {
        try {
            DB::beginTransaction();

            // Detach products to avoid pivot constraints and ensure clean deletion
            $demande->produits()->detach();
            $demande->delete();

            DB::commit();

            return response()->json(['message' => 'Demande supprimée']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur delete demande: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
