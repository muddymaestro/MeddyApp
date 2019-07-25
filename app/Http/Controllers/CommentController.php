<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Comment;
use Session;
use Illuminate\Http\Request;
use App\Notifications\Comments;

class CommentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $request->validate(['data.comment' => 'required']);

        $post = Post::find($post_id);
        $comment = $post->addComment($request->input('data.comment'));

        if(Auth::user()->id !== $post->user->id)
        {
            $post->user->notify(new Comments($comment));
        }
        
        Session::flash('success', 'Comment has been posted successfully');

        return response()->json(['comment' => $comment, 'username' => $comment->user->name]);
    }

    public function reply(Request $request, $comment_id)
    {
        $request->validate(['data.reply' => 'required']);

        $comment = Comment::find($comment_id);
        $reply = $comment->addComment($request->input('data.reply'));

        Session::flash('success', 'Reply has been posted successfully');

        return response()->json(['reply' => $reply, 'username' => $reply->user->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
