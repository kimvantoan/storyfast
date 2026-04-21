<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Silent Narrative - @yield('title', 'Admin Console')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800;900&family=Be+Vietnam+Pro:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <link rel="icon" type="image/svg+xml" href="{{ asset('storyfast-icon.svg') }}">

    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
            background-color: #fcf9f8;
            color: #1c1b1b;
        }
        .btn-glow {
            background: linear-gradient(45deg, #a53600, #cc490e);
        }
    </style>

    <!-- Build Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-surface text-on-surface">
    <!-- SideNavBar Shell -->
    <aside class="h-screen w-64 fixed left-0 top-0 flex flex-col bg-stone-900 border-none z-50">
        <div class="px-6 py-8 flex flex-col items-start gap-2">
            <img src="{{ asset('storyfast-wordmark.svg') }}" alt="StoryFast" class="h-6 brightness-0 invert">
            <span class="block text-[10px] font-bold text-stone-500 uppercase tracking-widest">Admin Console</span>
        </div>
        <nav class="flex flex-col h-full flex-1 overflow-y-auto">
            <a class="text-stone-400 hover:text-white py-3 px-6 flex items-center gap-3 transition-colors font-headline uppercase tracking-wider text-xs font-bold hover:bg-stone-800 transition-all duration-200" href="#">
                <span class="material-symbols-outlined" style="font-size: 20px;">dashboard</span>
                Dashboard
            </a>
            <a class="{{ request()->is('admin/pending') ? 'bg-stone-800 text-white border-l-4 border-[#a53600]' : 'text-stone-400 hover:text-white hover:bg-stone-800' }} py-3 px-6 flex items-center gap-3 transition-colors font-headline uppercase tracking-wider text-xs font-bold transition-all duration-200" href="{{ url('admin/pending') }}">
                <span class="material-symbols-outlined" style="font-size: 20px;">pending_actions</span>
                Pending Stories
            </a>
            <a class="{{ request()->is('admin/stories') ? 'bg-stone-800 text-white border-l-4 border-[#a53600]' : 'text-stone-400 hover:text-white hover:bg-stone-800' }} py-3 px-6 flex items-center gap-3 font-headline uppercase tracking-wider text-xs font-bold transition-all duration-200" href="{{ url('admin/stories') }}">
                <span class="material-symbols-outlined" style="font-size: 20px;">auto_stories</span>
                Manage Stories
            </a>
            <a class="{{ request()->is('admin/users') ? 'bg-stone-800 text-white border-l-4 border-[#a53600]' : 'text-stone-400 hover:text-white hover:bg-stone-800' }} py-3 px-6 flex items-center gap-3 font-headline uppercase tracking-wider text-xs font-bold transition-all duration-200" href="{{ url('admin/users') }}">
                <span class="material-symbols-outlined" style="font-size: 20px;">group</span>
                Manage Users
            </a>
            <a class="{{ request()->is('admin/categories') ? 'bg-stone-800 text-white border-l-4 border-[#a53600]' : 'text-stone-400 hover:text-white hover:bg-stone-800' }} py-3 px-6 flex items-center gap-3 font-headline uppercase tracking-wider text-xs font-bold transition-all duration-200" href="{{ url('admin/categories') }}">
                <span class="material-symbols-outlined" style="font-size: 20px;">category</span>
                Categories
            </a>
            <a class="text-stone-400 hover:text-white py-3 px-6 flex items-center gap-3 transition-colors font-headline uppercase tracking-wider text-xs font-bold hover:bg-stone-800 transition-all duration-200" href="#">
                <span class="material-symbols-outlined" style="font-size: 20px;">analytics</span>
                Statistics
            </a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="ml-64 min-h-screen flex flex-col">
        <!-- TopAppBar -->
        <header class="flex justify-end items-center px-8 sticky top-0 z-40 h-16 bg-[#f6f3f2] dark:bg-stone-900 border-none transition-all">
            <div class="flex items-center gap-6">
                <span class="text-xs font-bold font-headline uppercase tracking-widest text-[#a53600]">Admin Console</span>
                <div class="flex items-center gap-2">
                    <button class="p-2 text-stone-500 hover:bg-stone-200 dark:hover:bg-stone-800 rounded-full transition-all flex items-center">
                        <span class="material-symbols-outlined">notifications_none</span>
                    </button>
                    <button class="p-2 text-stone-500 hover:bg-stone-200 dark:hover:bg-stone-800 rounded-full transition-all flex items-center">
                        <span class="material-symbols-outlined">help_outline</span>
                    </button>
                </div>
                <!-- User Profile & Logout -->
                <div class="flex items-center gap-3 pl-6 border-l border-stone-200">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-surface-container-highest overflow-hidden border border-outline-variant/20">
                            <img alt="Admin Avatar" class="w-full h-full object-cover" src="{{ auth()->check() && auth()->user()->avatar ? auth()->user()->avatar : 'https://ui-avatars.com/api/?name='.urlencode(auth()->check() ? auth()->user()->name : 'Admin') }}"/>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-xs font-bold font-headline text-stone-800">{{ auth()->check() ? auth()->user()->name : 'Admin' }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" title="Log Out" class="p-2 text-stone-400 hover:text-[#a53600] hover:bg-red-50 rounded-full transition-all flex items-center">
                            <span class="material-symbols-outlined text-[20px]">logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Canvas -->
        <main class="@yield('main_class', 'p-12 max-w-7xl mx-auto w-full')">
            @yield('content')
        </main>
    </div>
</body>
</html>
