<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agregado extends Model
{
    use HasFactory;

    protected $fillable=[
        'fecha',
        'descripcion',
        'anio',
        'activo',
        'unidad_id',
    ];

    // public function unidads() {
    //     return $this->hasMany('App\Models\Unidad');
    // }

    /**
     * Get all of the comments for the Agregado
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unidads()
    {
        return $this->hasMany(Unidad::class, 'id', 'unidad_id');
        
    }
}
