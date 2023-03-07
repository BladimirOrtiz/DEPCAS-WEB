<?php

namespace App\Http\Controllers\middleware;

use App\Http\Controllers\Controller;
use App\Models\user_details;
use Illuminate\Http\Request;

class User_DetailsController extends Controller
{
   
    public function index()
    {
        return view('generaldata/personaldata');
    }


}
