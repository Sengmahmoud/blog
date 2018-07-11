<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($id,Request $request)
    {
        $post=Post::find($id);
        $comment=new Comment();
        $comment->body=$request->body;
        $comment->post_id=$post->id;
        $comment->save();
        return back();

    }
}
