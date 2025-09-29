<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AsignacionCarga;
use App\Models\AsignacionMultiple;
use App\Models\Carga;
use App\Models\Envio;
use App\Models\RecogidaEntrega;
use App\Models\Tipotransporte;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EnvioController extends Controller
{
    public function crearEnvioCompleto(Request $request)
    {
        $idDireccion = $request->input('id_direccion');
        $particiones = $request->input('particiones');
        $idUsuario = (int) $request->attributes->get('usuario_id');

        if (!$idUsuario) {
            return response()->json(['error' => 'No autorizado'], Response::HTTP_UNAUTHORIZED);
        }
        if (!$idDireccion || !is_array($particiones) || count($particiones) === 0) {
            return response()->json(['error' => 'Faltan datos para crear el envío (dirección o particiones)'], Response::HTTP_BAD_REQUEST);
        }

        // Validar que la dirección exista y sea del usuario
        $direccion = \App\Models\Direccion::where('id', $idDireccion)
            ->where('id_usuario', $idUsuario)
            ->first();
        if (!$direccion) {
            return response()->json(['error' => 'La dirección no existe o no pertenece al usuario'], Response::HTTP_BAD_REQUEST);
        }

        return DB::transaction(function () use ($idUsuario, $idDireccion, $particiones) {
            $envio = Envio::create([
                'id_usuario' => $idUsuario,
                'estado' => 'Pendiente',
                'id_direccion' => $idDireccion,
            ]);

            foreach ($particiones as $particion) {
                $cargas = $particion['cargas'] ?? null;
                $recogidaEntrega = $particion['recogidaEntrega'] ?? null;
                $idTipoTransporte = $particion['id_tipo_transporte'] ?? null;

                if (!$cargas || !is_array($cargas) || count($cargas) === 0 || !$recogidaEntrega || !$idTipoTransporte) {
                    return response()->json(['error' => 'Cada partición debe incluir cargas, recogidaEntrega y tipo de transporte'], Response::HTTP_BAD_REQUEST);
                }

                // validar existencia de tipo transporte
                if (!Tipotransporte::where('id', $idTipoTransporte)->exists()) {
                    return response()->json(['error' => 'El tipo de transporte no existe: '.$idTipoTransporte], Response::HTTP_BAD_REQUEST);
                }

                $r = RecogidaEntrega::create([
                    'fecha_recogida' => $recogidaEntrega['fecha_recogida'],
                    'hora_recogida' => $recogidaEntrega['hora_recogida'],
                    'hora_entrega' => $recogidaEntrega['hora_entrega'],
                    'instrucciones_recogida' => $recogidaEntrega['instrucciones_recogida'] ?? null,
                    'instrucciones_entrega' => $recogidaEntrega['instrucciones_entrega'] ?? null,
                ]);

                $asignacion = AsignacionMultiple::create([
                    'id_envio' => $envio->id,
                    'id_tipo_transporte' => $idTipoTransporte,
                    'estado' => 'Pendiente',
                    'id_recogida_entrega' => $r->id,
                ]);

                foreach ($cargas as $carga) {
                    $c = Carga::create([
                        'tipo' => $carga['tipo'],
                        'variedad' => $carga['variedad'],
                        'cantidad' => $carga['cantidad'],
                        'empaquetado' => $carga['empaquetado'],
                        'peso' => $carga['peso'],
                    ]);
                    AsignacionCarga::create([
                        'id_asignacion' => $asignacion->id,
                        'id_carga' => $c->id,
                    ]);
                }
            }

            return response()->json([
                'mensaje' => 'Envío creado exitosamente para el cliente',
                'id_envio' => $envio->id,
            ], Response::HTTP_CREATED);
        });
    }
}


