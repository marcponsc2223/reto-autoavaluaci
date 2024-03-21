<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Modul extends Model
{
    use HasFactory;
    protected $table = 'moduls';
    public $timestamps = false;

    /**
     * Get the user that owns the Modul
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cicle(): BelongsTo
    {
        return $this->belongsTo(Cicles::class, 'cicles_id');
    }

    /**
     * The roles that belong to the Cicles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuari(): BelongsToMany
    {
        return $this->belongsToMany(Usuari::class, 'usuaris_has_moduls', 'moduls_id', 'usuaris_id');
    }

    /**
     * Get all of the comments for the Modul
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resultats_aprenentatge(): HasMany
    {
        return $this->hasMany(Resultats_aprenentatge::class, 'moduls_id');
    }

}