<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    /** @use HasFactory<\Database\Factories\ProduitFactory> */
    use HasFactory;

    protected $table = 'produits';

    protected $fillable = [
        'nom',
        'reference',
        'description',
        'prix',
        'stock',
        'image',
        'actif'
    ];

    public function demandes()
    {
        return $this->belongsToMany(Demande::class, 'demandes_produits')
                    ->withPivot('quantite', 'prix_initial', 'prix_promo')
                    ->withTimestamps();
    }
}
