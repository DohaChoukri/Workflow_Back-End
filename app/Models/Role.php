<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\User;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RolesFactory> */
    use HasFactory;

    protected $fillable = ['name','guard_name'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id')->wherePivot('model_type', User::class);
    }
}
