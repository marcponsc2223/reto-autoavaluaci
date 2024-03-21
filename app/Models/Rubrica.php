<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rubrica extends Model
{
    use HasFactory;
    protected $table = 'rubriques';
    public $timestamps = false;

    /**
     * Get the user that owns the Rubrica
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteris_avaluacio(): BelongsTo
    {
        return $this->belongsTo(Criteris_avaluacio::class, 'criteris_avaluacio_id');
    }
}
