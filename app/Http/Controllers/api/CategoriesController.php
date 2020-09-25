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
            $category->status_id = $request->status_id;
            $category->save();

            return response()->json(
                [
                    'Message' => 'Category create successfully',
                    'Data' => $category
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
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

            return response()->json(
                [
                    'Message' => 'Categories read successfully',
                    'Data' => $categories
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    public function readOne($id)
    {
        try {
            $category = Category::find($id);

            return response()->json(
                [
                    'Message' => 'Category read successfully',
                    'Data' => $category
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;
            $category->status_id = $request->status_id;
            $category->save();

            return response()->json(
                [
                    'Message' => 'Category update successfully',
                    'Data' => $category
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }

    public function delete($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();

            return response()->json(
                [
                    'Message' => 'Category delete successfully',
                    'Data' => $category
                ],
                200
            );
        } catch (\Exception $e) {
            return response()->json(['Message' => $e->getMessage(), 'Code' => $e->getCode()]);
        }
    }
}
