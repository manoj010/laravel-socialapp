<?php

namespace App\Http\Controllers;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Home;

class UserController extends Controller
{
    public function registerUser(Request $req) {
        // dd($req->all());

        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'cpassword' => Hash::make($req->cpassword),
        ]);

        return redirect() -> route('login');
    }

    public function loginUser(Request $req) {
        // dd($req->all());
    
        $req -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only(['email', 'password']))) {
            // dd('Login');
            return redirect() -> route('dashboard');
        } else {
            // dd('User not found');
            return back() -> with('fail', 'User not found!');
        }
    }

    public function logoutUser() {
        auth() -> logout();
        return redirect() -> route('login');
    }
}
