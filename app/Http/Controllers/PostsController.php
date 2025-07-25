<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

use App\Models\User;

class PostsController extends Controller
{
    //
    public function index()
    {
        return view('posts.index');
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
        User::create([
            'post' => $request->Post,
        ]);
        Session::put('post', $request->Post);
        return redirect('');
    }

}
