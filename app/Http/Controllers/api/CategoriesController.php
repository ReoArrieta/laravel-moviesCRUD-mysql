<?php

namespace App\Http\Controllers\api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function create(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->status_id = 1;
            $category->save();

            return response()->json(['Category create successfully', $category], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function read()
    {
        try {
            $categories = Category::select(
                'categories.id',
                'categories.name',
                'statuses.name as status'
            )
                ->join('statuses', 'categories.status_id', '=', 'statuses.id')
                ->get();

            return response()->json(['Categories read successfully', $categories], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->status_id = $request->status_id;
            $category->save();

            return response()->json(['Category update successfully', $category], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            return response()->json(['Category delete successfully', $category], 200);
        } catch (\Throwable $th) {
            return response()->error($th->getMessage(), $th->getCode());
        }
    }
}
