<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follows_id', 'user_id');
    }

    public function follows()
    {
        return $this->belongsToMany(self::class, 'followers', 'user_id', 'follows_id');
    }

    public function follow($userId)
    {
        if($this->follows()->attach($userId)){
            return $this;
        }
        return false;
    }

    public function unfollow($userId)
    {
        if($this->follows()->wherePivot('follows_id', $userId)->detach()){
            return $this;
        }
        return false;
    }

    public function isFollowing($userId)
    {
        return (boolean) $this->follows()->where('follows_id', $userId)->first();
    }
    
}
