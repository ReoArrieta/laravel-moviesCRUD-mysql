<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Rental;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    public function create(Request $request)
    {
        try {
            $rental = new Rental();
            $rental->start_date = $request->start_date;
            $rental->end_date = $request->end_date;
            $rental->total = $request->total;
            $rental->user_id = $request->user_id;
            $rental->status_id = 1;
            $rental->save();

            return response()->json(['Rental create successfully', $rental], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function read()
    {
        try {
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

            return response()->json(['Rentals read successfully', $rentals], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $rental = Rental::find($id);
            $rental->start_date = $request->start_date;
            $rental->end_date = $request->end_date;
            $rental->total = $request->total;
            $rental->user_id = $request->user_id;
            $rental->status_id = $request->status_id;
            $rental->save();

            return response()->json(['Rental update successfully', $rental], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $rental = Rental::find($id);
            $rental->delete();

            return response()->json(['Rental delete successfully', $rental], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }
}
