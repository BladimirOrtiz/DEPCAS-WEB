<?php

namespace App\Http\Controllers\middleware;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressDataRequest;
use App\Models\Address_Data;
use App\Models\Colony;
use Illuminate\Support\Facades\Auth;
use App\Models\State;
use App\Models\Municipality;

class Address_Datas extends Controller

{
 public function show()
 {
 $state = State::pluck( 'state_name'); // Obtener los nombres de los estados desde la tabla "estado"

 $municipality = Municipality::pluck('municipality_name'); // Obtener los nombres de los municipios desde la tabla "municipio"

$colony = Colony::pluck('colonie_name'); // Obtener los nombres de las colonias desde la tabla "colonie"
 return view('generaldata.addressdata', compact('state', 'municipality', 'colony'));
    }
    public function search(AddressDataRequest $request)
    {
        $addressDatas = new Address_Data($request->all());
        $addressDatas->user()->associate(Auth::user());
        $addressDatas->save();
        return redirect('/medicaldata')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    }


}

    ?>


