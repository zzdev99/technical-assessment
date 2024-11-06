<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->get('/get-category-tree', [CategoryController::class, 'getCategoryTree']);
