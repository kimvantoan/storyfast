@extends('layouts.app')

@section('title', '- Story Detail')

@section('content')
<div class="max-w-[1440px] mx-auto px-6 md:px-12 py-12">
    <!-- Above the Fold: Story Header Section -->
    <section class="flex flex-col md:flex-row gap-12 mb-24">
        <!-- Left Column: Cover & Main Actions -->
        <div class="w-full md:w-[240px] shrink-0">
            <div class="aspect-[3/4] w-full bg-surface-container overflow-hidden rounded-lg">
                <img class="w-full h-full object-cover" alt="Atmospheric book cover featuring a lone figure walking through a misty pine forest at dusk, cinematic moody lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjj3ESJJyYEq0XpVCBmoeqzDKPVW4PTByuOvwhu8aYQPSGuvXLzrmS5p-rMICeEqMvb5esfBXFvRY3viAwuvm7i0vi56igk5M0emIE3U2cws6ZwI61js8RoXeRWoJ62Rymo6gSD3A7qvwMBpfp-wNmYX8aesmNMJ_uBfzJApnUm9L4xaTV0oOKlCznezDW9v3IObnOdgOi5_xtQTq7ZoFBSweYb8XN6erCBHPhpL48-8GcxYWC51Rrh1bQpRfKDSM71LVpzMBt9fRC"/>
            </div>
            <div class="mt-8 flex flex-col gap-3">
                <button onclick="window.location.href='{{ url('/reading') }}'" class="w-full py-4 bg-on-surface text-surface text-sm font-bold tracking-wide uppercase rounded-[6px] hover:bg-[#111] active:scale-[0.98] transition-all duration-300 border border-transparent">
                    Read from Beginning
                </button>
                <button onclick="window.location.href='{{ url('/reading') }}'" class="w-full py-4 bg-surface-container-lowest border border-outline-variant/30 text-on-surface text-sm font-bold tracking-wide uppercase rounded-[6px] hover:bg-surface-container-low active:scale-[0.98] transition-all duration-300">
                    Continue Reading
                </button>
            </div>
        </div>
        <!-- Right Column: Story Metadata & Actions -->
        <div class="flex-1 flex flex-col">
            <div class="mb-2">
                <h1 class="text-4xl md:text-5xl font-black font-headline text-on-surface tracking-tighter mb-4 leading-tight uppercase">The Last Manuscript of Memory</h1>
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-secondary text-sm font-medium">Author:</span>
                    <a class="text-primary font-semibold text-sm hover:underline" href="#">Han Mac Vu</a>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-8 mb-8 border-y border-outline-variant/15 py-6">
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Genre</div>
                    <div class="text-sm font-semibold text-on-surface">Drama, Fantasy</div>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Status</div>
                    <div class="text-sm font-semibold text-primary">Ongoing</div>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Chapters</div>
                    <div class="text-sm font-semibold text-on-surface">1,240</div>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Reads</div>
                    <div class="text-sm font-semibold text-on-surface">45.2K</div>
                </div>
            </div>
            <div class="flex items-center gap-4 mb-8">
                <div class="flex text-primary">
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                    <span class="material-symbols-outlined">star</span>
                </div>
                <span class="text-lg font-bold text-on-surface">4.8</span>
                <span class="text-secondary text-sm">(1,248 ratings)</span>
            </div>
            <div class="mb-10 max-w-[720px]">
                <p class="text-secondary leading-[1.9] font-body text-base line-clamp-5">
                    In the heart of the mist-shrouded city, where secrets are sealed within ancient manuscripts, a young writer stumbles upon a terrifying truth about his lineage. Every word written seems to dictate the future of reality. Can he change his own conclusion, or will he become another victim in fate's narrative? A dramatic journey between the boundaries of reality and illusion, where silence holds destructive power.
                </p>
            </div>
            <div class="mt-auto flex flex-wrap gap-4">
                <button class="flex items-center gap-2 px-6 py-3 bg-surface-container-low text-on-surface rounded-full text-sm font-semibold hover:bg-surface-container-high border border-outline-variant/10 transition-colors">
                    <span class="material-symbols-outlined text-xl">auto_stories</span>
                    Library
                </button>
                <button class="flex items-center gap-2 px-6 py-3 bg-surface-container-low text-on-surface rounded-full text-sm font-semibold hover:bg-surface-container-high border border-outline-variant/10 transition-colors">
                    <span class="material-symbols-outlined text-xl">rate_review</span>
                    Reviews
                </button>
                <button class="flex items-center gap-2 px-6 py-3 bg-surface-container-low text-on-surface rounded-full text-sm font-semibold hover:bg-surface-container-high border border-outline-variant/10 transition-colors">
                    <span class="material-symbols-outlined text-xl">share</span>
                    Share
                </button>
            </div>
        </div>
    </section>

    <!-- Chapter List Section -->
    <section class="mb-24 bg-surface-container-low p-8 md:p-12 rounded-[6px]">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-12">
            <h2 class="text-2xl font-black font-headline tracking-tighter text-on-surface uppercase">Chapter List</h2>
            <div class="flex items-center gap-4 w-full md:w-auto">
                <div class="relative flex-1 md:w-64">
                    <input class="w-full bg-surface-container-lowest border-none border-b border-outline-variant/30 focus:ring-0 focus:border-primary text-sm px-4 py-2 rounded-t placeholder:text-secondary/60" placeholder="Search chapters..." type="text"/>
                </div>
                <button class="material-symbols-outlined text-secondary hover:text-primary transition-colors">sort</button>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-x-12 gap-y-4">
            <!-- Chapter items -->
            <a class="flex items-center justify-between group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,240: The Final Silence</span>
                <span class="w-2 h-2 bg-primary rounded-full"></span>
            </a>
            <a class="flex items-center justify-between group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,239: Footsteps in the Dark</span>
                <span class="w-2 h-2 bg-primary rounded-full"></span>
            </a>
            <a class="flex items-center justify-between group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,238: The Library's Secret</span>
                <span class="w-2 h-2 bg-primary rounded-full"></span>
            </a>
            <!-- Repeating for layout demonstration -->
            <a class="flex items-center group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,237: The Rose's Curse</span>
            </a>
            <a class="flex items-center group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,236: Shattered Memories</span>
            </a>
            <a class="flex items-center group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,235: The Winding Path</span>
            </a>
            <a class="flex items-center group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,234: A Glimmer of Light</span>
            </a>
            <a class="flex items-center group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,233: Breath of the Night</span>
            </a>
            <a class="flex items-center group py-3 border-b border-outline-variant/10" href="{{ url('/reading') }}">
                <span class="text-sm font-medium text-secondary group-hover:text-primary transition-colors">Chapter 1,232: Sad Melody</span>
            </a>
        </div>
        <div class="mt-12 text-center">
            <button class="text-primary text-sm font-bold uppercase tracking-widest hover:text-on-surface transition-colors flex items-center gap-2 mx-auto">
                View all chapters <span class="material-symbols-outlined text-[16px]">arrow_downward</span>
            </button>
        </div>
    </section>

    <!-- Comments & Reviews Section -->
    <section class="max-w-[840px] mx-auto md:mx-0">
        <div class="flex gap-12 mb-12 border-b border-outline-variant/15">
            <button class="pb-4 text-sm font-bold tracking-widest text-primary border-b-2 border-primary">COMMENTS (1.2K)</button>
            <button class="pb-4 text-sm font-bold tracking-widest text-secondary hover:text-on-surface transition-colors">REVIEWS (842)</button>
        </div>

        <!-- Comment Form -->
        <div class="flex gap-6 mb-16">
            <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 bg-surface-container-high">
                <img class="w-full h-full object-cover" alt="Close-up portrait of a modern minimalist profile avatar" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEEnrusFhQts3d5B_03g8knguhzhJHitSiiHs9RVkGoi02RfO8trvWIB387lVM_kgQojEgEpXISdBeq85B-3w8RPjGaokBw010yvXi7YYkcddY9p7n34drIgCfvSvN0GyKgj2UYGrE7KCeFJuXOCuexZIe-gUbUk3l1i7ZLRbzV-wP_EnrqWUHVFOdSb1173PRtYfcO-pH5q3dW4Fmwrd5395-hOfp7t9gTS57GgMdV7qPTy3n9pMXU8_WIfGROr80WZ-5UAWj3_LU"/>
            </div>
            <div class="flex-1">
                <textarea class="w-full bg-surface-container-lowest border-none border-b border-outline-variant/30 focus:border-primary focus:ring-0 text-sm py-3 px-0 resize-none min-h-[100px] transition-all" placeholder="Share your thoughts about this story..."></textarea>
                <div class="flex justify-end mt-4">
                    <button class="px-8 py-3 bg-on-surface text-surface text-xs font-bold uppercase tracking-widest rounded-sm hover:opacity-90 active:scale-[0.95] transition-all">Post Comment</button>
                </div>
            </div>
        </div>

        <!-- Comments List -->
        <div class="space-y-12">
            <!-- Parent Comment -->
            <div class="space-y-8">
                <div class="flex gap-6">
                    <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 bg-surface-container-high">
                        <img class="w-full h-full object-cover" alt="Portrait of a young woman with a thoughtful expression" src="https://lh3.googleusercontent.com/aida-public/AB6AXuClmk3BdcwygfQGJqUXOrc3hEGW5A8iCqVbiV-veitEu-g3NMujTA1HPo1tC0CYdL3esx0BHnR2-R6Os78So9jhRxDMhr-_gLbZkve2Y2aM5ck3MaAJf2T7iZogk9529F0qbWxUtz17nPBxf-oKGdupvTG8GzrIQeOljs0CAOdQjHx_d0Wmn-EYFM0v4K41RMZf_Vd_eNehP4OCDsK3JLP6fIobKqHOR4bh7iB9y7l_CKasYz09bBbfmx8StuzC_Sns0UpsmWuc4wCQ"/>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <span class="font-bold text-sm">Le Minh Nhat</span>
                            <span class="text-[11px] text-secondary font-medium uppercase tracking-wider">2 hours ago</span>
                        </div>
                        <p class="text-sm text-secondary leading-relaxed mb-4">Every detail in this new chapter really gave me goosebumps. The author's description of space is very deep.</p>
                        <div class="flex gap-6">
                            <button class="text-xs font-bold text-primary hover:underline">Reply</button>
                            <button class="flex items-center gap-1 text-xs text-secondary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1;">thumb_up</span> 42
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Reply Indented -->
                <div class="ml-[60px] md:ml-[40px] border-l-2 border-outline-variant/20 pl-6">
                    <div class="flex gap-6">
                        <div class="w-10 h-10 rounded-full overflow-hidden shrink-0 bg-surface-container-high">
                            <img class="w-full h-full object-cover" alt="Man with glasses in creative setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxBDZXnw9qWrVKOSwVWRqj67luxzFNTFTVV88AmcMnWAH0gcNxVjTIgnrCP34IPqikdJVejfTJMtq-jzxXD127ZG4iSNf9OmoP8RHwoSi2M5tbv4rKfc7JQwbhtBkHAgIBY9n-Jv_XxbiHJwJbdmGBzuRJntu062dsJV6-Sw7c_d51btnuDBMIdx4NCYhd60H8aKhg135yGvLuLmDktSBRURVh3l5zqCH0ZTo9EGlwgWfz5nXqZZMyRa25jjfY-GyqCF74pocSvC6C"/>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-1">
                                <span class="font-bold text-sm">Tran Van Tu</span>
                                <span class="text-[11px] text-secondary font-medium uppercase tracking-wider">1 hour ago</span>
                            </div>
                            <p class="text-sm text-secondary leading-relaxed mb-4">I agree with you, especially that last dialogue. It felt very haunting.</p>
                            <div class="flex gap-6">
                                <button class="text-xs font-bold text-primary hover:underline">Reply</button>
                                <button class="flex items-center gap-1 text-xs text-secondary hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-sm">thumb_up</span> 12
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Another Parent Comment -->
            <div class="flex gap-6">
                <div class="w-12 h-12 rounded-full overflow-hidden shrink-0 bg-surface-container-high">
                    <img class="w-full h-full object-cover" alt="Aesthetic profile photo of an artist" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDkcJ-bRzdTIU1MeABycIs_32Mk8m5kl0hocXIj-l80vrFQxJTAC1FVJZmLOgqqu0BYcrNi4qNycjaMW8IO1qeAUSaZ4Iy14M-2Zzp1fq6t1aMeAjEnuV6uIkroyKm0iJXc9rLEVZeCqv5G3XCQfU0sU15R1h63oMH6s87MKXn0VrputkVXqKaRislsjVFd99Iq1fwIq80axY4lD0wglm0FYXfBKzXh03yJDG6xPXz2qLS8iGwxPiK9H3KATTtCjs7M6_Ycv7iK8Hts"/>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-1">
                        <span class="font-bold text-sm">Nguyen Quynh Anh</span>
                        <span class="text-[11px] text-secondary font-medium uppercase tracking-wider">5 hours ago</span>
                    </div>
                    <p class="text-sm text-secondary leading-relaxed mb-4">I've been following this series since the early days. Can't believe the plot took this turn. Amazing!</p>
                    <div class="flex gap-6">
                        <button class="text-xs font-bold text-primary hover:underline">Reply</button>
                        <button class="flex items-center gap-1 text-xs text-secondary hover:text-primary transition-colors">
                            <span class="material-symbols-outlined text-sm">thumb_up</span> 89
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16">
            <button class="w-full py-4 bg-surface-container-low border border-transparent text-secondary text-xs font-black tracking-widest uppercase rounded-[6px] hover:text-primary hover:bg-surface-container-high transition-colors">View more comments</button>
        </div>
    </section>
</div>
@endsection
