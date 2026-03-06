<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class PersonalAccessTokensController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Identifiants incorrects'
            ], 422);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }

    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Tokens supprimés'
        ]);
    }
}
