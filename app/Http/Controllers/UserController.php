<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function registerUser(Request $req) {
        // dd($req->all());

        $req->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'cpassword' => 'required',
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'cpassword' => Hash::make($req->cpassword),
        ]);

        return redirect('/login');

        // if($req){ 
        //     return redirect('/login');
        // }else{
        //     return back() -> with ('fail','Unable to Sign Up');
        // }
    }
}
