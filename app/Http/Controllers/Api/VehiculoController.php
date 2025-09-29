<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class VehiculoController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::query()->orderByDesc('id')->get();
        return response()->json($vehiculos);
    }

    public function show(int $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['error' => 'Vehículo no encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($vehiculo);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo' => ['required', 'string', 'max:50', Rule::in([
                'Pesado - Ventilado','Pesado - Aislado','Pesado - Refrigerado',
                'Mediano - Ventilado','Mediano - Aislado','Mediano - Refrigerado',
                'Ligero - Ventilado','Ligero - Aislado','Ligero - Refrigerado',
            ])],
            'placa' => ['required', 'string', 'max:20', 'unique:vehiculos,placa'],
            'capacidad' => ['required', 'numeric'],
            'estado' => ['required', 'string', Rule::in(['Mantenimiento','No Disponible','En ruta','Disponible'])],
        ]);

        $vehiculo = Vehiculo::create($validated);
        return response()->json(['mensaje' => 'Vehículo creado correctamente', 'data' => $vehiculo], Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['error' => 'Vehículo no encontrado'], Response::HTTP_NOT_FOUND);
        }

        $validated = $request->validate([
            'tipo' => ['sometimes', 'required', 'string', 'max:50', Rule::in([
                'Pesado - Ventilado','Pesado - Aislado','Pesado - Refrigerado',
                'Mediano - Ventilado','Mediano - Aislado','Mediano - Refrigerado',
                'Ligero - Ventilado','Ligero - Aislado','Ligero - Refrigerado',
            ])],
            'placa' => ['sometimes', 'required', 'string', 'max:20', Rule::unique('vehiculos', 'placa')->ignore($vehiculo->id)],
            'capacidad' => ['sometimes', 'required', 'numeric'],
            'estado' => ['sometimes', 'required', 'string', Rule::in(['Mantenimiento','No Disponible','En ruta','Disponible'])],
        ]);

        $vehiculo->fill($validated);
        $vehiculo->save();

        return response()->json(['mensaje' => 'Vehículo actualizado correctamente', 'data' => $vehiculo]);
    }

    public function destroy(int $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['error' => 'Vehículo no encontrado'], Response::HTTP_NOT_FOUND);
        }
        $vehiculo->delete();
        return response()->json(['mensaje' => 'Vehículo eliminado correctamente']);
    }
}


