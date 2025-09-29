<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tipotransporte;
use Illuminate\Http\Response;

class TipotransporteController extends Controller
{
    public function index()
    {
        $tipos = Tipotransporte::orderBy('id')->get();
        return response()->json($tipos, Response::HTTP_OK);
    }
}


