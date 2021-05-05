<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest']);
    }
    
    public function index()
    {
        // time 50:30
        // validation
        return view('auth.login');
    }

    public function store(Request $request)
    {

        
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
        ]);
        
        if( !Auth::attempt($request->only('email', 'password'), $request->remember) ) {
            return back()->with('status', 'invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
