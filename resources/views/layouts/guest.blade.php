<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'zigzag') }}</title>

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
            filter: brightness(60%) blur(2px);
        }

        .content-wrapper {
            position: relative;
            text-align: center;
            color: white;
            z-index: 2;
            backdrop-filter: blur(20px);
            padding: 20px;
            border-radius: 15px;
            background: rgba(0, 0, 0, 0.7);
            width: 500px;
            max-width: 800px;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-bottom: 20px;
        }

        .form-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            text-align: right;
        }

        .form-container input, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: none;
        }

        .form-container button {
            background-color: #ff2d20;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-container button:hover {
            background-color: #d8221b;
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

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }

            .logo img {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                width: 100%;
                padding: 10px;
            }

            .logo img {
                width: 60px;
                height: 60px;
            }
        }
        .remember-me-container {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .remember-me-container input {
            margin-right: 10px;
        }

        .flex-end {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .flex-end a {
            margin-right: auto;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<video class="bg-video" autoplay muted loop>
    <source src="background-video.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>
<div class="content-wrapper">
    <div class="logo">
        <img src="logo.png" alt="Logo">
    </div>
    <div class="form-container">
        {{ $slot }}
    </div>
</div>
</body>
</html>