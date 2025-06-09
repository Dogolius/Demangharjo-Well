<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('register.index', [
            'title' => "Register",
            'active' => "register"
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        //$validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        
        //$request->session()->flash('success', 'Registration successfull, please log in');
        return redirect('/login')->with('success', 'Registration successfull, please log in');
    }

    public function storeMobile(Request $request)
    {
       // Use Validator instead of validate() for better error handling
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // Hash password before saving
        $validatedData = $validator->validated();

        $validatedData['password'] = Hash::make($validatedData['password']);
        //$validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        
        //$request->session()->flash('success', 'Registration successfull, please log in');
        //return redirect('/login')->with('success', 'Registration successfull, please log in');
        return response()->json(['message' => 'Success, please log in'], 200);
    }
}
