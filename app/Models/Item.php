<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->slug = Str::slug($item->name);
        });
    }

    public function getNameAttributes($value)
    {
        return $value->ucfirst();
    }

    public function getDescriptionAttributes($value)
    {
        return $value->ucwords();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}