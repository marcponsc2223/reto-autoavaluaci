<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resultats_aprenentatge extends Model
{
    use HasFactory;
    protected $table = 'resultats_aprenentatge';
    public $timestamps = false;

    /**
     * Get all of the comments for the Resultats_aprenentatge
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function criteris_avaluacio(): HasMany
    {
        return $this->hasMany(Criteris_avaluacio::class, 'resultats_aprenentatge_id');
    }

    /**
     * Get the user that owns the Resultats_aprenentatge
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function moduls(): BelongsTo
    {
        return $this->belongsTo(Modul::class, 'moduls_id');
    }
}
