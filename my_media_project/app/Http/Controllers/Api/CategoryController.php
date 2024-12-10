<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::select('category_id', 'title', 'description')->get();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    public function searchCategory(Request $request)
    {

        $posts = Category::select('posts.*')
            ->join('posts', 'posts.category_id', 'categories.category_id')
            ->where('categories.title', 'LIKE', '%' . $request->key . '%')
            ->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }
}
