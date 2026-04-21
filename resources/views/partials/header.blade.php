<nav class="sticky top-0 w-full z-50 bg-[#fcf9f8]/80 dark:bg-[#1c1b1b]/80 backdrop-blur-xl no-border tonal-shift bg-[#f6f3f2] dark:bg-[#2a2827] flat no shadows">
    <div class="flex justify-between items-center max-w-[1440px] mx-auto px-12 py-6">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('storyfast-wordmark.svg') }}" alt="StoryFast" class="h-7 w-auto">
        </a>
        <div class="hidden md:flex items-center space-x-10 font-['Inter'] font-medium text-sm tracking-tight leading-relaxed">
            <!-- Categories Dropdown Group -->
            <div class="relative group py-4">
                <a class="text-[#a53600] dark:text-[#cc490e] font-bold border-b-2 border-[#a53600] pb-1 active:scale-[0.98] transition-all duration-200 cursor-pointer flex items-center gap-0.5">
                    Categories
                    <span class="material-symbols-outlined !text-[16px] group-hover:rotate-180 transition-transform duration-300">expand_more</span>
                </a>

                <!-- Expanded Dropdown Window -->
                <div class="absolute top-full left-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-left -translate-y-2 group-hover:translate-y-0 z-[100] mt-[-8px]">
                    <div class="bg-white dark:bg-[#1c1b1b] rounded-xl shadow-2xl border border-stone-200 dark:border-stone-800 p-6 w-[500px] grid grid-cols-3 gap-y-3 gap-x-6">
                        @if(isset($globalCategories))
                        @foreach($globalCategories as $cat)
                        <a href="{{ route('category.show', $cat->slug) }}" class="text-[#5e5e5e] dark:text-[#a19f9e] hover:text-[#a53600] dark:hover:text-[#cc490e] hover:bg-stone-50 dark:hover:bg-[#2a2827] px-3 py-2 rounded-lg transition-all duration-200 font-medium">
                            {{ $cat->name }}
                        </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <a class="text-[#5e5e5e] dark:text-[#a19f9e] hover:text-[#a53600] dark:hover:text-[#cc490e] transition-all duration-300 ease-[cubic-bezier(0.2,0,0,1)] active:scale-[0.98]" href="#">Rankings</a>
            <a class="text-[#5e5e5e] dark:text-[#a19f9e] hover:text-[#a53600] dark:hover:text-[#cc490e] transition-all duration-300 ease-[cubic-bezier(0.2,0,0,1)] active:scale-[0.98]" href="#">Updates</a>
            <a class="text-[#5e5e5e] dark:text-[#a19f9e] hover:text-[#a53600] dark:hover:text-[#cc490e] transition-all duration-300 ease-[cubic-bezier(0.2,0,0,1)] active:scale-[0.98]" href="#">Full Stories</a>
        </div>
        <div class="flex items-center gap-6">
            <span class="material-symbols-outlined text-secondary cursor-pointer hover:text-primary transition-colors" title="Search">search</span>
            <a href="{{ url('/submit') }}" class="flex items-center text-secondary hover:text-primary transition-colors" title="Write a Story">
                <span class="material-symbols-outlined">edit_square</span>
            </a>
            @guest
            <button onclick="document.getElementById('loginModal').classList.remove('hidden')" class="bg-primary text-on-primary px-5 py-2 rounded-[6px] font-headline text-sm font-bold tracking-tight active:scale-[0.98] transition-all">Login</button>
            @else
            <div class="flex items-center gap-3 border-l border-stone-200 pl-6 ml-2">
                <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name) }}" alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-[6px] border border-stone-200 object-cover">
                <span class="text-sm font-bold font-headline text-[#1c1b1b] dark:text-[#fcf9f8]">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" class="m-0 flex items-center">
                    @csrf
                    <button title="Log Out" type="submit" class="text-stone-400 hover:text-error transition-colors flex items-center">
                        <span class="material-symbols-outlined text-[20px]">logout</span>
                    </button>
                </form>
            </div>
            @endguest
        </div>
    </div>
</nav>

<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 z-[100] hidden">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-black/60 backdrop-blur-sm transition-opacity" onclick="document.getElementById('loginModal').classList.add('hidden')"></div>

    <!-- Modal Content -->
    <div class="fixed inset-0 z-10 overflow-y-auto pointer-events-none">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-[#1c1b1b] text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-md pointer-events-auto">
                <div class="absolute right-0 top-0 pr-4 pt-4">
                    <button type="button" onclick="document.getElementById('loginModal').classList.add('hidden')" class="rounded-md bg-transparent text-[#5e5e5e] hover:text-[#a53600] focus:outline-none transition-colors">
                        <span class="sr-only">Close</span>
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="px-8 py-10">
                    <div class="text-center mb-8">
                        <h3 class="font-headline font-black text-2xl text-[#1c1b1b] dark:text-[#fcf9f8] mb-2 tracking-tighter">Welcome Back</h3>
                        <p class="text-sm text-[#5e5e5e] dark:text-[#a19f9e]">Sign in to continue exploring The Silent Narrative.</p>
                    </div>
                    <div class="mt-6 space-y-4">
                        <a href="{{ route('login.google') }}" class="flex w-full items-center justify-center gap-3 rounded-[6px] border border-[#e8e6e5] dark:border-[#383230] bg-white dark:bg-[#2a2827] px-4 py-3 text-sm font-semibold text-[#1c1b1b] dark:text-[#fcf9f8] hover:bg-[#f6f3f2] dark:hover:bg-[#383230] transition-colors shadow-sm">
                            <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 24 24">
                                <path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335"></path>
                                <path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4"></path>
                                <path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05"></path>
                                <path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.26538 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853"></path>
                            </svg>
                            <span class="text-base font-bold">Continue with Google</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>