<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        $title = "Page Login";
        return view('backend.login.login', compact(
            'title'
        ));
    }
    public function register(){
        $title = "Page Register";
        return view('backend.login.register', compact(
            'title'
        ));
    }


    public function regis_account(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = "user";

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Successfull');
        return redirect('/login')->with('success', 'Registration Successfull');
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            // 'email' => 'required|email:dns',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            if(auth()->user()->role === 'admin'){
                return redirect()->intended('/dashboard');
            }else{
                return redirect()->intended('/');
            }
            // return redirect()->intended('/dashboard');
        }

        return back()->with('danger', 'Login Failed');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
