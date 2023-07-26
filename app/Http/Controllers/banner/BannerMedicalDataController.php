<?php

namespace App\Http\Controllers\banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medical_Data;
use Illuminate\Support\Facades\Auth;
class BannerMedicalDataController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        $userId = $user->id;

        // Obtener los detalles del usuario autenticado
        $medicalData = Medical_Data::where('fk_userm', $userId)->first();

        return view('home.bannermedicaldata', compact('medicalData'));
    }
    public function update(Request $request)
{
    $user = Auth::user();
    $userId = $user->id;

    // Validar los datos del formulario
    $validatedData = $request->validate([
        'medicaldiagnosis' => 'required',
        'blood_type' => 'required',
        'allergies_type' => 'required',
        'allergies' => 'required',
        'additionaldescription' => 'required',
        'chronic_diseases' => 'required',
    ]);

    // Actualizar los detalles médicos
    $medicalData = Medical_Data::where('fk_userm', $userId)->first();

    $medicalData->medicaldiagnosis = $request->input('medicaldiagnosis');
    $medicalData->blood_type = $request->input('blood_type');
    $medicalData->allergies_type = $request->input('allergies_type');
    $medicalData->allergies = $request->input('allergies');
    $medicalData->additionaldescription = $request->input('additionaldescription');
    $medicalData->chronic_diseases = $request->input('chronic_diseases');
    $medicalData->save();

    // Redireccionar a la página de inicio o a donde corresponda
    return redirect()->route('updateMedicalData')->with('success', 'Datos médicos actualizados exitosamente.');
}

}
