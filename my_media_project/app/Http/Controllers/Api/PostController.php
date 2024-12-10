<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function allPost()
    {
        $posts = Post::get();

        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function searchPost(Request $request)
    {
        $posts = Post::where('title', 'LIKE', '%' . $request->key . '%')->get();
        return response()->json([
            'posts' => $posts
        ], 200);
    }

    public function postDetails(Request $request)
    {
        $postId = $request->postsId;
        $post = Post::where('post_id', $postId)->first();
        return response()->json([
            'post' => $post
        ], 200);
    }
}
