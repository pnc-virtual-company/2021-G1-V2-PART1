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
            'name' => 'min:5|max:20',
            'email' => 'required',
            'password' => 'required|confirmed',
            'profileImg' => 'required|image|max:1999',
            
        ]);
        $request->file('profileImg')->store('public/images');

        //create user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->profileimg = $request->file('profileImg')->hashName();

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
    public function show($id)
    {
        return User::findOrFail($id);
    }
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'min:5|max:20',
            'email' => 'required',
            'password' => 'required|confirmed',
            'profileImg' => 'required|image|max:1999',
            
        ]);
        $request->file('profileImg')->store('public/images');

        //create user
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->profileimg = $request->file('profileImg')->hashName();

        $user->save();

        //create Token

        $token = $user->createToken('mytoken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token'=> $token,
        ]);
    }
    
    public function destroy($id)
    {
        
        $user = User::destroy($id);
        if ($user == 1) {
            return response()->json(['message' =>'Deleted successfully'], 200);
        }else {
            return response()->json(['message' =>'Cannot delete, no id found'], 404);
        }
    }
    
}

// 1|gVYBT69cwEn91Kkx9dQyFWoOzgny1ZQEBVaOwbDQ
