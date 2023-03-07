<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PasswordResetRequest;


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
   public function index(PasswordResetRequest $email)
   {
    $campos=[
        'email' => $email->email
    ];
       $mailData = [
           'title' => 'Prueba de correo desde la Oficina de Cómputo del ITVO',
           'body' => 'Este mensaje es una prueba usando SMTP de gmail'
       ];
       Mail::to($campos)->send(new SendMail($mailData));
   }

}

