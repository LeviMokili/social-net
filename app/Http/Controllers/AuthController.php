<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }



    public function save_user(Request $request)
    {
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return response()->json([
                'status' => 200,
                'messages' => 'created'
            ]);
        }
    }


    public function login_user(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($validated)) {
            $request->session()->regenerate();
            return response()->json([
                'status'=>200,
            ]);
        }else{
            return response()->json([
                'status'=>400,
                'messages'=>'incorrect email or password'
            ]);
        }
    }


    public function logout(){
      auth()->logout();
      request()->session()->invalidate();
      return redirect()->route('login');
    }
}
