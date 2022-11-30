<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Post;

class PostController extends Controller
{
    public function dashboard() {
        // return view('dashboard', ['posts' => Post::all()]);

        $posts = Post::all();

        // $posts = Post::where('user_id', '=', auth()->user()->id)->get();

        return view('dashboard', compact('posts'));
    }

    public function addPost(Request $req) {
        $req->validate([
            'user_id' => 'required',
            'title' => 'required',
        ]);

        Post::create([
            'user_id' => $req->user_id,
            'title' => $req->title,
        ]);

        return redirect() -> route('dashboard');
    }

    public function deletePost($id) {
        $data = Post::find($id);
        $data -> delete();
        return redirect() -> route('dashboard');
    }

    public function edit($id) {
        $post = Post::find($id);
        return view('edit', ['post' => $post]);
    }

    public function editPost(Request $request) {
        $postObj = Post::find($request->id);
        $postObj -> title = $request -> title;
        $postObj -> save();
        return redirect() -> route('dashboard');
    }
}
