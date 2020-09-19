<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\MovieRental;
use Illuminate\Http\Request;

class MovieRentalsController extends Controller
{
    // POST
    public function create(Request $request)
    {
        try {

            $movieRental = new MovieRental();
            $movieRental->movie_id = $request->movie_id;
            $movieRental->rental_id = $request->rental_id;
            $movieRental->price = $request->price;
            $movieRental->observations = $request->observations;
            $movieRental->save();

            return response()->json(['Movie Rental create successfully', $movieRental], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    // GET
    public function read()
    {
        try {

            $movieRentals = MovieRental::select([
                'movie_rentals.id',
                'movies.name as movie',
                'rentals.start_date as rental',
                'movie_rentals.price',
                'movie_rentals.observations'
            ])
                ->join('movies', 'movie_rentals.movie_id', '=', 'movies.id')
                ->join('rentals', 'movie_rentals.rental_id', '=', 'rentals.id')
                ->get();

            return response()->json(['Movie Rentals read successfully', $movieRentals]);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    // PUT
    public function update(Request $request, $id)
    {
        try {

            $movieRental = MovieRental::find($id);
            $movieRental->price = $request->price;
            $movieRental->observations = $request->observations;
            $movieRental->save();

            return response()->json(['Movie Rental update succesfully', $movieRental]);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    // DELETE
    public function delete($id)
    {
        try {

            $movieRental = MovieRental::find($id);
            $movieRental->delete();

            return response()->json(['Movie Rental delete succesfully', $movieRental]);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }
}
