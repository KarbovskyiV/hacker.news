<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return response()->json(['data' => $comments]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => ['required', 'exists:authors,id'],
            'content' => ['required', 'string', 'min:20', 'max:1000'],
        ]);

        $comment = Comment::query()->create($request->all());

        return response()->json([
            'data' => $comment,
            'message' => 'Comment successfully created',
        ], 201);
    }

    public function show($id)
    {
        try {
            $comment = Comment::query()->findOrFail($id);

            return response()->json([
                'status' => 'success',
                'data' => $comment,
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => $e->getMessage(),
                'message' => 'Comment not found'
            ], 404);
        }
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'author_name' => ['exists:authors,id'],
            'content' => ['required', 'string', 'min:20', 'max:1000'],
        ]);

        $comment->update($request->all());

        return response()->json([
            'data' => $comment,
            'message' => 'Comment successfully updated',
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return response()->json([
            'data' => $comment,
            'message' => 'Comment successfully deleted'
        ]);
    }
}
