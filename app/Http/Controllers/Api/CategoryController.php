<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    //
    use ApiResponse;

    public function index()
    {
        if (!Cache::has('cateories')) {
            $data = CategoryResource::collection(Category::all());
            Cache::put('categories', $data, '86400');
        }

        $categories = Cache::get('categories');
        // return $this->successResponse(compact('categories'), "All Categories are retrived", 200);
        return response()->json([
            'categories' => $categories,
            'message' => "All Categories"
        ], 200);
    }

    public function store(StoreCategoryRequest $request)
    {

        try {
            if ($request->has('parent_id') && $request->parent_id !== "null") {

                $category = Category::where('id', $request->parent_id)->first();

                if ($category->level >= 4) {
                    throw new Exception("You Exceeded the maximum allowed level!!");
                }
                if (count($category->items) > 0) {
                    throw new Exception("Mixed Child Not allowed");
                }
                $category = $category->children()->create([
                    'name' => $request->name,
                ]);
                $message = "SubCategory Created Successfully";
            } else {
                $category = Category::create([
                    'name' => $request->name,
                ]);
                $message = "Category Created Successfully";

            }
            return response()->json([
                'message' => $message,
                'status' => true
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => "Error => {$e->getMessage()}",
                'status' => false
            ], 500);
        }
    }

    public function delete($slug)
    {
        try {
            $category = Category::where('slug', $slug)->first();
            $category->delete();
            return response()->json([
                'message' => "Category Deleted Successfully",
                'status' => true
            ], 200);
        } catch (Exception $e) {
            return $this->errorResponse("Error => {$e->getMessage()}");
        }

    }

}