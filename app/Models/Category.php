<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $appends = ['count'/*, 'successors_count'*/];

    // Relations
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')
            ->with('children');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    // Scope
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    // Accessors
    public function getCountAttribute()
    {
        return $this->products()->count();
    }

    //* SUCCESSORS COUNT
    // public function getSuccessorsCountAttribute()
    // {
    //     return Category::where('parent_id', $this->id)
    //         ->orWhere(function ($query) {
    //             $query->whereIn('parent_id', function ($subquery) {
    //                 $subquery->select('id')
    //                     ->from('categories')
    //                     ->where('parent_id', $this->id);
    //             });
    //         })
    //         ->count();
    // }
}
