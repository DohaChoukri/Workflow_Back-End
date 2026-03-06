<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'remise',
        'date_debut',
        'date_fin',
        'motif',
        'statut',
        'progress_id', // foreign key to progresses table
        'client_id',
        'objectif',
    ];

    public function produits()
    {
        return $this->belongsToMany(Produit::class, 'demandes_produits')
                    ->withPivot('quantite', 'prix_initial', 'prix_promo')
                    ->withTimestamps();
    }

    /**
     * Relationship to the client.
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    /**
     * Relationship to the progress/status table.  A demande may belong to one progress step.
     */
    public function progress()
    {
        return $this->belongsTo(Progress::class);
    }

    /**
     * Automatically update the `statut` field when the related progress changes.
     */
    protected static function booted()
    {
        static::saving(function (Demande $demande) {
            if ($demande->isDirty('progress_id') && $demande->progress_id) {
                $progress = Progress::find($demande->progress_id);
                if ($progress) {
                    // simple mapping between progress code and statut values
                    switch ($progress->code) {
                        case 0:
                            $demande->statut = 'brouillon';
                            break;
                        case 10:
                            $demande->statut = 'soumis';
                            break;
                        case 20:
                        case 30:
                        case 40:
                        case 50:
                            // these later steps are all treated as approved for now
                            $demande->statut = 'approuve';
                            break;
                        default:
                            // leave existing statut
                    }
                }
            }
        });
    }
}
