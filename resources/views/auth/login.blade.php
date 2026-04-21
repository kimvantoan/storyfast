<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - The Silent Narrative</title>
    @vite(['resources/css/app.css', 'resources/css/editorial.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&family=Be+Vietnam+Pro:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('storyfast-icon.svg') }}">
</head>
<body class="bg-surface-container-low min-h-screen flex items-center justify-center font-body selection:bg-[#a53600] selection:text-white">
    
    <div class="w-full max-w-md bg-white p-10 rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-stone-200">
        <div class="text-center mb-10 flex flex-col items-center">
            <img src="{{ asset('storyfast-wordmark.svg') }}" alt="StoryFast" class="h-10 mb-4 mix-blend-multiply">
            <h1 class="font-headline font-black text-2xl text-on-surface uppercase tracking-tighter mb-2">Editor's Console</h1>
            <p class="text-secondary text-sm font-light">Enter your credentials to access the administrative panel.</p>
        </div>

        <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
            @csrf

            @if($errors->any())
                <div class="bg-red-50 text-error p-3 rounded text-sm text-center border border-red-100 font-medium">
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="space-y-1">
                <label for="email" class="font-headline font-bold text-[10px] uppercase tracking-widest text-stone-500">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full bg-stone-50 border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] focus:bg-white rounded py-2.5 px-4 text-sm font-body transition-all outline-none text-on-surface">
            </div>

            <div class="space-y-1">
                <div class="flex justify-between items-center">
                    <label for="password" class="font-headline font-bold text-[10px] uppercase tracking-widest text-stone-500">Password</label>
                </div>
                <input type="password" id="password" name="password" required
                    class="w-full bg-stone-50 border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] focus:bg-white rounded py-2.5 px-4 text-sm font-body transition-all outline-none text-on-surface">
            </div>

            <button type="submit" class="w-full bg-[#111] text-white py-3.5 rounded font-headline font-bold text-sm uppercase tracking-widest hover:bg-[#a53600] transition-colors active:scale-[0.98] shadow-sm flex items-center justify-center gap-2">
                Sign In to Console
            </button>
        </form>
    </div>

</body>
</html>
