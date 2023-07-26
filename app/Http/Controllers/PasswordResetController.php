<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordResetRequest;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
class PasswordResetController extends Controller
{
/**
     * Write code on Method
     *
     * @return response()
     */

   public function show(){

        return view('sesion.passwordreset');
   }

   public function sendResetLinkEmail(Request $request)
   {
       $request->validate(['email' => 'required|email']);

       $user = User::where('email', $request->email)->first();

       if (!$user) {
           return back()->withErrors(['email' => 'No podemos encontrar un usuario con esa dirección de correo electrónico']);
       }

       $token = Str::random(64);

       DB::table('password_resets')->insert([
           'email' => $user->email,
           'token' => Hash::make($token),
           'created_at' => Carbon::now()
       ]);

       Mail::to($user->email)->send(new ResetPasswordEmail($token));

       return back()->with('status', 'Se ha enviado un correo electrónico con las instrucciones para restablecer la contraseña');
   }

}

