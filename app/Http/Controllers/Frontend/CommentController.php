<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Story $story)
    {
        $request->validate([
            'content' => 'required|string|max:2000',
            'parent_id' => 'nullable|exists:comments,id'
        ]);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'story_id' => $story->id,
            'parent_id' => $request->parent_id,
            'content' => $request->content,
            'likes' => 0
        ]);

        // Increment story comment count
        $story->increment('comment_count');

        return redirect()->back()->with('success', 'Your comment has been posted.');
    }

    public function toggleLike(Comment $comment)
    {
        $userId = auth()->id();
        $like = \App\Models\CommentLike::where('user_id', $userId)
                                       ->where('comment_id', $comment->id)
                                       ->first();
        
        if ($like) {
            $like->delete();
            $comment->decrement('likes');
            return response()->json(['success' => true, 'liked' => false, 'likes_count' => $comment->likes]);
        } else {
            \App\Models\CommentLike::create([
                'user_id' => $userId,
                'comment_id' => $comment->id
            ]);
            $comment->increment('likes');
            return response()->json(['success' => true, 'liked' => true, 'likes_count' => $comment->likes]);
        }
    }
}
