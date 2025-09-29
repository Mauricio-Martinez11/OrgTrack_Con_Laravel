<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionMultiple extends Model
{
    protected $table = 'asignacionmultiple';
    public $timestamps = false;

    protected $fillable = [
        'id_envio',
        'id_transportista',
        'id_vehiculo',
        'id_recogida_entrega',
        'id_tipo_transporte',
        'estado',
        'fecha_asignacion',
        'fecha_inicio',
        'fecha_fin',
    ];

    // Útil si luego quieres adjuntar cargas con attach()
    public function cargas()
    {
        return $this->belongsToMany(
            Carga::class,
            'asignacioncarga',
            'id_asignacion',
            'id_carga'
        );
    }
}
