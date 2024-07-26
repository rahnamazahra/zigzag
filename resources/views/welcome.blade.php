<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="path/to/your/css/file.css">
    <title>Your Website</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
        }
        .logo {
            margin-bottom: 20px;
        }
        .nav-links a {
            margin: 0 10px;
            padding: 10px 20px;
            border: 1px solid transparent;
            border-radius: 5px;
            transition: color 0.3s, border-color 0.3s;
        }
        .nav-links a:hover {
            color: #FF2D20;
            border-color: #FF2D20;
        }
    </style>
</head>
<body>
<div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
    <div class="container selection:bg-[#FF2D20] selection:text-white">
        <div class="logo">
            <img src="logo.png" alt="Logo" width="50" height="50">
        </div>
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
</div>
</body>
</html>