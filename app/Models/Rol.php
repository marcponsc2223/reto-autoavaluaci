<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'tipus_usuaris';
    public $timestamps = false;

    /**
     * Get all of the usuaris for the Rol
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuari(): HasMany
    {
        return $this->hasMany(Usuari::class, 'tipus_usuaris_id');
    }
}

