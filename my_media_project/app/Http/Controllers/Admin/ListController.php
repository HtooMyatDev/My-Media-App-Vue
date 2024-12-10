<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index()
    {
        $users = User::select('id', 'name', 'email', 'phone', 'address', 'gender')
            ->when(request('searchKey'), function ($query) {
                $query->whereAny(['name', 'email', 'address', 'id'], "like", "%" . request('searchKey') . "%");
            })
            ->get();
        // dd(request('searchKey'));
        return view('admin.list.index', compact('users'));
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return back();
    }
}
