<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\PersonalDataRequest;
use App\Models\user_details;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
  public $user;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showviews(){
        return view('sesion.register');
       }
       public function login(){
        return view('sesion.login');
       }
       public function register(RegisterRequest $request){
        $user = User::create($request->validated());
        return redirect('/sesion')->with('success', 'USUARIO REGISTRADO CORRECTAMENTE');


       }


}
