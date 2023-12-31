<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if ($this->parent_id !== null) {
            $parent = Category::where('id', $this->parent_id)->first();
        }


        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent' => $parent->name ?? 'No Parent'
        ];
    }
}