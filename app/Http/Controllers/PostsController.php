<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts  = Posts::paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $postForm = $request->validated();
        $postForm['image']  = $request->file('image')->store('postImages', 'public');
        Auth::user()->posts()->create($postForm);
        return back();
    }
}
