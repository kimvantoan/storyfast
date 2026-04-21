<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Silent Narrative @yield('title')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&family=Be+Vietnam+Pro:ital,wght@0,300;0,400;0,500;0,700;1,400&family=Lora:ital,wght@0,400;0,500;0,600;1,400&display=swap" rel="stylesheet">
    
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <link rel="icon" type="image/svg+xml" href="{{ asset('storyfast-icon.svg') }}">

    <!-- Build Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background antialiased selection:bg-primary/20 selection:text-primary">

    <!-- Header Partial -->
    @if(!isset($hideHeaderFooter))
        @include('partials.header')
    @endif

    <!-- Main Content -->
    <main class="@yield('main_class')">
        @yield('content')
    </main>

    <!-- Footer Partial -->
    @if(!isset($hideHeaderFooter))
        @include('partials.footer')
    @endif
    @yield('custom_footer')

</body>
</html>
