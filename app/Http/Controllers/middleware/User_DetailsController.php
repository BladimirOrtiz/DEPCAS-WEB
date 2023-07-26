<?php

namespace App\Http\Controllers\middleware;

use App\Http\Controllers\Controller;
use App\Models\user_details;
use Illuminate\Http\Request;
use App\Http\Requests\PersonalDataRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class User_DetailsController extends Controller
{

    public function index()
    {
        return view('generaldata/personaldata');
    }
public function personaldataregister(PersonalDataRequest $request){

    $userDetail = new user_details($request->all());
    $userDetail->user()->associate(Auth::user());
    $userDetail->save();
    return redirect('/search')->with('success', 'DATOS REGISTRADOS CORRECTAMENTE');

}


}
