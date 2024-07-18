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

        session([
            
            'email' => $request->input('email'),
            'password' => $request->input('password')
            
        ]);

        return redirect()->intended('dashboard');
       }
        
       
               


       return back()->with([
        'error'=>'check your inputs detail, password or email is incorrect', 
        'email'=>$credentials['email'],
        'password'=>$credentials['password']
        
    ]);
    
     }
   
     
}
