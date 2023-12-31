<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Item;

class DiscountService
{
    public function itemsDiscount($discount)
    {
        $items = Item::all();

        foreach ($items as $item) {
            $item->discount_price = $item->price - ($item->price * $discount) / 100;
            $item->save();
        }
    }

    public function categoryItemsDiscount($category_id, $discount)
    {
        $category = Category::with('children', 'items')->where('id', $category_id)->first();
        if (count($category->items) > 0) {
            // dd($category->items);
            foreach ($category->items as $item) {
                $item->discount_price = $item->price - ($item->price * $discount) / 100;
                $item->save();
            }
        }

        if (count($category->children) > 0) {
            foreach ($category->children as $child) {
                $this->subCategoriesItemsDiscount($child->id, $discount);
            }
        }
    }

    public function subCategoriesItemsDiscount($subcategory_id, $discount)
    {
        $subcategory = Category::with('items')->where('id', $subcategory_id)->first();
        if (count($subcategory->items) > 0) {
            foreach ($subcategory->items as $item) {
                $item->discount_price = $item->price - ($item->price * $discount) / 100;
                $item->save();
            }
        }
    }

    public function itemDiscount($item_id, $discount)
    {
        $item = Item::where('id', $item_id)->first();
        $item->discount_price = $item->price - ($item->price * $discount) / 100;
        $item->save();
    }
}