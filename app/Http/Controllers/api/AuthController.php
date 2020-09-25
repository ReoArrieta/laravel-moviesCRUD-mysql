<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password))
                return response()->json("Usuario y/o contraseña erronea", 401);

            $token = $user->createToken('Auth Token')->accessToken;

            return response()->json(['token' => $token, 'user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    public function signup(Request $request)
    {
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            return response()->json(
                [
                    'Message' => 'User registered successfully',
                    'Data'=> $user
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }
}
