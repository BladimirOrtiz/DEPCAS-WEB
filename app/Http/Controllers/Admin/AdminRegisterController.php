<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Admin;
class AdminRegisterController extends Controller
{
    public function index()
    {
        return view('admin.registeradmin');
    }
    public function registeradmin(RegisterAdminRequest $request){
        $user = Admin::create($request->validated());
        return redirect('/loginadmin')->with('success', 'USUARIO REGISTRADO CORRECTAMENTE');


       }
}
