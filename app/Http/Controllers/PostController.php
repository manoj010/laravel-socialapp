<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function dashboard() {
        return view('dashboard', ['posts' => Post::all()]);
    }
}
