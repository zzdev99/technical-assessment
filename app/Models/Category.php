<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $appends = ['count'];

    // Relations
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')
            ->with('children');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product');
    }

    public function getAllDescendantIds()
    {
        $descendants = collect([$this->id]);

        $this->children->each(function ($child) use (&$descendants) {
            $descendants = $descendants->merge($child->getAllDescendantIds());
        });

        return $descendants->unique();
    }

    // Scope
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }

    // Accessors

    // Prikaže število izdelkov v trenutni kategoriji + vseh child kategorij
    public function getCountAttribute()
    {
        $categoryIds = $this->getAllDescendantIds();

        return Product::whereHas('categories', function ($query) use ($categoryIds) {
            $query->whereIn('categories.id', $categoryIds);
        })->count();
    }
}
