<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'user' => $user,
                    'token' => $user->createToken(time())->plainTextToken
                ], 200);
            } else {
                return Response::json([
                    'user' => null,
                    'token' => null
                ]);
            }
        } else {
            return Response::json([
                'user' => null,
                'token' => null
            ]);
        }
    }

    public function register(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name
        ];

        User::create($data);

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'user' => $user,
            'token' => $user->createToken(time())->plainTextToken
        ], 200);
    }

    public function categoryList()
    {
        $category = Category::get();
        return response()->json([
            'category' => $category
        ], 200);
    }
}
