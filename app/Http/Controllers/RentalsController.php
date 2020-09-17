<?php

namespace App\Http\Controllers;

use App\Rental;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Rental::select([
            'rentals.id',
            'rentals.start_date as inicio',
            'rentals.end_date as fin',
            'rentals.total',
            'users.name as user',
            'statuses.name as estatus'

        ])
        ->join('users', 'rentals.user_id', '=', 'users.id')
        ->join('statuses', 'rentals.status_id', '=', 'statuses.id')
        ->get();
        return view('Rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Rentals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $rental = new Rental();
        $rental->start_date = $request->finicio;
        $rental->end_date = $request->ffin;
        $rental->total = $request->total;
        $rental->user_id= $user->id;
        $rental->status_id = 1;
        $rental->save();

        return redirect('rentals');
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
        $rental = Rental::find($id);
        $statuses = Status::all();
        return view('Rentals.update', compact('rental','statuses'));
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
        $user = Auth::user();
        $rental = Rental::find($id);
        $rental->start_date = $request->finicio;
        $rental->end_date = $request->ffin;
        $rental->user_id= $user->id;
        $rental->status_id =$request->status_id;
        $rental->save();

        return redirect('rentals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rental = Rental::find($id);
        $rental->delete();
        
        return redirect()->back();
    }
}
