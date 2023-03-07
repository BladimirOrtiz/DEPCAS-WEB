<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Auth\Events\PasswordReset;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registrar', [App\Http\Controllers\Auth\RegisterController::class,'showviews']);
Route::post('/registrar', [App\Http\Controllers\Auth\RegisterController::class,'register']);
Route::get('/sesion', [App\Http\Controllers\Auth\LoginController::class,'view']);
Route::post('/sesion', [App\Http\Controllers\Auth\LoginController::class,'singup']);
Route::get('/recuperarcont', [App\Http\Controllers\PasswordResetController::class,'show']);
Route::post('/recuperarcont', [App\Http\Controllers\PasswordResetController::class,'index']);

//routes protected
Route::get('/personaldata', [App\Http\Controllers\middleware\User_DetailsController::class,'index']);
Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class,'logout']);



