<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    // relationship of message and user models
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_to()
    {
        return $this->hasOne(User::class, 'id', 'message_to');
    }

    // Message to (user model)
    public function messageUserTo($thread_id)
    {
        $thread = Thread::findOrFail($thread_id);

        if( $thread->user_one == auth()->id() )
        {
            $user_to = User::findOrFail($thread->user_two);
        }
        else{
            $user_to = User::findOrFail($thread->user_one);
        }

        return $user_to;
    }
}
