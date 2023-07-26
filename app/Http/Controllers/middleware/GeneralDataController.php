<?php

namespace App\Http\Controllers\middleware;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_details;
use App\Models\Address_Data;
use App\Models\Medical_Data;
use Illuminate\Support\Facades\Auth;

class GeneralDataController extends Controller
{
    public function getuserdata()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        if ($user) {
            $userId = $user->id;

            // Obtener los detalles del usuario autenticado
            $userDetails = user_details::where('fk_user', $userId)->get();

            // Obtener los datos de la dirección del usuario autenticado
            $addressData = Address_Data::where('fk_useraddress', $userId)->get();

            // Obtener los datos médicos del usuario autenticado
            $medicalData = Medical_Data::where('fk_userm', $userId)->get();

            return view('generaldata.generaldata', compact('userDetails', 'addressData', 'medicalData'));
        }

        // Manejar el caso en que no hay usuario autenticado
        return redirect()->route('/sesion');
    }



    }

