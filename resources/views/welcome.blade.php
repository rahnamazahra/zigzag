<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }

        .bg-video {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .content-wrapper {
            position: relative;
            text-align: center;
            color: white;
            z-index: 2;
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 10px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .nav-links a {
            display: inline-block;
            margin: 10px 20px;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-links a:hover {
            background-color: rgba(255, 45, 32, 0.8);
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'zigzag') }}</title>
</head>
<body>
<video class="bg-video" autoplay muted loop>
    <source src="background-video.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
<div class="content-wrapper">
    <header>
        @if (Route::has('login'))
            <nav class="nav-links">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-black dark:text-white">
                        @lang('messages.Dashboard')
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-black dark:text-white">
                        @lang('messages.Log in')
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-black dark:text-white">
                            @lang('messages.Register')
                        </a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>
</div>
</body>
</html>