<?php

use Illuminate\Http\Request;

use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\PersonalAccessTokensController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProgressController;



Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
// 🔹 Gestion des tokens
Route::post('/token', [PersonalAccessTokensController::class, 'store']);
Route::delete('/token', [PersonalAccessTokensController::class, 'destroy']);

// 🔹 Gestion des rôles
Route::apiResource('roles', RolesController::class)->only(['index', 'store', 'destroy']);

// 🔹 Gestion des permissions
Route::apiResource('permissions', PermissionsController::class)->only(['index', 'store', 'destroy']);

// 🔹 Assignation et suppression de rôles à un utilisateur
Route::post('/assign-role', [UserRoleController::class, 'assignRole']);
Route::post('/remove-role', [UserRoleController::class, 'removeRole']);

// 🔹 Attribution et retrait de permissions à un rôle
Route::post('/give-permission', [RolePermissionController::class, 'givePermission']);
Route::post('/revoke-permission', [RolePermissionController::class, 'revokePermission']);

Route::get('/produits', [ProduitController::class, 'all']);


Route::apiResource('/demandes', DemandeController::class);

// Clients resource
Route::apiResource('clients', ClientController::class)->only(['index','show','store','update','destroy']);

// demandes by client
Route::get('clients/{client}/demandes', [ClientController::class, 'demandes']);

// Progress steps
Route::get('progresses', [ProgressController::class, 'index']);

// route pour soumettre
Route::patch('demandes/{demande}/soumettre', [DemandeController::class, 'soumettre']);
