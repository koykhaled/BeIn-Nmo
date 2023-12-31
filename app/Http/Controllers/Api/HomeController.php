<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;

class HomeController extends Controller
{
    //

    public function index()
    {
        $categories = Category::count();
        $items = Item::count();

        return response()->json([
            'items' => $items,
            'categories' => $categories,
            'message' => "All Categories"
        ], 200);
    }
}