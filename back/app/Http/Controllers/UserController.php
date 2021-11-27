<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function signup(Request $request){
        $request->validate([
            'password' => 'required|confirmed',
        ]);
        //create user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        //create Token

        $token = $user->createToken('mytoken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=> $token,
        ]);
    }
    public function signin(Request $request){
        
        // check email
        $user = User::where('email',$request->email)->first();

        // check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Bad login'],401);
        }

        //create Token
        $token = $user->createToken('mytoken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=> $token,
        ]);
    }
    
}

// "1|kkS0kI5nBzKFg12lDvAfRclXMMXLcWVUnfQimjsz"
