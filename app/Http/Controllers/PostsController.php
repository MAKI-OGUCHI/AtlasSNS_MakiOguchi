<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use App\Models\User;

use Illuminate\Http\RedirectResponse;

class PostsController extends Controller
{
    //
    public function index()
    {$user_id=Auth::user()->id;
        $follower=Auth::user()->following_user()->pluck('followed_id')->toArray();
        $posts=Post::whereIn('user_id',array_merge($follower,[$user_id]))->orderBy('created_at','desc')->get();
        // dd($posts);
        return view('posts.index',['posts'=>$posts]);
    }

    public function create(Request $request){
        $post = $request -> input('post');
        $user_id = Auth::user()-> id;
        Post::create(['user_id' => $user_id,'post' => $post]);
        return redirect('/top');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Post' => 'required|min:1|max:150',
        ]);
        Post::create([
            'post' => $request->Post,
        ]);
        Session::put('post', $request->Post);
        return redirect('');
    }
    public function delete($id){
        $post = Post::findOrFail($id);

    if ($post->user_id !== Auth::id()) {
        abort(403);
    }
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
    public function updata(Request $request){
    $request->validate([
        'edit_post' => 'required|max:150',
    ]);

    $postId = $request->id;

    $post = Post::findOrFail($postId);

    if ($post->user_id !== Auth::id()) {
        abort(403);
    }

    $post->post = $request->edit_post;
    $post->save();

    return redirect('/top');
}

}
