<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\user_details;
use App\Models\Address_Data;
use App\Models\Medical_Data;

class LoginController extends Controller
{
    public function view(){
        {
            if(Auth::check()){
                return redirect('/welcomepanel');
            }
            return view('sesion.singin');
        }
       }
       public function signup(LoginRequest $request)
       {
           $credentials = $request->getCredentials();

           if (!Auth::validate($credentials)) {
               dd('error');
               return redirect()->to('sesion')
                   ->withErrors(trans('EL USUARIO NO EXISTE'));
           }

           $user = Auth::getProvider()->retrieveByCredentials($credentials);

           Auth::login($user);

           return $this->authenticated($request, $user);
       }

       protected function authenticated(Request $request, $user)
       {
           $userId = $user->id;

           // Verificar si existen datos en user_details, address_data y medical_datas
           $hasUserDetails = User_Details::where('fk_user', $userId)->exists();
           $hasAddressData = Address_Data::where('fk_useraddress', $userId)->exists();
           $hasMedicalData = Medical_Data::where('fk_userm', $userId)->exists();

           if ($hasUserDetails && $hasAddressData && $hasMedicalData) {
               return redirect('/welcomepanel');
           } elseif ($hasUserDetails && $hasAddressData) {
               return redirect('/medicaldata');
           } elseif ($hasUserDetails) {
               return redirect('/search');
           } else {
               return redirect('/personaldata');
           }
       }
   }

