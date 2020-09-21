<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Movie;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    // POST
    public function create(Request $request)
    {
        try {
            $movie = new Movie();
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->user_id = $request->user_id;
            $movie->status_id = $request->status_id;
            $movie->save();

            return response()->json(
                [
                    'Message' => 'Movie create successfully',
                    'Data' => $movie
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    // GET
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

            return response()->json(
                [
                    'Message' => 'Movies read successfully',
                    'Data' => $movies
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    // GET
    public function readMovie($id)
    {
        try {
            $movie = Movie::find($id);

            $movie->select(
                'movies.id',
                'movies.name as name',
                'movies.description',
                'users.name as user',
                'statuses.name as status'
            )
                ->join('users', 'movies.user_id', '=', 'users.id')
                ->join('statuses', 'movies.status_id', '=', 'statuses.id')
                ->get();

            return response()->json(
                [
                    'Message' => 'Movie read successfully',
                    'Data' => $movie
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    // PUT
    public function update(Request $request, $id)
    {
        try {
            $movie = Movie::find($id);
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->status_id = $request->status_id;
            $movie->save();

            return response()->json(
                [
                    'Message' => 'Movie update successfully',
                    'Data' => $movie
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    // DELETE
    public function delete($id)
    {
        try {
            $movie = Movie::find($id);
            $movie->delete();

            return response()->json(
                [
                    'Message' => 'Movie delete successfully',
                    'Data' => $movie
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }
}
