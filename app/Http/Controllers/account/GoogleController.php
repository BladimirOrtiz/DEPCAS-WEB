<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        $user = Socialite::driver('google')->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = new User();
            $newUser->name = $user->name;
            $newUser->email = $user->email;
            $newUser->password = password_hash(bin2hex(random_bytes(16)), PASSWORD_DEFAULT);
            $newUser->save();

            Auth::login($newUser);
        }

        return redirect('/welcomepanel');
    }

}
