<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $follow_list = Auth::user();
        $follow_users = $follow_list -> following_user() -> get();
        $follow_posts = Post::query() -> whereIn('user_id',$follow_list -> following_user() -> pluck('followed_id')) -> latest() -> get();
        return view('follows.followList',['follow_users' => $follow_users,'follow_posts' => $follow_posts,]);
    }
    public function followerList(){
        $follower_list = Auth::user();
        $follower_users = $follower_list -> followed_user() -> get();
        $follower_posts = Post::query() -> whereIn('user_id',$follower_list -> followed_user() -> pluck('following_id')) -> latest() -> get();
        return view('follows.followerList',['follower_users' => $follower_users,'follower_posts' => $follower_posts,]);
    }
}
