@extends('layouts.app')
@section('content')
    @section('title') Posts @endsection

    <div class="flex justify-center">

        <div class="w-6/12 bg-white p-6 rounded-lg">
            <x-post-card :post="$post" />
        </div>
    </div>
@endsection
