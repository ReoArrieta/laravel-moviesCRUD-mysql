<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategoryMovie;
use App\Movie;
use Illuminate\Http\Request;

class CategoryMoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryMovies = CategoryMovie::select(
            'category_movies.id',
            'movies.name as movie',
            'categories.name as category'
        )
        ->join('movies','category_movies.movie_id', '=', 'movies.id')
        ->join('categories','category_movies.category_id', '=', 'categories.id')
        ->get();

        return view('categoryMovies.index', compact('categoryMovies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $categories = Category::all();
        return view('categoryMovies.create', compact('movies','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryMovie = new CategoryMovie();
        $categoryMovie->movie_id = $request->movie;
        $categoryMovie->category_id = $request->category;
        $categoryMovie->save();

        return redirect('categoryMovies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryMovie = CategoryMovie::find($id);
        $movies = Movie::all();
        $categories = Category::all();
        return view('categoryMovies.update', compact('categoryMovie','movies','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoryMovie = CategoryMovie::find($id);
        $categoryMovie->movie_id = $request->movie;
        $categoryMovie->category_id = $request->category;
        $categoryMovie->save();

        return redirect('categoryMovies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoryMovie = CategoryMovie::find($id);
        $categoryMovie->delete();

        return redirect()->back();
    }
}
