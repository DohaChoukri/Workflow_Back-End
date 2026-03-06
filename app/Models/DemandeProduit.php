<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemandeProduit extends Model
{
    use HasFactory;

    protected $table = 'demandes_produits';

    protected $fillable = [
        'demande_id',
        'produit_id',
        'quantite',
        'prix_initial',
        'prix_promo'
    ];
}
