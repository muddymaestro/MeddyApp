<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class UserController extends Controller
{
    
    public function follow(User $user, $id)
    {
        $follower = auth()->user();
        
        if(!$follower->isFollowing($id)) {

            $follower->follow($id);

            // sending a notification
            //$user->notify(new UserFollowed($follower));

            return response()->json(['message' => 'you are now friends']);
        }

        Session::flash('success', 'You are already following this user');

        return response()->json(['message' => 'you are already following this']);
    }

    public function unfollow(User $user, $id)
    {
        $follower = auth()->user();
        
        if($follower->isFollowing($id)) {

            $follower->unfollow($id);

            return response()->json(['message' => 'you are no longer friends']);
        }

        Session::flash('success', 'You are not following this user');

        return response()->json(['message' => 'you are not following this user']);
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
}
