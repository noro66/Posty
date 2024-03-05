@extends('layouts.app')

@section('content')
    @section('title') Posts @endsection

    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('posts.store')}}" method="post">
                @csrf
                <label for="image" class="sr-only"  >
                    <input name="image" id="image" type="file" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('image') border-red-500 @enderror" placeholder="Post something !!"></input>
                </label>
                <label for="body" class="sr-only"  >
                    <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg
                    @error('body') border-red-500 @enderror" placeholder="Post something !!"></textarea>
                </label>
                @error('body')
                    <div class="text-red-500 mt-2 text-sm">{{$message}} </div>
                @enderror

            </form>
        </div>
    </div>

@endsection
