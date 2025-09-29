<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $table = 'envios';
    public $timestamps = false;

    protected $fillable = [
        'id_usuario',
        'estado',
        'fecha_creacion',
        'fecha_inicio',
        'fecha_entrega',
        'id_direccion',
    ];
}


