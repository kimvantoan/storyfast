<footer class="bg-[#f6f3f2] dark:bg-[#2a2827] w-full rounded-none">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-[1440px] mx-auto px-12 py-24">
        <div class="space-y-6">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('storyfast-wordmark.svg') }}" alt="StoryFast" class="h-8 dark:brightness-0 dark:invert">
            </a>
            <p class="font-['Be_Vietnam_Pro'] text-base leading-[1.9] text-[#5e5e5e] dark:text-[#a19f9e] max-w-sm">
                Explore elite digital manuscripts, where words construct worlds. Powered by Kolsup Limited.
            </p>
            <p class="text-sm font-label text-[#888888] dark:text-[#71706f]">
                © {{ date('Y') }} StoryFast. All rights reserved.
            </p>
        </div>
        <div class="space-y-8">
            <h6 class="text-[11px] font-black uppercase tracking-[0.2em] text-[#a53600] dark:text-[#cc490e]">Quick Links</h6>
            <div class="flex flex-col gap-4 font-['Be_Vietnam_Pro'] text-base text-[#5e5e5e] dark:text-[#a19f9e]">
                <a class="hover:text-[#1c1b1b] dark:hover:text-[#fcf9f8] transition-colors cursor-pointer" href="{{ route('about') }}">About Us</a>
                <a class="hover:text-[#1c1b1b] dark:hover:text-[#fcf9f8] transition-colors cursor-pointer" href="{{ route('terms') }}">Terms of Service</a>
                <a class="hover:text-[#1c1b1b] dark:hover:text-[#fcf9f8] transition-colors cursor-pointer" href="{{ route('policy') }}">Privacy Policy</a>
                <a class="hover:text-[#1c1b1b] dark:hover:text-[#fcf9f8] transition-colors cursor-pointer" href="{{ route('disclaimer') }}">Disclaimer</a>
            </div>
        </div>
        <div class="space-y-8">
            <h6 class="text-[11px] font-black uppercase tracking-[0.2em] text-[#a53600] dark:text-[#cc490e]">Contact Support</h6>
            <div class="flex flex-col gap-4 font-['Be_Vietnam_Pro'] text-base text-[#5e5e5e] dark:text-[#a19f9e]">
                <p>Hotline: (+852) 5170 7620</p>
                <div class="flex gap-6 pt-4">
                    <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">public</span>
                    <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">alternate_email</span>
                    <span class="material-symbols-outlined cursor-pointer hover:text-primary transition-colors">rss_feed</span>
                </div>
            </div>
        </div>
    </div>
</footer>
