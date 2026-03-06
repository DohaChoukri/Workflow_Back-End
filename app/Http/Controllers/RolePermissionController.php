<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolePermissionController extends Controller
{
    public function givePermission(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'permission' => 'required'
        ]);

        $role = Role::findByName($request->role);
        $role->givePermissionTo($request->permission);

        return response()->json(['message' => 'Permission ajoutée au rôle']);
    }

    public function revokePermission(Request $request)
    {
        $role = Role::findByName($request->role);
        $role->revokePermissionTo($request->permission);

        return response()->json(['message' => 'Permission retirée du rôle']);
    }
}
