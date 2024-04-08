<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function registerform(){
        return view('auth.register');
    }
    public function register(Request $request){
        $user = new Customer();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();

        Auth::login($user);
        return redirect('/');

    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended('/dashboard');
        } else {
            return "invalid credentials";
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
