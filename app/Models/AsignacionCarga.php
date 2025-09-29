<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionCarga extends Model
{
    protected $table = 'asignacioncarga';
    public $timestamps = false;

    // La tabla pivot no tiene columna id
    protected $primaryKey = null;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_asignacion',
        'id_carga',
    ];
}