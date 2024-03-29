<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Posty | @yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-200 ">
            <nav class="p-6 bg-white flex items-center justify-between mb-4">
                <ul class="flex justify-between gap-6">
                    <li>
                        <a href="/" >Home</a>
                    </li>
                    <li>
                        <a href="" >Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('posts.index')}}" >Posts</a>
                    </li>
                </ul>

                <ul class="flex justify-between gap-6">
                    @auth()
                    <li>
                        <a href="" >{{auth()->user()->username}}</a>
                    </li>
                        <li>
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" >Logout</button>
                            </form>
                        </li>
                    @else
                    <li>
                        <a href="{{route('register')}}" >Register</a>
                    </li>
                    <li>
                        <a href="{{route('login')}}" >Login</a>
                    </li>
                    @endauth
                </ul>
            </nav>

@yield('content')
</body>
</html>
