<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cicles extends Model
{
    use HasFactory;
    protected $table = 'cicles';
    public $timestamps = false;
    /**
     * Get all of the comments for the Cicles
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modul(): HasMany
    {
        return $this->hasMany(Modul::class, 'cicles_id');
    }

    
    
}

