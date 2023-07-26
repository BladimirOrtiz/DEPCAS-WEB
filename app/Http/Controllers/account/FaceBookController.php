<?php

namespace App\Http\Controllers\account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class FaceBookController extends Controller
{
    /**
 * Login Using Facebook
 */
 public function loginUsingFacebook()
 {
    return Socialite::driver('facebook')->redirect();
 }

 public function callbackFromFacebook()
 {
    try {
        $facebookUser = Socialite::driver('facebook')->user();
        $findUser = User::where('facebook_id', $facebookUser->id)->first();

        if($findUser) {
            Auth::login($findUser);
            return redirect()->intended('personaldata');
        }else{
            $newUser = User::create([
                'username' => $facebookUser->name,
                'email' => $facebookUser->email,
                'facebook_id' => $facebookUser->id,
                'password' => encrypt('12345678')
            ]);
            Auth::login($newUser);
            return redirect()->intended('personaldata');
        }
    } catch (Exception $e) {
        dd($e->getMessage());
    }
   }
}
