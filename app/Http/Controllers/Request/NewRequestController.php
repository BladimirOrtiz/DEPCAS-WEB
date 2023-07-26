<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\RequestRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class NewRequestController extends Controller
{
    public function index()
    {
        $institution_name = Institution::pluck( 'institution_name');
        $area_responsible = Institution::pluck( 'area_responsible');
        $folio = Str::random(5);
        return view('request.newrequest', compact('institution_name', 'area_responsible', 'folio'));
    }
    public function sendRequest(RequestRequest $request)
{
    $solicitud = new Solicitud($request->all());
    $solicitud->user()->associate(Auth::user());

    if ($request->hasFile('applicant_files')) {
        $applicantFiles = $request->file('applicant_files');
        $applicantFilesPath = $applicantFiles->store('applicant_files', 'public');
        $solicitud->applicant_files = $applicantFilesPath;
    }

    $solicitud->save();

    return redirect('/readsolicicitud')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');
}
}
