<?php

namespace App\Http\Controllers;

use App\Models\likes;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Posts $post)
    {
        if(!$post->likedBy(Auth::user())){
            $post->likes()->create([
                'user_id' => Auth::id(),
            ]);
            return back();
        }else{
            return back();
        };

    }

    /**
     * Display the specified resource.
     */
    public function show(likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        if($post->likedBy(Auth::user())){
            $post->likes()->where('post_id', $post->id)->delete();
            return back();
        }else{
            return back();
        };
    }
}
