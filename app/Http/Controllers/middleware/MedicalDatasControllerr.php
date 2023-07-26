<?php

namespace App\Http\Controllers\middleware;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicalDataRequest;
use App\Models\Medical_Data;
use Illuminate\Support\Facades\Auth;

class MedicalDatasControllerr extends Controller
{
    public function index()
    {
        return view('generaldata.medicaldatata');
    }
    public function savemedicalda(MedicalDataRequest $request)

    {$validatedData = $request->validated();
        $medical_data = new Medical_Data($request->all());
        $medical_data->user()->associate(Auth::user());
        $medical_data->save();
        return redirect('/profile')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
    }
}
