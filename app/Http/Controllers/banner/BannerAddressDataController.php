<?php

namespace App\Http\Controllers\banner;

use App\Http\Controllers\Controller;
use App\Http\Controllers\middleware\Address_Datas;
use Illuminate\Http\Request;
use App\Models\Address_Data;
use Illuminate\Support\Facades\Auth;

class BannerAddressDataController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        $userId = $user->id;

        // Obtener los detalles del usuario autenticado
        $addressData = Address_Data::where('fk_useraddress', $userId)->first();

        return view('home.banneraddressdata', compact('addressData'));
    }
    public function update(Request $request)
{
    $user = Auth::user();
    $userId = $user->id;

    // Validar los datos del formulario
    $validatedData = $request->validate([
        'postalcode' => 'required',
        'state' => 'required',
        'municipality' => 'required',
        'colony' => 'required',
        'street' => 'required',
        'interiornumber' => 'required',
        'outdoornumber' => 'required',
        'referencesaddress' => 'required',
    ]);

    // Actualizar los detalles de dirección
    $addressData = Address_Data::where('fk_useraddress', $userId)->first();


    $addressData->postalcode = $request->input('postalcode');
    $addressData->state = $request->input('state');
    $addressData->municipality = $request->input('municipality');
    $addressData->colony = $request->input('colony');
    $addressData->street = $request->input('street');
    $addressData->interiornumber = $request->input('interiornumber');
    $addressData->outdoornumber = $request->input('outdoornumber');
    $addressData->referencesaddress = $request->input('referencesaddress');
    $addressData->save();

    // Redireccionar a la página de inicio o a donde corresponda
    return redirect()->route('updateAddress')->with('success', 'Datos de domicilio actualizados exitosamente.');
}


}
