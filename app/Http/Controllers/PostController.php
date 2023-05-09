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
            'message' => 'Post successfully created',
        ], 201);
    }

    public function show($id)
    {
        try {
            $post = Post::query()->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $post
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => $e->getMessage(),
                'message' => 'Post not found'
            ], 404);
        }
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'author_name' => ['exists:authors,id'],
            'title' => ['string', 'max:256'],
            'link' => ['string', 'max:256'],
            'amount_of_upvotes' => ['integer'],
        ]);

        $post->update($request->all());

        return response()->json([
            'data' => $post,
            'message' => 'Post successfully updated',
        ]);
    }

    public function upvote(Post $post)
    {
        $post->increment('amount_of_upvotes');

        return response()->json([
            'data' => $post,
            'message' => 'Amount of upvotes increased',
        ]);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json([
            'data' => $post,
            'message' => "Post successfully deleted",
        ]);
    }
}
