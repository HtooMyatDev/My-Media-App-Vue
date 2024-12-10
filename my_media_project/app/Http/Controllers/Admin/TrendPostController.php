<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ActionLog;

class TrendPostController extends Controller
{
    public function index()
    {
        $posts = ActionLog::select('posts.*', DB::raw('COUNT(action_logs.post_id) as post_view'))
            ->leftJoin('posts', 'posts.post_id', 'action_logs.post_id')
            ->groupBy('action_logs.post_id')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(2);
        return view('admin.trendPost.index', compact('posts'));
    }
}
