<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller {

    function registerUser(Request $req) {
        $formFields = $req->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed:username',]
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in !');
    }

    function logout(Request $req) {
        auth()->logout();

        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/')->with('message', 'User Logged out!');
    }

    function login(Request $req) {
        $formFields = $req->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $req->session()->regenerate();
            return redirect('/')->with('message', 'user logged in !');
        }

        return back()->withErrors('Invalid credentials');
    }

    function manageView() {
        $userListings = Listing::where('user_id', auth()->user()->id)->get();
        return view('user.manage', ['userListings' => $userListings]);
    }
}
