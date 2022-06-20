<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pileta;

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
        'pileta_id',
    ];
    
    public function piletas()
    {
        return $this->hasMany(Pileta::class, 'id', 'pileta_id');
        
    }
}
