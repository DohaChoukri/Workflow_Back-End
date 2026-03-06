<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function all()
    {
        return response()->json(Produit::all());
    }
}
