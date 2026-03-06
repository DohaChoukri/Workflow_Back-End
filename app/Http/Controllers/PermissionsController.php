<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        return Permission::all();
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:permissions']);

        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => 'Root'
        ]);

        return $permission;
    }

    public function destroy($id)
    {
        Permission::findOrFail($id)->delete();

        return response()->json(['message' => 'Permission supprimée']);
    }
}
