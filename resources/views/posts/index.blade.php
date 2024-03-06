@extends('layouts.app')
@section('content')
    @section('title') Posts @endsection

    <div class="flex justify-center">

        <div class="w-6/12 bg-white p-6 rounded-lg">

            <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="image" class="sr-only"  >Image : </label>
                    <input name="image" id="image" type="file" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('image') border-red-500 @enderror" placeholder="Post something !!"></input>
                @error('image')
                <div class="text-red-500 mt-2 text-sm">{{$message}} </div>
                @enderror
                <label for="body" class="sr-only"  >Body
                </label>
                    <textarea name="body" id="body" cols="30" rows="4" class="mt-2 bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('body') border-red-500 @enderror" placeholder="Post something !!"></textarea>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">{{$message}} </div>
                @enderror
                <button type="submit" class="bg-slate-900 text-white px-6 py-2 rounded font-medium">Post</button>
            </form>

            <div class="flex justify-center mt-8">
                @if($posts->count())
                <div class="w-8/12">
                    @foreach($posts as $post)
                       <x-post-card :post="$post"/>
                    @endforeach
                    {{$posts->links()}}
                </div>
                @else
                    <p class="text-center text-gray-500 text-2xl font-extrabold">There is NO Post</p>
                @endif
            </div>
        </div>

    </div>



@endsection
