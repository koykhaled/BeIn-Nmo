<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $item = Item::where('id', $this->id)->first();

        $category = Category::where('id', $item->category_id)->first();

        return [
            'name' => $this->name,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'category' => $category->name
        ];
    }
}