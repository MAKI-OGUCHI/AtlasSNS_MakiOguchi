<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //
    public function search(Request $request){
        $keyword = $request -> input('user');
        if(!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')-> get();
        }else{
            $users = User::all()-> except([\Auth::id()]);
        }
        return view('users.search',['keyword' => $keyword,'users' => $users,]);
    }
    public function follow($id){
$following_id = Auth::user();
$isFollowing = $following_id -> isFollowing($id);
if(!$isFollowing){
    $following_id -> follow($id);
return back();
}

    }
    public function unfollow($id){
        $following_id = Auth::user();
$isFollowing = $following_id -> isFollowing($id);
if($isFollowing){
    $following_id -> unfollow($id);
return back();
    }
}
}
