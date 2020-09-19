<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function create(Request $request)
    {
        try {
            $movie = new Movie();
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->user_id = $request->user_id;
            $movie->status_id = 1;
            $movie->save();

            return response()->json(['Movie create successfully', $movie], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function read()
    {
        try {
            $movies = Movie::select(
                'movies.id',
                'movies.name as name',
                'movies.description',
                'users.name as user',
                'statuses.name as status'
            )
                ->join('users', 'movies.user_id', '=', 'users.id')
                ->join('statuses', 'movies.status_id', '=', 'statuses.id')
                ->get();

            return response()->json(['Movies read successfully', $movies], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $movie = Movie::find($id);
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->status_id = $request->status_id;
            $movie->save();

            return response()->json(['Movie update successfully', $movie], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $movie = Movie::find($id);
            $movie->delete();

            return response()->json(['Movie delete successfully', $movie], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }
}
