<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Http\Resources\ItemResource;
use App\Http\Traits\ApiResponse;
use App\Models\Category;
use App\Models\Item;
use App\Services\DiscountService;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    use ApiResponse;

    protected $discount_service;

    /**
     * @param DiscountService $discount_service
     * apply discount by type 
     */

    public function __construct(DiscountService $discount_service)
    {
        $this->discount_service = $discount_service;
    }

    public function index()
    {
        $items = ItemResource::collection(Item::all());

        return response()->json([
            'items' => $items,
            'message' => "All Categories"
        ], 200);
    }


    public function store(StoreItemRequest $request)
    {

        try {
            $category = Category::where('id', $request->category_id)->first();

            if (count($category->children) > 0) {
                throw new Exception("Mixed Child Not allowed");
            }

            $item = $category->items()->create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            $message = "Items Created Successfully";
            return $this->successResponse($item, $message, 201);
        } catch (Exception $e) {
            return $this->errorResponse("Error => {$e->getMessage()}!!", 400);
        }
    }

    public function applyDiscount(Request $request)
    {
        try {
            if ($request->type == "menu") {
                $this->discount_service->itemsDiscount($request->discount);
            } elseif ($request->type == 'category') {
                $this->discount_service->categoryItemsDiscount($request->category_id, $request->discount);
            } else {
                $this->discount_service->itemDiscount($request->item_id, $request->discount);
            }
            return $this->successResponse(null, "Discount applied successfully", 200);
        } catch (Exception $e) {
            return $this->errorResponse("Error => {$e->getMessage()}!!!", 400);
        }
    }

    public function delete($slug)
    {
        try {
            $item = Item::where('slug', $slug)->first();
            $item->delete();
            return response()->json([
                'message' => "Item Deleted Successfully",
                'status' => true
            ], 200);
        } catch (Exception $e) {
            return $this->errorResponse("Error => {$e->getMessage()}");
        }

    }
}