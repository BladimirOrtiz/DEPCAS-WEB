<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Solicitud;
class UserRequestController extends Controller
{
    public function index()
    {
        // Obtener todas las solicitudes con los usernames relacionados
        $solicitudes = Solicitud::with('user')->get();

        // Renderizar la vista con los datos de las solicitudes
        return view('admin.home.userrequest', compact('solicitudes'));
    }

}
