<?php

namespace App\Http\Controllers\api;

use App\CategoryMovie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryMoviesController extends Controller
{
    public function create(Request $request)
    {
        try {
            $categoryMovie = new CategoryMovie();
            $categoryMovie->movie_id = $request->movie_id;
            $categoryMovie->category_id = $request->category_id;
            $categoryMovie->save();

            return response()->json(['Category movie create successfully', $categoryMovie], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function read()
    {
        try {
            $categoryMovies = CategoryMovie::select(
                'category_movies.id',
                'movies.name as movie',
                'categories.name as category'
            )
                ->join('movies', 'category_movies.movie_id', '=', 'movies.id')
                ->join('categories', 'category_movies.category_id', '=', 'categories.id')
                ->get();

            return response()->json(['Category movies read successfully', $categoryMovies], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $categoryMovie = CategoryMovie::find($id);
            $categoryMovie->movie_id = $request->movie_id;
            $categoryMovie->category_id = $request->category_id;
            $categoryMovie->save();

            return response()->json(['Category movies update successfully', $categoryMovie], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $categoryMovie = CategoryMovie::find($id);
            $categoryMovie->delete();

            return response()->json(['Category movie delete successfully', $categoryMovie], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }
}
