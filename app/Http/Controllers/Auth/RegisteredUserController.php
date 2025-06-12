<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'UserName' => 'required|min:2|max:12',
            'MailAdress' => 'required|unique:users,email|between:5,40',
            'Password' => 'required|regex:/^[a-zA-Z0-9]+$/|between:8,20|same:PasswordConfirm',
            'PasswordConfirm' => 'required|regex:/^[a-zA-Z0-9]+$/|between:8,20'
        ]);
        User::create([
            'username' => $request->UserName,
            'email' => $request->MailAdress,
            'password' => Hash::make($request->Password),
        ]);
        Session::put('username', $request->UserName);


        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
