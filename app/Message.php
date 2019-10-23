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
}
