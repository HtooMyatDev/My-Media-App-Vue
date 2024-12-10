<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogController extends Controller
{
    public function add(Request $request)
    {
        ActionLog::create([
            'user_id' => $request->user,
            'post_id' => $request->post
        ]);

        $view = ActionLog::where('post_id', $request->post)
            ->get();
        return response()->json($view, 200);
    }
}
