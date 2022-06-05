<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pileta extends Model
{
    use HasFactory;

    protected$fillable=[
        'Capacidad',
        'Estado',
        'Activo',
    ];
}
