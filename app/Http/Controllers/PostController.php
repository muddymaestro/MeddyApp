<?php

namespace App\Http\Controllers;

use App\Post;
use App\Like;
use App\User;
use App\ActivityFeed;
use Auth;
use Session;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'data.post' => 'required'
        ]);

        $userId = Auth::user()->id;
        $userName = Auth::user()->name;
        $post = new Post();
        $post->user_id = $userId;
        $post->body = $request->input('data.post');

        $post->save();

        return response()->json(['post' => $post]);
    }

    /**
     * Fetching posts from the database.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function fetchPosts()
    {
        $posts = Post::latest()->get();
        $users = User::where('id', '!=', auth()->user()->id)->get();

        $feeds = ActivityFeed::where('user_id', '=', auth()->id())
                                ->where('type', '=', 'created_post')
                                ->get();

        return response()->json(['html' => view('posts.home', compact(['posts', 'users', ]))->render(), 'feeds' => $feeds]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function postLikesCount($post_id)
    {
        $likesCount = Like::where('likeable_id', $post_id)->count(); 
        return response()->json(['likesCount' => $likesCount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
