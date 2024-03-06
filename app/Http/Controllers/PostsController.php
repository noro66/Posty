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
        return view('posts.index');
    }

    public function store(PostRequest $request)
    {
        $postForm = $request->validated();
        $postForm['image']  = $request->file('image')->store('postImages', 'public');
        $postForm['user_id'] = Auth::id();
        $postCreated =  Posts::create($postForm);
        return back();
    }
}
