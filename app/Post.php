<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use commentableTrait, likeableTrait, recordFeedsTrait;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isLike($postId)
    {
        $post = $this->find($postId);

        return (boolean) $post->likes()->where('user_id', Auth::user()->id)->first();
    }
}
