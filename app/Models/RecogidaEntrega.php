<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecogidaEntrega extends Model
{
    use HasFactory;

    protected $table = 'recogidaentrega';
    public $timestamps = false;

    protected $fillable = [
        'fecha_recogida',
        'hora_recogida',
        'hora_entrega',
        'instrucciones_recogida',
        'instrucciones_entrega',
    ];
}


