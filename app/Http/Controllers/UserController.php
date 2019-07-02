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

            return back()->withSuccess("You are now friends with {$user->name}");
        }

        Session::flash('success', 'You are already following this user');

        return redirect()->back();
    }

    public function unfollow(User $user, $id)
    {
        $follower = auth()->user();
        
        if($follower->isFollowing($id)) {

            $follower->unfollow($id);

            return back()->withSuccess("You are no longer friends with {$user->name}");
        }

        Session::flash('success', 'You are not following this user');

        return redirect()->back();
    }

    public function notifications()
    {
        return auth()->user()->unreadNotifications()->limit(5)->get()->toArray();
    }
}
