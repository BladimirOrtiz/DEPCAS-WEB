<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;
class LoginAdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.loginadmin');
    }
    public function signupadmin(LoginAdminRequest $request)
    {
          // Validar los datos enviados por el usuario
          $credentials = $request->only('user_name', 'password');

          // Intentar autenticar al usuario utilizando el guard 'admin'
          if (Auth::guard('admin')->attempt($credentials)) {
              // Autenticación exitosa, redirige al área de administración
              return redirect()->intended('/admin/dashboard');
          }

          // Autenticación fallida, redirige de vuelta con un mensaje de error
          return back()->with('error', 'Credenciales incorrectas');
      }

}
