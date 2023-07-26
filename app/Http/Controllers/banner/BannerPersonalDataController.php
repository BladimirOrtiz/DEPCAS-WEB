<?php

namespace App\Http\Controllers\banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_details;
use Illuminate\Support\Facades\Auth;

class BannerPersonalDataController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        $userId = $user->id;

        // Obtener los detalles del usuario autenticado
        $userDetails = user_details::where('fk_user', $userId)->first();

        return view('home.bannerpersonaldata', compact('userDetails'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $userId = $user->id;

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'personalname' => 'required',
            'paternallastname' => 'required',
            'maternalastname' => 'required',
            'birthdate' => 'required|date',
            'curp' => 'required',
            'gender' => 'required',
            'cellphonenumber' => 'required',
            'homenumber' => 'required',
        ]);

        // Actualizar los detalles del usuario
        $userDetails = user_details::where('fk_user', $userId)->first();

        $userDetails->personalname = $request->input('personalname');
        $userDetails->paternallastname = $request->input('paternallastname');
        $userDetails->maternalastname = $request->input('maternalastname');
        $userDetails->birthdate = $request->input('birthdate');
        $userDetails->curp = $request->input('curp');
        $userDetails->gender = $request->input('gender');
        $userDetails->cellphonenumber = $request->input('cellphonenumber');
        $userDetails->homenumber = $request->input('homenumber');
        $userDetails->save();

        // Redireccionar a la página de inicio o a donde corresponda
        return redirect()->route('updatePersonal')->with('success', 'Datos personales actualizados exitosamente.');
    }
}





