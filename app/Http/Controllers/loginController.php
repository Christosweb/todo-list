<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    //
    public function index()
    {   
         return view('login');
    }

    public function show(Request $request)
    {
       $remember = $request->has('remember');
    
        $credentials = $request->validate([
            'email'=>'required|email',
            'password' =>'required'
        ]);

       $authenticatedUser = Auth::attempt( $credentials, $remember );
    
       if ($authenticatedUser) {

        $request->session()->regenerate();

        return redirect()->intended('dashboard');
       }

       return back()->withErrors('check your inputs detail');
     }
   
}
