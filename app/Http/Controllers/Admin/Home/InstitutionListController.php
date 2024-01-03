<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
class InstitutionListController extends Controller
{
    public function index()
    {
        // Obtener todas las instituciones desde la base de datos
        $instituciones = Institution::all();

        // Pasar los datos a la vista
        return view('admin.home.institutionlist', ['instituciones' => $instituciones]);
    }
}
