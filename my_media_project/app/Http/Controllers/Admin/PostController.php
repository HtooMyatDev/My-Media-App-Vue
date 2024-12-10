<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::select('post_id', 'title', 'image', 'category_id')->get();
        $categories = Category::select('category_id', 'title')->get();
        return view('admin.post.index', compact("categories", 'posts'));
    }

    public function create(Request $request)
    {
        $this->checkPostValidation($request, 'create');
        $postData = $this->getPostData($request);

        $fileName = uniqid() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('/posts/'), $fileName);

        $postData['image'] = $fileName;

        Post::create($postData);

        return back();
    }

    public function delete(Request $request)
    {

        Post::where('post_id', $request->postID)->delete();
        unlink(public_path('/posts/' . $request->oldImage));
        return back();
    }

    public function editPage($id)
    {
        $categories = Category::select('category_id', 'title')->get();
        $post = Post::select('post_id', 'title', 'description', 'image')
            ->where('post_id', $id)->first();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function edit(Request $request)
    {
        $this->checkPostValidation($request, 'update');

        $post = $this->getPostData($request);


        $oldImage = $request->oldImage;

        if ($request->hasFile('image')) {
            if (file_exists(public_path('posts/' . $oldImage))) {
                unlink(public_path('posts/' . $oldImage));
            }
            $fileName = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $post['image'] = $fileName;

            $request->file('image')->move(public_path() . '/posts/', $fileName);
        } else {
            $post['image'] = $oldImage;
        }

        Post::where('post_id', $request->postID)->update($post);
        return to_route('admin#post#list');
    }
    private function checkPostValidation($request, $action)
    {
        $validationRules = [
            "title" => "required",
            "description" => "required",
            "category_id" => "required",
        ];
        if ($action == 'create') {
            $validationRules["image"] = "required";
        }

        $request->validate($validationRules);
    }

    private function getPostData($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ];
    }
}
