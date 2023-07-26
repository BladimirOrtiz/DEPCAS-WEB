<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
class ResetPasswordController extends Controller
{

    public function showResetForm($token)
    {
        return view('passwod.reset', ['token' => $token]);
    }

        public function reset(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'No podemos encontrar un usuario con esa dirección de correo electrónico']);
    }

    $tokenData = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

    if (!$tokenData) {
        return back()->withErrors(['token' => 'El token de restablecimiento de contraseña no es válido']);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    DB::table('password_resets')->where('email', $request->email)->delete();

    return redirect('/')->with('status', 'Tu contraseña ha sido restablecida correctamente');
}

}
