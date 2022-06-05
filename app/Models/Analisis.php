<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    use HasFactory;

    protected $fillable = [
        'FechaAnalisis',
        'Az',
        'Alc',
        'Ph',
        'AcTot',
        'AcVol',
        'SOLibre',
        'SOTotal',
        'Color',
        'LC',
        'Matiz',
    ];
}
