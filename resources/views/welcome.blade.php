@extends('layouts.app')

@section('title', '- Home')

@section('content')
<div class="max-w-[1440px] mx-auto px-12 py-8">
    <!-- Hero Section: The Manuscript Spotlight -->
    <section class="relative mb-24 overflow-hidden rounded-[6px] bg-surface-container-low group">
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 p-12 md:p-20 order-2 md:order-1">
                <span class="inline-block px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold tracking-widest uppercase mb-6 rounded-full">Editor's Choice</span>
                <h1 class="font-headline font-black text-[48px] leading-[1.1] text-on-surface mb-6 tracking-tighter">The Orchestration of the Long Night</h1>
                <div class="flex gap-2 mb-6">
                    <span class="text-xs font-semibold text-secondary px-3 py-1 bg-surface-container-high rounded-full">Mystery</span>
                    <span class="text-xs font-semibold text-secondary px-3 py-1 bg-surface-container-high rounded-full">Drama</span>
                </div>
                <p class="font-body text-lg leading-[1.9] text-secondary mb-10 line-clamp-2 max-w-lg">
                    In the deep shadows of the ancient city, a secret from a hundred years ago is slowly awakening through invisible notes...
                </p>
                <div class="flex gap-4">
                    <button onclick="window.location.href='{{ url('/story') }}'" class="bg-on-surface text-white px-8 py-4 rounded-[6px] font-bold text-sm flex items-center gap-2 hover:bg-black transition-colors">
                        Read Now
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                    <button class="bg-white border border-on-surface text-on-surface px-8 py-4 rounded-[6px] font-bold text-sm hover:bg-surface-container-low transition-colors">
                        Add to Library
                    </button>
                </div>
            </div>
            <div class="w-full md:w-1/2 order-1 md:order-2 h-[500px]">
                <img class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-700" alt="dramatic oil painting style illustration of a mysterious gothic city street at night under a full moon with cinematic lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB50JUMGDeSWxY-vzW8xi0E_4en4pwbdIzzzM4-YSpPLv7-dMKRCVkslAsdnjMNlj4gxfHHao5JiQ_o_NEjdvTJx9v6TbroQp4v2Z0iISSliaVQ5QnOcbJ0CPBhpiBkdwBohJZ5gCpdjvOiGpEz60jh4RFSBuqCYX5t3JADKw9JL4eX5moYQHQh2z6DO3d31t5LV9uV-VrovOpMeQVVTld3PC7KYP5URZ2f-M5HCcvVmHBGNgGKl27DxbHjVgpe9OA2gZS5baufS9re"/>
            </div>
        </div>
        <!-- Pagination Indicators -->
        <div class="absolute bottom-8 right-12 flex gap-3">
            <div class="w-12 h-[2px] bg-primary"></div>
            <div class="w-12 h-[2px] bg-outline-variant"></div>
            <div class="w-12 h-[2px] bg-outline-variant"></div>
        </div>
    </section>

    <!-- Section: New Updates -->
    <section class="mb-24">
        <div class="flex justify-between items-end mb-10">
            <h2 class="font-headline font-black text-3xl tracking-tighter">New Updates</h2>
            <a class="text-primary font-bold text-sm flex items-center gap-1 hover:gap-2 transition-all" href="#">View All <span class="material-symbols-outlined text-sm">trending_flat</span></a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <!-- Card 1 -->
            <div class="group cursor-pointer">
                <div class="aspect-[3/4] overflow-hidden rounded-[6px] mb-4 bg-surface-container-highest border border-transparent group-hover:border-primary/30 transition-all duration-300">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="minimalist book cover design with abstract geometric shapes and elegant typography for a modern thriller novel" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCBtDYq3JlfJ6yCgvzwykPhAwEWMcWFHWpKJv7E2HkR5pmE5DDTcLzaR60NI_aEs50Q1zxj6c5sH6XJWLIKgVyNfQCRCMsYfFrSRn9ReyIDNH3QFOb4qkxxoKqepjYMXgof36qOHHr07Cyxh4VhMdg0C4-CUjJee-nr-v2FXodPPAkHj9N9oqmJKGEqnCPI7xPA_eU9EZ6I58tzqBcFxynAashiDrU4FD-6aBe-8gcCGWY8HHXMo4hLq1yJmBC8GqyE4CPrRnXhtT3"/>
                </div>
                <h3 class="font-headline font-bold text-base text-on-surface mb-1 group-hover:text-primary transition-colors">Lost in the Pine Forest</h3>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-secondary font-medium">Chapter 128</span>
                    <span class="text-[10px] text-secondary/60 uppercase font-bold tracking-tighter">15 mins ago</span>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="group cursor-pointer">
                <div class="aspect-[3/4] overflow-hidden rounded-[6px] mb-4 bg-surface-container-highest border border-transparent group-hover:border-primary/30 transition-all duration-300">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="dark moody photography of a vintage typewriter on a wooden desk with soft warm lamp light and shadows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCSNwnkkcfRXvIKEUHgP09A6MmCLj_wVzoP1Hbh-JKMvA6kcNi0M6cvKKUkZFr8nRTEGmkbC2LjSKjaFfCtsX-dv39t50mg8jpvERBXo7FN_skqOCAb0XjHzPfbbcS5nmQ8RsqVCgt1heJXT9klmJTbt4Tb0NC0cd8U9IOkgxKONeVr2WBlvTiH4BYBnJErwXwDM_2JeUsIcP_WUsgtN-y8gYrY2u_VHDDvFffzHbgQ_bNqSwW9sj1_MijQTHS3ZcqPypxsznoJi33"/>
                </div>
                <h3 class="font-headline font-bold text-base text-on-surface mb-1 group-hover:text-primary transition-colors">Lost Memories</h3>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-secondary font-medium">Chapter 45</span>
                    <span class="text-[10px] text-secondary/60 uppercase font-bold tracking-tighter">1 hour ago</span>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="group cursor-pointer">
                <div class="aspect-[3/4] overflow-hidden rounded-[6px] mb-4 bg-surface-container-highest border border-transparent group-hover:border-primary/30 transition-all duration-300">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="aesthetic minimalist cover with a single blooming white flower on a soft beige background with elegant serif text" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAcp2VxgH-wn7_OVAjw3rGZ6vKJGWunuGUfo_kXmoy1TFgZ6_eDEbZVt9jUX6c6yDwy-vE1efi-NmRLxTFWue-BWjcSY5X9cfJzw6_D4lHtq8TVg2hAEh0lDR1nUm3_h_FF55McZ6Fvo70IrLRMaUQ08fLfHhxtdf8BKI83rOHjBQkcp2pwusTDge1_K3NA5E_-IRqgdlU1J6AMIY6crvMMiM3stqgvAY0QEjs3AdJMcV-AR_ErORl0I9PqBzts43paB38Iro20qfxl"/>
                </div>
                <h3 class="font-headline font-bold text-base text-on-surface mb-1 group-hover:text-primary transition-colors">The Flower Season</h3>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-secondary font-medium">Full - Chapter 200</span>
                    <span class="text-[10px] text-secondary/60 uppercase font-bold tracking-tighter">3 hours ago</span>
                </div>
            </div>
            <!-- Card 4 -->
            <div class="group cursor-pointer">
                <div class="aspect-[3/4] overflow-hidden rounded-[6px] mb-4 bg-surface-container-highest border border-transparent group-hover:border-primary/30 transition-all duration-300">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="surreal digital art of a person standing at the edge of a cosmic ocean with stars reflecting in the water" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC1vTUyZ02N-YRPxqJu4M4YgZSIYOt9n4lQ5lzOpek8BUsBfDGmEeBZnDFeRsWJtEPE2EZhp2Kx_MckFBPEP9uG79HHKQDoPVV4BhDiwYc0gvnkeyGVtR9GVVPNTQ-j2daWDBbhdoxDMLsHCkI32QE7HxVkGwl9p5inyYIQJrDpj8nTfAbPvTQ5ZATLwlr1D63fxUfsNv3hDI87Ne25pdegBg3swRFSB3q9cYLLruDCE3gNWBe2pGTC63p2U0laKAxWITp9Y1uxcGbK"/>
                </div>
                <h3 class="font-headline font-bold text-base text-on-surface mb-1 group-hover:text-primary transition-colors">The Universe in Your Eyes</h3>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-secondary font-medium">Chapter 89</span>
                    <span class="text-[10px] text-secondary/60 uppercase font-bold tracking-tighter">5 hours ago</span>
                </div>
            </div>
            <!-- Card 5 -->
            <div class="group cursor-pointer">
                <div class="aspect-[3/4] overflow-hidden rounded-[6px] mb-4 bg-surface-container-highest border border-transparent group-hover:border-primary/30 transition-all duration-300">
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="cinematic close up of rain drops on a window pane with blurred city lights at night in the background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCknvjTsR_hzC37RZbeM7iHmy_SoG_dddJZn53axa7bZrD80LX9yanZiZ2Ek_eomwVqQkL3qf7p-750YiP9rC4013esn0KFQ0X26gnd6IlVjZzAZSlrhj-pOuHGO1BQVYOYrmIsyB3IkpNc60Kydyv4SyRG3Ze1CuhLL8OFZigbXg3PX4awAO0-Nut5G16WZykzRWKgQ_Yx8OYzLfyCEnuVOqH0YCHLfsJiFd2jAucV5ly404vjkS8UGTuG6D0oWvfxbNOplXfb3Ltm"/>
                </div>
                <h3 class="font-headline font-bold text-base text-on-surface mb-1 group-hover:text-primary transition-colors">The Last Rainy Night</h3>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-secondary font-medium">Chapter 12</span>
                    <span class="text-[10px] text-secondary/60 uppercase font-bold tracking-tighter">Just now</span>
                </div>
            </div>
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-24 mb-24">
        <!-- Section: Rankings -->
        <section class="lg:col-span-2">
            <div class="flex items-center gap-4 mb-10">
                <h2 class="font-headline font-black text-3xl tracking-tighter">Rankings</h2>
                <div class="flex bg-surface-container-low p-1 rounded-full text-[10px] font-bold uppercase tracking-widest text-secondary">
                    <button class="px-4 py-1 bg-white rounded-full text-primary shadow-sm">Monthly</button>
                    <button class="px-4 py-1">Weekly</button>
                </div>
            </div>
            <div class="space-y-6">
                <!-- Top 1 -->
                <div class="flex items-center gap-6 group cursor-pointer border-b border-surface-container pb-6 last:border-0">
                    <div class="text-5xl font-black text-surface-container-high italic w-12 group-hover:text-primary transition-colors">01</div>
                    <div class="w-16 h-20 bg-surface-container-low rounded-lg overflow-hidden shrink-0">
                        <img class="w-full h-full object-cover" alt="stylized illustration of a powerful figure sitting on a throne in a vast empty hall with dramatic shadows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjanlLFZ7s54WAgMdiHikbei3kyqglb_OP0lZiq1_mZepQXa9EYxJUbYdJY1EQW3FDqjCJ4gK2eos0Kvgr_Y0e1aY-bwut1S3gDdIHjWUWiNOEgL0pjzFXV7Swii-yGyVbbYaOOrms941dOclprs8minC9_Yj-we6KlIr1dQ6LfilMMlm9Y0BItdkY6pVVdD5aJziAT2d9opofO6yBzsNDfur_IE2Xr0CrI9PFkxoH2LnlzMQkZ0Irwua0Nf-obQIDouhAppLSkA_Q"/>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-headline font-bold text-lg text-on-surface group-hover:text-primary transition-colors">The World's Greatest Book</h4>
                        <p class="text-sm text-secondary">Ancient, Wuxia</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <span class="text-xs font-bold text-primary px-3 py-1 bg-primary/5 rounded-full uppercase tracking-tighter">Hot</span>
                    </div>
                </div>
                <!-- Top 2 -->
                <div class="flex items-center gap-6 group cursor-pointer border-b border-surface-container pb-6 last:border-0">
                    <div class="text-5xl font-black text-surface-container-high italic w-12 group-hover:text-primary/50 transition-colors">02</div>
                    <div class="w-16 h-20 bg-surface-container-low rounded-lg overflow-hidden shrink-0">
                        <img class="w-full h-full object-cover" alt="minimalist architectural photo of a white staircase spiraling into a clear blue sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBuP7zrow-5CQ_3M0cCR5NiWzdIGlQJHr26u13u0zG2n3CJ5qW9L-aeOir5Akzug65ulIIunBi4qGmWpuvxvb09DBd6klIXa5Acb3ZavD3ekwMAbCe9tkr2L12__4abkHvIARM_5Nvr0E76Y5cUJfSFPuqR4NXN6ZBR3HvDQkJZU0ln8GwrDohrK4kqNcG6_sEj3FkG21BMDsRnRI6BeEOx_aZGeHG40AMa5xV4gKXbpPOVoKaXyPbnFpMmaUFggf5OgB_Z4plGswbw"/>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-headline font-bold text-lg text-on-surface group-hover:text-primary transition-colors">Stairway to Heaven</h4>
                        <p class="text-sm text-secondary">Xuanhuan, Adventure</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <span class="text-xs font-bold text-secondary px-3 py-1 bg-surface-container-low rounded-full uppercase tracking-tighter">Trending</span>
                    </div>
                </div>
                <!-- Top 3 -->
                <div class="flex items-center gap-6 group cursor-pointer border-b border-surface-container pb-6 last:border-0">
                    <div class="text-5xl font-black text-surface-container-high italic w-12 group-hover:text-primary/30 transition-colors">03</div>
                    <div class="w-16 h-20 bg-surface-container-low rounded-lg overflow-hidden shrink-0">
                        <img class="w-full h-full object-cover" alt="abstract expressionist painting with bold strokes of crimson and charcoal on a rough canvas texture" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAFydLBVJ9fB8SToVfwzed0BwitwOAkxH5RE6k7VtEsoS3B8upbINR-QxLpZVu61gJL7xUgOc-uRN7hRMECeoDfxPrHbFpTvH3EmODXyi3Lg7MeiLI0PGdR5MP_iz-dpPkQlP-zsYGnRDKbxUnM4p7gaUyn0LQruQhBffOF4jl6tZ1EHQDpK3Y6UTvcOJxIyJuZ9f-Gq_efLJYjxk5jhM4TdK0jxqAEmkuZZ8qgF7SmyqXp9ZHd-DA3XCawZPNdHWoymXMTZOowCAg"/>
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-headline font-bold text-lg text-on-surface group-hover:text-primary transition-colors">Blood and Roses</h4>
                        <p class="text-sm text-secondary">Horror, Mystery</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <span class="text-xs font-bold text-secondary px-3 py-1 bg-surface-container-low rounded-full uppercase tracking-tighter">Rising</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Genres -->
        <section>
            <h2 class="font-headline font-black text-3xl tracking-tighter mb-10">Genres</h2>
            <div class="flex flex-wrap gap-3">
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Xianxia</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Romance</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Urban</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Isekai</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Detective</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Fantasy</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Horror</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Post-Apocalypse</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">Historical</a>
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="#">VRMMO</a>
            </div>
            <div class="mt-12 p-8 bg-surface-container-low rounded-[6px]">
                <h5 class="font-headline font-bold text-on-surface mb-2">Find your favorite story?</h5>
                <p class="text-sm text-secondary leading-relaxed mb-6">A treasure trove of over 10,000+ carefully selected titles just for you.</p>
                <button class="w-full py-3 bg-white text-on-surface border border-outline-variant/30 rounded-[6px] font-bold text-sm hover:border-primary transition-all">Explore now</button>
            </div>
        </section>
    </div>
</div>
@endsection
