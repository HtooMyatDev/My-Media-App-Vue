<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('category_id as id', 'title', 'description', 'updated_at')
            ->when(request('searchKey'), function ($query) {
                $query->whereAny(['title', 'description'], 'like', '%' . request('searchKey') . '%');
            })
            ->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $this->checkValidation($request);
        $data = $this->getData($request);
        Category::create($data);
        Alert::success('Created', 'Category Created Successfully!');
        return back();
    }

    public function updatePage($id)
    {
        $category = Category::where('category_id', $id)->first();
        return view('admin.category.update',compact('category'));
    }

    public function update(Request $request)
    {
        $this->checkValidation($request);
        $data = $this->getData($request);
        Category::where('category_id', $request->category_id)->update($data);
        return to_route('admin#category');
    }

    public function delete($id)
    {
        Category::where('category_id', $id)->delete();
        return back();
    }

    private function checkValidation($request)
    {
        $validationRules = [
            'title' => 'required',
            'description' => 'required'
        ];

        $request->validate($validationRules);
    }

    private function getData($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description
        ];
    }
}
