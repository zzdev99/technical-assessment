<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategoryTree()
    {
        $categories = Category::root()
            ->with(['children.children'])
            ->get();

        return response()->json([
            'categories' => $categories,
        ]);
    }
}
