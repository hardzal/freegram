<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $data = request()->validate([
            'comment' => 'required|string'
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'user_id' => $post->user->id,
            'comment' => $data['comment']
        ]);

        if ($comment) {
            return redirect(route('post.show', $post->id));
        }

        return redirect(route('post.show', $post->id))->with('message', '<strong>Gagal membuat komentar</strong>');
    }

    public function update(Post $post)
    {
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('post.show', $comment->post->id));
    }
}
