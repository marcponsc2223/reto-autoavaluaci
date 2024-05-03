<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Criteris_avaluacio extends Model
{
    use HasFactory;
    protected $table = 'criteris_avaluacio';
    public $timestamps = false;

    /**
     * Get all of the comments for the criteris_avaluacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rubriques(): HasMany
    {
        return $this->hasMany(Rubrica::class, 'criteris_avaluacio_id');
    }

    /**
     * Get the resultatsAprenentatge that owns the criteris_avaluacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function resultatsAprenentatge(): BelongsTo
    {
        return $this->belongsTo(Resultats_aprenentatge::class, 'resultats_aprenentatge_id');
    }

    /**
     * The roles that belong to the criteris_avaluacio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuaris(): BelongsToMany
    {
        return $this->belongsToMany(Usuari::class, 'alumnes_has_criteris_avaluacio', 'criteris_avaluacio_id', 'usuaris_id');
    }
}
