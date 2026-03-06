<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string',
            'actif' => 'nullable|boolean',
        ]);

        $client = Client::create($data);
        return response()->json($client, 201);
    }

    public function show(Client $client)
    {
        return $client;
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'adresse' => 'nullable|string',
            'email' => 'nullable|email',
            'telephone' => 'nullable|string',
            'actif' => 'nullable|boolean',
        ]);

        $client->update($data);
        return response()->json($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(['message' => 'Client supprimé']);
    }

    public function demandes(Client $client)
    {
        return $client->demandes()->with(['produits','progress'])->get();
    }
}
