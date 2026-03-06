<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Permission\Models\Role;
use App\Models\Role;
class RolesController extends Controller
{
    public function index()
    {
        return response()->json(Role::all());
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles']);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'Root'
        ]);

        return $role;
    }

    public function destroy($id)
    {
        Role::findOrFail($id)->delete();
        return response()->json(['message' => 'Role supprimé']);
    }
}
