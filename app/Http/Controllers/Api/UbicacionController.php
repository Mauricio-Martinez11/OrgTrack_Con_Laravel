<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Direccion;
use App\Models\DireccionSegmento;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UbicacionController extends Controller
{
    private function obtenerUsuarioId(Request $request)
    {
        $authHeader = $request->header('Authorization', '');
        if (!str_starts_with($authHeader, 'Bearer ')) {
            return null;
        }
        $token = substr($authHeader, 7);

        $secret = env('SECRET_KEY') ?: env('JWT_SECRET');
        if (!$secret) {
            $secret = (string) config('app.key');
            if (str_starts_with($secret, 'base64:')) {
                $secret = base64_decode(substr($secret, 7));
            }
        }

        try {
            $payload = JWT::decode($token, new Key($secret, 'HS256'));
            return (int) ($payload->sub ?? 0);
        } catch (\Throwable $e) {
            return null;
        }
    }

    public function index(Request $request)
    {
        $usuarioId = $this->obtenerUsuarioId($request);
        if (!$usuarioId) {
            return response()->json(['error' => 'No autorizado'], Response::HTTP_UNAUTHORIZED);
        }
        $items = Direccion::where('id_usuario', $usuarioId)->orderByDesc('id')->get();
        return response()->json($items);
    }

    public function show(Request $request, int $id)
    {
        $usuarioId = $this->obtenerUsuarioId($request);
        if (!$usuarioId) {
            return response()->json(['error' => 'No autorizado'], Response::HTTP_UNAUTHORIZED);
        }
        $item = Direccion::where('id', $id)->where('id_usuario', $usuarioId)->first();
        if (!$item) {
            return response()->json(['error' => 'Dirección no encontrada'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($item);
    }

    public function store(Request $request)
    {
        $usuarioId = $this->obtenerUsuarioId($request);
        if (!$usuarioId) {
            return response()->json(['error' => 'No autorizado'], Response::HTTP_UNAUTHORIZED);
        }
        $data = $request->validate([
            'nombreOrigen' => ['nullable','string','max:200'],
            'origen_lng' => ['nullable','numeric'],
            'origen_lat' => ['nullable','numeric'],
            'nombreDestino' => ['nullable','string','max:200'],
            'destino_lng' => ['nullable','numeric'],
            'destino_lat' => ['nullable','numeric'],
            'rutaGeoJSON' => ['nullable','string'],
            'segmentos' => ['nullable','array'],
            'segmentos.*.segmentogeojson' => ['required_with:segmentos','string'],
        ]);

        $direccion = Direccion::create([
            'id_usuario' => $usuarioId,
            'nombreorigen' => $data['nombreOrigen'] ?? null,
            'origen_lng' => $data['origen_lng'] ?? null,
            'origen_lat' => $data['origen_lat'] ?? null,
            'nombredestino' => $data['nombreDestino'] ?? null,
            'destino_lng' => $data['destino_lng'] ?? null,
            'destino_lat' => $data['destino_lat'] ?? null,
            'rutageojson' => $data['rutaGeoJSON'] ?? null,
        ]);

        foreach (($data['segmentos'] ?? []) as $seg) {
            DireccionSegmento::create([
                'direccion_id' => $direccion->id,
                'segmentogeojson' => $seg['segmentogeojson'],
            ]);
        }

        return response()->json($direccion, Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {
        $usuarioId = $this->obtenerUsuarioId($request);
        if (!$usuarioId) {
            return response()->json(['error' => 'No autorizado'], Response::HTTP_UNAUTHORIZED);
        }
        $direccion = Direccion::where('id', $id)->where('id_usuario', $usuarioId)->first();
        if (!$direccion) {
            return response()->json(['error' => 'Dirección no encontrada o no autorizada'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            'nombreOrigen' => ['nullable','string','max:200'],
            'origen_lng' => ['nullable','numeric'],
            'origen_lat' => ['nullable','numeric'],
            'nombreDestino' => ['nullable','string','max:200'],
            'destino_lng' => ['nullable','numeric'],
            'destino_lat' => ['nullable','numeric'],
            'rutaGeoJSON' => ['nullable','string'],
        ]);

        $direccion->update([
            'nombreorigen' => $data['nombreOrigen'] ?? $direccion->nombreorigen,
            'origen_lng' => array_key_exists('origen_lng', $data) ? $data['origen_lng'] : $direccion->origen_lng,
            'origen_lat' => array_key_exists('origen_lat', $data) ? $data['origen_lat'] : $direccion->origen_lat,
            'nombredestino' => $data['nombreDestino'] ?? $direccion->nombredestino,
            'destino_lng' => array_key_exists('destino_lng', $data) ? $data['destino_lng'] : $direccion->destino_lng,
            'destino_lat' => array_key_exists('destino_lat', $data) ? $data['destino_lat'] : $direccion->destino_lat,
            'rutageojson' => array_key_exists('rutaGeoJSON', $data) ? $data['rutaGeoJSON'] : $direccion->rutageojson,
        ]);

        return response()->json($direccion);
    }

    public function destroy(Request $request, int $id)
    {
        $usuarioId = $this->obtenerUsuarioId($request);
        if (!$usuarioId) {
            return response()->json(['error' => 'No autorizado'], Response::HTTP_UNAUTHORIZED);
        }
        $direccion = Direccion::where('id', $id)->where('id_usuario', $usuarioId)->first();
        if (!$direccion) {
            return response()->json(['error' => 'Dirección no encontrada o no autorizada'], Response::HTTP_NOT_FOUND);
        }

        // Validar uso en envíos activos (Pendiente, Asignado, En curso)
        $enUso = \DB::table('envios')
            ->where('id_direccion', $direccion->id)
            ->whereIn('estado', ['Pendiente','Asignado','En curso'])
            ->exists();

        if ($enUso) {
            return response()->json(['error' => 'Esta dirección está en uso por un envío activo y no puede eliminarse.'], Response::HTTP_BAD_REQUEST);
        }

        DireccionSegmento::where('direccion_id', $direccion->id)->delete();
        $direccion->delete();
        return response()->json(['message' => 'Dirección eliminada correctamente']);

        
    }
}


