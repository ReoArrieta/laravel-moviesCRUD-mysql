<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDF(){

        $movies = Movie::select(
            'movies.id',
            'movies.name as name',
            'movies.description',
            'users.name as user',
            'statuses.name as status'
        )
            ->join('users', 'movies.user_id', '=' ,'users.id')
            ->join('statuses', 'movies.status_id', '=' ,'statuses.id')
            ->get();

        $pdf = \PDF::loadView('pdf', ['movies' => $movies]);
        return $pdf->download('movies.pdf');
    }
}
