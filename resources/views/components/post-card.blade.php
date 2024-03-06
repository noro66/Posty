<div class="mb-4">
    <div class="w-full mx-auto overflow-hidden bg-white rounded-lg shadow-lg pl-4 ">
        <img class="w-64 h-1/2 " src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
        <div class="mb-4">
            <a href="{{route('users.posts', $post->user->username)}}" class="font-extrabold">{{$post->user->name}} <span class="text-gray-600 text-sm">{{$post->created_at->diffForHumans()}}</span></a>
            <p class="mt-2 font-sm">{{ $post->body }}</p>
            @auth()
                @can('delete', $post)
                    <div>
                        <form action="{{route('posts.destroy', $post->id)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-800 px-3 py-0.5 rounded">Delete</button>
                        </form>
                    </div>
                @endcan
                <div class="flex items-center mt-2">
                    @if(!$post->likedBy(auth()->user()))
                        <form action="{{route('posts.likes',$post->id)}}" method="post" class="mr-2">
                            @csrf
                            <button type="submit" class="text-blue-500 bg-slate-900 px-4 py-0.5 rounded">Like</button>
                        </form>
                        <span class="text-l text-gray-900">{{$post->likes->count()}} Likes </span>
                    @else
                        <form action="{{route('posts.likes', $post->id)}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 bg-slate-900 px-3 py-0.5 rounded">UnLike</button>
                        </form>
                        <span class="text-l text-gray-900">{{$post->likes->count()}} Likes </span>
                    @endif
                </div>
            @endauth
        </div>
    </div>
</div>
