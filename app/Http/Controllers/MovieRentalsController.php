<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MovieRental;
use App\Rental;
use Illuminate\Http\Request;

class MovieRentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movieRentals = MovieRental::select([
            'movie_rentals.id',
            'movies.name as movie',
            'movie_rentals.observations',
            'movie_rentals.price',
            'rentals.start_date as rental',
        ])
        ->join('movies', 'movie_rentals.movie_id', '=', 'movies.id')
        ->join('rentals', 'movie_rentals.rental_id', '=', 'rentals.id')
        ->get();
        return view('movieRentals.index', compact('movieRentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $rentals= Rental::all();
        return view('movieRentals.create',compact('movies','rentals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $movieRental = new MovieRental();
        $movieRental->movie_id = $request->movie;
        $movieRental->observations = $request->obs;
        $movieRental->price = $request->price;
        $movieRental->rental_id = $request->renta;
        $movieRental->save();

        return redirect('movieRentals');
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
        $movieRental = MovieRental::find($id);
        $rentals = Rental::all();
        $movies = Movie::all();
        return view('movieRentals.update', compact('movieRental','rentals','movies'));
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
        $movieRental = MovieRental::find($id);
        $movieRental->movie_id = $request->movie;
        $movieRental->observations = $request->obs;
        $movieRental->save();

        return redirect('movieRentals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movieRental = MovieRental::find($id);
        $movieRental->delete();
        
        return redirect()->back();
    }
}
