<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if(View::hasSection('meta_title'))
            @yield('meta_title')
        @else
            OnlineFreeNovels @yield('title')
        @endif
    </title>
    <meta name="description" content="@yield('meta_description', 'Read the best free novels online at OnlineFreeNovels. Discover top-tier literature, web novels, and light novels updated daily.')">
    <link rel="canonical" href="@yield('meta_canonical', request()->url())">
    
    <!-- Open Graph for Facebook/Zalo -->
    <meta property="og:type" content="@yield('meta_type', 'website')">
    <meta property="og:url" content="@yield('meta_canonical', request()->url())">
    <meta property="og:title" content="@yield('meta_title', 'OnlineFreeNovels')">
    <meta property="og:description" content="@yield('meta_description', 'Read the best free novels online at OnlineFreeNovels. Discover top-tier literature, web novels, and light novels updated daily.')">
    <meta property="og:image" content="@yield('meta_image', asset('storyfast-icon.svg'))">
    
    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('meta_title', 'OnlineFreeNovels')">
    <meta name="twitter:description" content="@yield('meta_description', 'Read the best free novels online at OnlineFreeNovels. Discover top-tier literature, web novels, and light novels updated daily.')">
    <meta name="twitter:image" content="@yield('meta_image', asset('storyfast-icon.svg'))">
    
    @yield('structured_data')
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
