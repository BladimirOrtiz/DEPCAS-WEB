<?php

use App\Http\Controllers\account\FaceBookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Http;

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
Route::post('/sesion', [App\Http\Controllers\Auth\LoginController::class,'signup']);
Route::get('/recuperarcont', [App\Http\Controllers\PasswordResetController::class,'show']);
Route::post('/recuperarcont', [App\Http\Controllers\PasswordResetController::class,'sendResetLinkEmail']);
Route::get('/reset-password/{token}', [App\Http\Controllers\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [App\Http\Controllers\ResetPasswordController::class, 'reset'])->name('password.update');
Route::prefix('facebook')->name('facebook')->group( function(){
    Route::get('/facebook', [App\Http\Controllers\account\FaceBookController::class,'loginUsingFacebook']);
    Route::get('/facebook/callback',  [App\Http\Controllers\account\FaceBookController::class,'callbackFromFacebook']);
    });
    Route::prefix('google')->name('google')->group( function(){
        Route::get('//login/google', [App\Http\Controllers\account\GoogleController::class,'redirectToGoogle']);
        Route::get('/login/google/callback',  [App\Http\Controllers\account\GoogleController::class,'callbackFromGoogle']);
        });

//routes protected

Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class,'logout']);
Route::get('/personaldata', [App\Http\Controllers\middleware\User_DetailsController::class,'index']);
Route::post('/personaldata', [App\Http\Controllers\middleware\User_DetailsController::class,'personaldataregister']);
//address data
//postal code
Route::get('/search', [App\Http\Controllers\middleware\Address_Datas::class,'show']);
Route::post('/search', [App\Http\Controllers\middleware\Address_Datas::class, 'search'])->name('search');
//medicaldata
Route::get('/medicaldata', [App\Http\Controllers\middleware\MedicalDatasControllerr::class,'index']);
Route::post('/medicaldata', [App\Http\Controllers\middleware\MedicalDatasControllerr::class,'savemedicalda']);
// userprrofile
Route::get('/profile', [App\Http\Controllers\middleware\ProfileController::class,'index']);
Route::post('/profile', [App\Http\Controllers\middleware\ProfileController::class,'profilesave']);
// generaldata
Route::get('/generaldata', [App\Http\Controllers\middleware\GeneralDataController::class,'getuserdata']);

// welcome panel
Route::get('/welcomepanel', [App\Http\Controllers\Home\HomePanelController::class, 'index'])->name('welcomepanel');
//banner Personaldata
Route::get('/welcomepanel/bannerpersonal', [App\Http\Controllers\banner\BannerPersonalDataController::class, 'index']);
Route::post('/welcomepanel/bannerpersonal', [App\Http\Controllers\banner\BannerPersonalDataController::class, 'update'])->name('updatePersonal');
// banner Addressddata
Route::get('/welcomepanel/banneraddress', [App\Http\Controllers\banner\BannerAddressDataController::class, 'index']);
Route::post('/welcomepanel/banneraddress', [App\Http\Controllers\banner\BannerAddressDataController::class, 'update'])->name('updateAddress');

// banner Medicaldata
Route::get('/welcomepanel/bannermedical', [App\Http\Controllers\banner\BannerMedicalDataController::class, 'index']);
Route::post('/welcomepanel/bannermedical', [App\Http\Controllers\banner\BannerMedicalDataController::class, 'update'])->name('updateMedicalData');
// About
Route::get('/about', [App\Http\Controllers\Home\AboutController::class, 'index'])->name('about');

//request
Route::get('/newrequest', [App\Http\Controllers\Request\NewRequestController::class, 'index']);
Route::post('/newrequest', [App\Http\Controllers\Request\NewRequestController::class, 'sendRequest']);
//readrequest
Route::get('/readsolicicitud', [App\Http\Controllers\Request\ReadRequestController::class, 'index'])->name('readrequest');

Route::get('/solicitud/{idrequest}/{fk_userr}', 'App\Http\Controllers\Request\ReadRequestController@showUpdate')->name('request.updaterequest');
Route::post('/solicitud/{idrequest}/{fk_userr}', 'App\Http\Controllers\Request\ReadRequestController@updaterequest')->name('request.updaterequest');
Route::delete('/request.deleterequest/{idrequest}/{fk_userr}', 'App\Http\Controllers\Request\ReadRequestController@deleteRequest')->name('request.deleterequest');
//PDF
Route::get('/generate-pdf/{idrequest}', [App\Http\Controllers\PDF\PDFController::class, 'generatePDF'])->name('generate.pdf');
Route::get('/generate-and-send-pdf/{idrequest}', [App\Http\Controllers\PDF\PDFController::class, 'sendpdf'])->name('send.email');
