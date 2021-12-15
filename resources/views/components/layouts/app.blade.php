<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ (isset($title)) ? $title .' | '. config('zeus.name', config('app.name', 'Laravel')) : config('zeus.name', config('app.name', 'Laravel')) }}</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&family=KoHo:ital,wght@0,200;0,300;0,500;0,700;1,200;1,300;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/zeus/app.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/perspective.css"/>
    @livewireStyles
    @stack('styles')
    <style>
        * {
            font-family: 'KoHo', 'Almarai', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">

<x-zeus::layouts.nav/>

@if(isset($header))
    @if(config('zeus.path').config('zeus.admin.prefix') !== request()->route()->getPrefix())
        <x-zeus::layouts.userHeader :header="$header" :breadcrumb="$breadcrumb ?? null" :options="$options ?? null"/>
    @endif
@endif

<main class="flex max-w-7xl mx-auto">
    @if(config('zeus.path').config('zeus.admin.prefix') === request()->route()->getPrefix() && (!isset($withoutSideNav) || !$withoutSideNav))
        <div class="w-1/6 py-2">
            @if(config('zeus.path').config('zeus.admin.prefix') === request()->route()->getPrefix())
                <x-zeus::layouts.sidenav-admin/>
            @else
                <x-zeus::layouts.sidenav-user/>
            @endif
        </div>
    @endif
    <div class="flex-grow">
        @if(isset($header))
            @if(config('zeus.path').config('zeus.admin.prefix') === request()->route()->getPrefix())
                <x-zeus::layouts.adminHeader :header="$header" :breadcrumb="$breadcrumb ?? null" :options="$options ?? null"/>
            @endif
        @endif

        {{ $slot }}
    </div>
</main>

<x-zeus::layouts.footer/>

<x-zeus::notification/>

<script src="{{ asset('vendor/zeus/app.js') }}" defer></script>

@livewireScripts
@stack('scripts')
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
</body>
</html>