<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Task Manager')</title>
    
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">Task Manager</a>
            <ul class="flex space-x-4">
                @if(Auth::check())
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800">Home</a></li>
                    <li><a href="{{ route('tasks.index') }}" class="text-gray-600 hover:text-gray-800">Tasks</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a></li>
                @endif
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-4">
        @yield('content')
    </div>

    <!-- Add JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
