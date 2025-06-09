<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login.index', [
            'title' => "Login",
            'active' => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/');
    }
    // mobile
    public function authenticateMobile(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
           // Get the authenticated user
            //$user = Auth::user();
            $user = User::where('email', $request->email)->first();
            // Create a personal access token (using Laravel Sanctum)
             $token = $user->createToken('mobile_token')->plainTextToken;
            
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
                'message' => 'Login successful',
            ], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
