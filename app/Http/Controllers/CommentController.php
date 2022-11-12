<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($postId)
    {
        $post = Post::find($postId);
        $data = request()->all();
            $comment = $post->comments()->create([
                'body' => $data["comment"]
            ]);
        // dd()
        return redirect()->route('posts.show',$postId);
    }
}
