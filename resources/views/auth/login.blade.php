@extends('layouts.app')

@section('content')
    @section('title') Login @endsection

    <div class="flex justify-center">
        <div class="w-4/12 bg-white px-6 rounded-lg">

                <div class="flex flex-col items-center justify-center px-6  mx-auto  lg:py-0">
                    <div class="w-full bg-white rounded-lg shadow white:border md:mt-0 sm:max-w-md xl:p-0 white:bg-gray-800 white:border-gray-700">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl white:text-white">
                                Welcome Back
                            </h1>
                            @if(session('login_status'))
                            <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                                {{session('login_status')}}
                            </div>

                            @endif
                            <form class="space-y-4 md:space-y-6" method="post" action="{{route('login.store')}}">
                                @csrf

                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Your email</label>
                                    <input  type="email" name="email" id="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 @error('email') border border-red-500 @enderror " placeholder="name@company.com" >
                                    @error('email')
                                    <li class="text-red-600 mt-1  p-2 text-sm">
                                        {{$message}}
                                    </li>
                                    @enderror
                                </div>
                                <div>
                                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 white:text-white">Password</label>
                                    <input   type="password" name="password" id="password"  placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 white:bg-gray-700 white:border-gray-600 white:placeholder-gray-400 white:text-white white:focus:ring-blue-500 white:focus:border-blue-500 @error('password') border border-red-500 @enderror " >
                                    @error('password')
                                    <li class="text-red-600 mt-1  p-2 text-sm">
                                        {{$message}}
                                    </li>
                                    @enderror
                                </div>
                                <div class="flex items-center h-5 space-x-2">
                                    <input id="remember" name="remember" aria-describedby="remember" type="checkbox" class="ml-1 w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 white:bg-gray-700 white:border-gray-600 white:focus:ring-primary-600 white:ring-offset-gray-800" >
                                    <label for="remember"  class="font-light text-black white:text-gray-300">Remember me</label>

                                </div>
                                <button type="submit" class="w-full text-white bg-gray-900 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center white:bg-primary-600 white:hover:bg-primary-700 white:focus:ring-primary-800">Login</button>
                                <p class="text-sm font-light text-gray-500 white:text-gray-400">
                                    You don't  have an account? <a href="{{route('register')}}" class="font-medium text-primary-600 hover:underline white:text-primary-500">Sign Up here</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
