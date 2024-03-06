<?php

namespace App\Http\Controllers;

use App\Mail\Postliked;
use App\Models\likes;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LikesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Posts $post)
    {
        if(!$post->likedBy(Auth::user())){
            $post->likes()->create([
                'user_id' => Auth::id(),
            ]);
//            dd($post->likes()->onlyTrashed()->where('user_id', Auth::id())->count());

            if (!$post->likes()->onlyTrashed()->where('user_id', Auth::id())->count()) {
                Mail::to($post->user)->send(new PostLiked(Auth::user(), $post));
            }
            return back();
        }else{
            return back();
        };

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
