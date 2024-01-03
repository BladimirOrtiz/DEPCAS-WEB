<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InstitutionRequest;
use App\Models\Institution;
class InstitutionController extends Controller
{
    public function index()
    {
        return view('admin.home.institution');
    }
    public function registerinstitution(InstitutionRequest $request){
        $institution = new Institution([
            'institution_name' => $request->input('institution_name'),
            'institution_type' => $request->input('institution_type'),
            'institution_location' => $request->input('institution_location'),
            'attention_days' => $request->input('attention_days'),
            'opening_time' => $request->input('opening_time'),
            'closing_time' => $request->input('closing_time'),
            'institution_email' => $request->input('institution_email'),
            'institution_phonenumber' => $request->input('institution_phonenumber'),
            'area_responsible' => $request->input('area_responsible'),
        ]);

        // Guarda la institución en la base de datos
        $institution->save();

        // Redirige de vuelta a la vista de registro con un mensaje de éxito
        return redirect('institutionrlist')->with('success', 'Institución registrada correctamente');
    }



}

