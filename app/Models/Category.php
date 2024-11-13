<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Relations
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')
            ->with('children')->withCount('products');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    // Scope
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id')->withCount('products');
    }
}
