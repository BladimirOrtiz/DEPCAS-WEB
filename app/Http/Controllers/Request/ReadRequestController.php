<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitud;
use Illuminate\Support\Facades\Storage;
class ReadRequestController extends Controller
{
    public function index()
    {
           // Obtener las solicitudes del usuario autenticado
    $user = Auth::user();
    $solicitudes = Solicitud::where('fk_userr', $user->id)->get();

    // Renderizar la vista con los datos de las solicitudes
    return view('request.readrequest', compact('solicitudes'));
    }



}


