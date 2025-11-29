<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(){
        $user = auth() -> user();
        return view('profiles.profile',['user' => $user,]);
    }
    public function edit(Request $request)
    {$user = auth() -> user();
        $request->validate([
            'UserName' => 'required|min:2|max:12',
            'MailAddress' => 'required|email|unique:users,email,' . $user->id,
            //'NewPassword' => 'required|min:8|max:20|confirmed',
            //'NewPasswordConfirmation' => 'required|min:8|max:20',
            'Bio' => 'max:150',
            'IconImage' => 'nullable|image|mimes:jpg,png,bmp,gif,svg'
        ]);
        $image = Auth::user() -> icon_image;
        if($request -> hasFile('IconImage')){
            //if ($user->IconImage) {Storage::delete($user->icon_image);}
            $image = $request -> file('IconImage') -> store('public/images');
        }

        Auth::user() -> update([
            // 'username' => $request -> input('UserName'),
            'email' => $request -> input('MailAddress'),
            'password' => bcrypt($request -> input('NewPassword')),
            'bio' => $request -> input('Bio'),
            'icon_image' => basename($image)
        ]);
        return redirect('/top');

    }
    public function list($id){
        $user = User::where("id",$id) -> first();
        $post = Post::where("user_id",$id) -> get();
        return view('profiles.userprofile',['user' => $user,'post' => $post]);
    }

    public function followerList($id)
{
    // プロフィール対象のユーザー
    $user = User::find($id);

    // フォロワー一覧（UserのCollection）
    $follower_users = $user->followers;

    // フォロワーの投稿一覧（必要なら取得）
    $follower_posts = Post::whereIn('user_id', $follower_users->pluck('id'))->get();

    return view('profiles.followerList', [
        'user' => $user,
        'follower_users' => $follower_users,
        'follower_posts' => $follower_posts,
    ]);
}


}
