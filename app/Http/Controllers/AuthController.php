<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerform()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
        // validation 
        $data = $request->validate([
            "name" => "required|string|max:100",
            "email" => "required|email|max:100|unique:users,email",
            "password" => "required|string|min:6"
        ]);
        // password
        $data['password'] = bcrypt($data['password']);
        $data['type'] = 'user';
        // create
        $user = User::create($data);
        // make login and go to home page
        Auth::login($user);

        // redirct
        return redirect('redirect');
    }

    public function loginform()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
        // validation 
        $data = $request->validate([

            "email" => "required|email|max:100",
            "password" => "required|string|min:6"
        ]);
        // check in db and login
        $auth = Auth::attempt(["email" => $data['email'], "password" => $data['password']]);
        if (!$auth) {
            return redirect(url("loginform"))->withErrors("credentials not correct");
        } else {
            return redirect("redirect");
        }
    }
    public function logout(){
        Auth::logout();
        return redirect("loginform");

    }
    public function redirect(){
        if(Auth::user()->type=='admin'){
            return redirect("dashboard");

        }
        else{
            return redirect(url('/'));
        }
    }
}
