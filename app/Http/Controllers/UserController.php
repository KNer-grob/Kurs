<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuthRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function register(UserRegisterRequest $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json(["token" => $user->createToken('api')->plainTextToken]);
    }

    public function login(UserAuthRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                if ($user->role == 'admin') {
                    return response()->json(["token" => $user->createToken('api')->plainTextToken, 'user' => $user]);
                }
                return response()->json(["token" => $user->createToken('api')->plainTextToken, 'user' => $user]);

            }
        }
        return response()->json(['errors' => ['login' => 'не верный логин или пароль']], 401);
    }
     public function user(){
         return response()->json(['user' => Auth::user()]);
    }
       public function usersSpisok()
    {
        return User::where('role', 'user')->get();
    }
}
