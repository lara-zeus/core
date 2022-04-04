<!DOCTYPE html>
<html
      lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ __('filament::layout.direction') ?? 'ltr' }}"
>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="application-name" content="{{ config('app.name', 'Laravel') }}">

    <title>{{ (isset($title)) ? $title .' | '. config('app.name', 'Laravel') : config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=KoHo:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/zeus/app.css') }}">
    @livewireStyles
    @stack('styles')
    <style>
        * {font-family: 'KoHo', 'Almarai', sans-serif;}
        [x-cloak] {display: none !important;}
        .bord {border: solid 1px crimson}
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">

<x-zeus::layouts.nav/>

@if(isset($header))
    <header class="bg-gray-100">
        <div class="container mx-auto py-2 px-3">
            <div class="italic font-semibold text-xl text-gray-600">
                {{ $header }}
            </div>
        </div>
    </header>
@endif

<main class="flex container mx-auto">
    <div class="flex-grow">
        {{ $slot }}
    </div>
</main>

<footer class="bg-gray-100 p-6 mt-20">
    <div class="text-gray-400 text-center font-light">
        built by @zeus
    </div>
</footer>

<script src="{{ asset('vendor/zeus/app.js') }}" defer></script>

@livewireScripts
@stack('scripts')
</body>
</html>
