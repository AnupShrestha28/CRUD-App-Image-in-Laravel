<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function userLogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/product-list');
        }else{
            return back()->with('fail', 'Incorrect email address or password');
        }
    }

    public function register(){
        return view('register');
    }

    public function userRegister(Request $request){
        //validating the form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $name = $request->name;
        $email = $request->email;
        $password = Hash::make($request->password);

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;

        $user->save();

        return redirect('/login')->with('success', 'Registered Successfully');
    }
}
