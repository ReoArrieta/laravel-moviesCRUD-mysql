<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use App\User;
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

            return response()->json($token, 200);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    public function allUsers()
    {
        try {
            $users = User::all();

            return response()->json($users, 200);
        } catch (Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
