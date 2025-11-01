<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth() -> user();
        return view('profiles.profile',['user' => $user,]);
    }
    public function edit(Request $request)
    {$user = auth() -> user();
        $request->validate([
            'UserName' => 'required|min:2|max:12',
            'MailAddress' => 'required|email|unique:users,email,' . $user->id,
            //'NewPassword' => 'required|min:8|max:20|confirmed',
            //'NewPasswordConfirmation' => 'required|min:8|max:20',
            'Bio' => 'max:150',
            'IconImage' => '',
        ]);
        $image = Auth::user() -> icon_image;
        if($request -> hasFile('icon_image')){
            if ($user->IconImage) {Storage::delete($user->icon_image);}
            $image = $request -> file('IconImage') -> store('public/images');
        }
        dd($image);
        Auth::user() -> update([
            // 'username' => $request -> input('UserName'),
            'email' => $request -> input('MailAddress'),
            'password' => bcrypt($request -> input('NewPassword')),
            'bio' => $request -> input('Bio'),
            'icon_image' => basename($image)
        ]);
        return redirect('/top');

    }
}
