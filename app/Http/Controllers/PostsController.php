<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Posts;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except('index');
    }

    public function index()
    {
        $posts  = Posts::latest()->with('user', 'likes')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function store(PostRequest $request)
    {
        $postForm = $request->validated();
        $postForm['image']  = $request->file('image')->store('postImages', 'public');
        Auth::user()->posts()->create($postForm);
        return back();
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Posts $post)
    {
        Gate::authorize('delete', $post);
            $post->delete();
            return back();

    }

    public function show(Posts $post)
    {
        return view('posts.show', compact('post'));
    }
}
