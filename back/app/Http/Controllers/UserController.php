<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAlluser(Request $request){
        return User::latest()->get();
    }

    public function signUp(Request $request){
        $request->validate([
            'name' =>  'required|max:50|regex:/^[a-zA-Z]/',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'profile'=>'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);
        $request->file('profile')->store('public/imageUser');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->country = $request->country;
        $user->nationality = $request->nationality;
        $user->phone = $request->phone;
        $user->profile = $request->file('profile')->hashName();
        $user->save();

        return response()->json(['message' => 'Created', 'user' => $user],201);
    }

    //================Signin user===============
    public function signin(Request $request)
    {
        $user = User::where('email', $request->email)->first();
       
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['message' => "Unauthorized"], 401);
        }
       
        return response()->json([
            'message' => 'Login successfully!',
            'user' => $user
        ]);
    }
    
}

