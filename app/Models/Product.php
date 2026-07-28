<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    protected $fillable = [

        'category_id',
        'name',
        'gender',
        'slug',
        'description',
        'images',
        'price',
        'stock',
        'featured'

    ];
    public function category()
{
    return $this->belongsTo(Category::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}


public function getFirstImageAttribute()
{
    $images = json_decode($this->images, true);

    if (!$images) {
        $images = explode(',', str_replace(['[', ']', '"'], '', $this->images));
    }

    $images = array_filter(array_map('trim', $images));

    return $images[0] ?? 'placeholder.png';
}

}