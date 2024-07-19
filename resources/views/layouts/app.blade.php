<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- Bottom Navigation Bar -->
        <footer class="footer bg-white shadow-lg border-t border-gray-200 sm:hidden fixed bottom-0 left-0 right-0">
            <div class="flex justify-between p-2">
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-600 hover:text-gray-800 px-4">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10c0 1.105.895 2 2 2h3.586c.265 0 .52-.105.707-.293L12 15.586l2.707 2.707c.187.188.442.293.707.293H19c1.105 0 2-.895 2-2V7H3z" />
                    </svg>
                    <span class="text-xs">{{ __('messages.Dashboard') }}</span>
                </a>

                <a href="{{ route('customers.index') }}" class="flex flex-col items-center text-gray-600 hover:text-gray-800">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9.99 9.99 0 00-9-9H9a9.99 9.99 0 00-9 9v3.06a9.99 9.99 0 0011 11v-3.06a9.99 0 0011-11V12z" />
                    </svg>
                    <span class="text-xs">{{ __('messages.Customers') }}</span>
                </a>

                <a href="{{ route('orders.index') }}" class="flex flex-col items-center text-gray-600 hover:text-gray-800 px-4">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18V3H3zm12 14H9v-2h6v2zm-6-4h6v-2H9v2zm0-4h6V7H9v2z" />
                    </svg>
                    <span class="text-xs">{{ __('messages.Orders') }}</span>
                </a>
            </div>
        </footer>
    </body>
</html>
