<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $nombre = (string) $request->input('nombre');
        $apellido = (string) $request->input('apellido');
        $correo = (string) $request->input('correo');
        $contrasena = (string) $request->input('contrasena');

        if ($nombre === '' || $apellido === '' || $correo === '' || $contrasena === '') {
            return response()->json(['error' => 'Todos los campos son obligatorios'], Response::HTTP_BAD_REQUEST);
        }

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            return response()->json(['error' => 'El correo no es válido'], Response::HTTP_BAD_REQUEST);
        }

        $existe = Usuario::where('correo', $correo)->exists();
        if ($existe) {
            return response()->json(['error' => 'El correo ya está registrado'], Response::HTTP_CONFLICT);
        }

        $usuario = new Usuario();
        $usuario->nombre = $nombre;
        $usuario->apellido = $apellido;
        $usuario->correo = $correo;
        $usuario->contrasena = Hash::make($contrasena);
        $usuario->rol = 'cliente';
        $usuario->save();

        return response()->json(['mensaje' => 'Cliente registrado correctamente'], Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $correo = (string) $request->input('correo');
        $contrasena = (string) $request->input('contrasena');

        if ($correo === '' || $contrasena === '') {
            return response()->json(['error' => 'Todos los campos son obligatorios'], Response::HTTP_BAD_REQUEST);
        }

        $usuario = Usuario::where('correo', $correo)->first();
        if (!$usuario) {
            return response()->json(['error' => 'Credenciales inválidas'], Response::HTTP_UNAUTHORIZED);
        }
        if (!Hash::check($contrasena, $usuario->contrasena)) {
            return response()->json(['error' => 'Credenciales inválidas'], Response::HTTP_UNAUTHORIZED);
        }

        $payload = [
            'sub' => $usuario->id,
            'rol' => $usuario->rol,
            'iat' => time(),
            'exp' => time() + (60 * 60 * 4),
        ];

        $secret = env('SECRET_KEY') ?: env('JWT_SECRET');
        if (!$secret) {
            $secret = (string) config('app.key');
            if (str_starts_with($secret, 'base64:')) {
                $secret = base64_decode(substr($secret, 7));
            }
        }

        $token = JWT::encode($payload, $secret, 'HS256');

        return response()->json([
            'token' => $token,
            'usuario' => [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'rol' => $usuario->rol,
            ],
        ]);
    }
}


