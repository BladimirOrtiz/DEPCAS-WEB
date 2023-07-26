<?php

namespace App\Http\Controllers\middleware;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{
    public function index(){
        return view('generaldata.profil');
    }
    public function profilesave(Request $request){
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('profile_photo')) {
            $user = Auth::user();
            $oldPhotoPath = $user->profile_photo_path;

            $photo = $request->file('profile_photo');
            $photoPath = $photo->store('profile_photo', 'public');
            $user->profile_photo_path = $photoPath;
            $user->save();


            if ($oldPhotoPath) {
                Storage::disk('public')->delete($oldPhotoPath);
            }
        }

        return redirect('/generaldata')->with('success', 'Foto de perfil actualizada correctamente.');
    }

    }

