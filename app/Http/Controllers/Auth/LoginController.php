<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function view(){
        {
            if(Auth::check()){
                return redirect('/personaldata');
            }
            return view('sesion.singin');
        }
       }
       public function singup(LoginRequest $request)
       {
           $credentials = $request->getCredentials();

           if(!Auth::validate($credentials)):
               dd('error');
              return redirect()->to('sesion')
                   ->withErrors(trans('auth.failed'));
           endif;
           $user = Auth::getProvider()->retrieveByCredentials($credentials);


           Auth::login($user);

           return $this->authenticated($request, $user);
       }

       protected function authenticated(Request $request, $user)
       {
           return redirect('/personaldata');
       }
}
