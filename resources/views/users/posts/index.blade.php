@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            @if($posts->count())
                <div class="w-6/12  mx-auto overflow-hidden bg-white rounded-lg shadow-lg pl-4">
                    @foreach($posts as $post)
                        <div class="mb-4">
                            @if($post->image)
                                <img class="w-8/12 h-2/3" src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
                            @endif
                            <div class="mb-2">
                                <a href="{{ route('users.posts', $post->user->username) }}" class="font-bold">{{ $post->user->name }}</a>
                                <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="text-sm">{{ $post->body }}</p>
                            @auth
                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="mr-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white bg-red-800 px-3 py-1 rounded">Delete</button>
                                    </form>
                                @endcan
                                <div class="flex items-center mt-2">
                                    @if(!$post->likedBy(auth()->user()))
                                        <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-2">
                                            @csrf
                                            <button type="submit" class="text-blue-500 bg-slate-900 px-4 py-1 rounded">Like</button>
                                        </form>
                                    @else
                                        <form action="{{ route('posts.likes', $post->id) }}" method="post" class="mr-1">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 bg-slate-900 px-3 py-1 rounded">Unlike</button>
                                        </form>
                                    @endif
                                    <span class="text-sm text-gray-600">{{ $post->likes->count() }} {{ Str::plural('Like', $post->likes->count()) }}</span>
                                </div>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @else
                <p>No posts yet.</p>
            @endif
        </div>
    </div>
@endsection
