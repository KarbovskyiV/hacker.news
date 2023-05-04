<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return response()->json(['data' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => ['required', 'exists:authors,id'],
            'title' => ['required', 'string', 'max:256'],
            'link' => ['required', 'string', 'max:256'],
            'amount_of_upvotes' => ['required', 'integer'],
        ]);

        $post = Post::query()->create($request->all());
        return response()->json([
            'data' => $post,
        ], 201);
    }
}
