<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
<div class="error-bg">
    <div class="min-h-screen w-9/12 m-auto py-16 flex items-center justify-center">
        <div class="p-4 bg-white shadow overflow-hidden sm:rounded-lg pb-8">
            <div class="border-t border-gray-200 text-center pt-8">
                <h1 class="text-2xl md:text-8xl font-bold text-green-400">{{$error ?? '404'}}</h1>
                <h1 class="text-xl md:text-4xl font-medium py-8">{{$message ?? __("general.not-found")}}</h1>
                <p class="text-lg md:text-2xl pb-8 px-12 font-medium">@lang("general.not-found-zombie")</p>
                <a href="{{route('dashboard')}}">
                    <button class="bg-gradient-to-r from-purple-400 to-blue-500 hover:from-pink-500 hover:to-orange-500 text-white font-semibold px-6 py-3 rounded-md mr-6">
                        @lang('general.dashboard')
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
