<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    use HasFactory;

    protected $table = 'carga';
    public $timestamps = false;

    protected $fillable = [
        'tipo',
        'variedad',
        'cantidad',
        'empaquetado',
        'peso',
    ];
}


