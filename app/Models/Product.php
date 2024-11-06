<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Relations
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
}
