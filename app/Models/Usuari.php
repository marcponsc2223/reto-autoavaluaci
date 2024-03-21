<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Usuari extends Authenticatable
{
    use HasFactory, HasFactory, Notifiable;
    protected $table = 'usuaris';
    public $timestamps = false;

    /**
     * The roles that belong to the Usuari
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modul(): BelongsToMany
    {
        return $this->belongsToMany(Modul::class, 'usuaris_has_moduls', 'usuaris_id', 'moduls_id');
    }

    /**
     * Get the user that owns the Usuari
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'tipus_usuaris_id');
    }

    
    /**
     * The roles that belong to the criteris_avaluacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function criteris_avaluacio(): BelongsToMany
    {
        return $this->belongsToMany(Criteris_avaluacio::class, 'alumnes_has_criteris_avaluacio', 'usuaris_id', 'criteris_avaluacio_id');
    }
}
