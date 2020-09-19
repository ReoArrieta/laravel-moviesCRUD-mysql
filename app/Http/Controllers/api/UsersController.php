<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function read()
    {
        try {
            $users = User::all();

            return response()->json($users, 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return response()->json(['User update successfully', $user], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function delete($id)
    {
        try {

            $user = User::find($id);
            $user->delete();

            return response()->json(['User delete successfully', $user], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }
}
