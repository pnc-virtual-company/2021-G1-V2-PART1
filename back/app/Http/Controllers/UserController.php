<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAlluser(Request $request){
        return User::get();
    }

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

// "1|kkS0kI5nBzKFg12lDvAfRclXMMXLcWVUnfQimjsz
//2|pNHbqwCLyyu1UJ3p6BVoaI840F22sVY2b6svFi6w
