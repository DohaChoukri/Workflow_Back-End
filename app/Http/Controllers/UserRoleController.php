<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserRoleController extends Controller
{
    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'role' => 'required'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->assignRole($request->role);

        return response()->json(['message' => 'Rôle attribué']);
    }

    public function removeRole(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->removeRole($request->role);

        return response()->json(['message' => 'Rôle retiré']);
    }
}
