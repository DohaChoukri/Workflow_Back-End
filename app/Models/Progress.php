<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    // default pluralization of "progress" is also "progress" which
    // doesn't match our migration. specify the table explicitly.
    protected $table = 'progresses';

    protected $fillable = [
        'code',
        'label',
        'description',
    ];

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }
}
