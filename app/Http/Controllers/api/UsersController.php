<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    // GET
    public function read()
    {
        try {
            $users = User::all();

            return response()->json(
                [
                    'Message' => 'Users read successfully',
                    'Data' => $users
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    // GET
    public function readOne($id)
    {
        try {
            $user = User::find($id);

            return response()->json(
                [
                    'Message' => 'User read successfully',
                    'Data' => $user
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    // PUT
    public function update(Request $request, $id)
    {
        try {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return response()->json(
                [
                    'Message' => 'User update successfully',
                    'Data' => $user
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }

    // DELETE
    public function delete($id)
    {
        try {

            $user = User::find($id);
            $user->delete();

            return response()->json(
                [
                    'Message' => 'User delete successfully',
                    'Data' => $user
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->error($e->getMessage(), $e->getCode());
        }
    }
}
