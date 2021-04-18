<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
</head>
<body class="bg-blue-100 text-gray-600">
    <!-- Navigation Bar-->
    <nav class="flex justify-between items-center px-64 py-4 text-gray-500">
        <ul class="flex items-center gap-4">
            <!-- <li><a href="">Home</a></li>
            <li><a href="{{route('dashboard')}}">Dashboard</a></li> -->
            <li><a href="{{route('blogs')}}">Blogs</a></li>
        </ul>
        <ul class="flex items-center gap-4">
            @auth
                <li><a href="">{{auth()->user()->username}}</a></li>
                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button>Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li><a href="{{route('register')}}">Register</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>