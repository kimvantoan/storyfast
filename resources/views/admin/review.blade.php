@extends('layouts.admin')

@section('title', 'Review Manuscript')
@section('main_class', 'flex h-[calc(100vh-64px)] w-full overflow-hidden')

@section('content')
<style>
.custom-scrollbar::-webkit-scrollbar {
    width: 4px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #e5e2e1;
    border-radius: 10px;
}
</style>

<!-- Story Metadata Sidebar (Enhanced Left Section) -->
<div class="w-[400px] shrink-0 bg-stone-50 border-r border-outline-variant/10 flex flex-col h-full overflow-y-auto custom-scrollbar">
<!-- Cover & Title -->
<div class="p-8">
<a class="group flex items-center gap-2 mb-8 text-secondary hover:text-primary transition-colors font-headline text-xs font-bold uppercase tracking-widest" href="{{ url('admin/pending') }}">
<span class="material-symbols-outlined text-sm" data-icon="arrow_back">arrow_back</span>
<span>Pending List</span>
</a>
<div class="aspect-[2/3] w-full bg-stone-200 rounded-xl overflow-hidden mb-8 shadow-xl ring-1 ring-on-surface/5">
<img alt="The Echo of Sun-Drenched Valleys cover" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuApUHlJo5W_YbgmX75izJARDXMYsHEncY91fjbJYXGV-G6dD22p3vkakPM9WFpFkrOt-GOZDOii8enhcATvxwHI2Ul5d3edfRAr-KPZQE_3RVCcNTDMS_AQVfZrbbjws7MXqGRbG75EW9q1yD_gT8dwKB-0XIc53lyIRsmXztZgo9g8xpIg67pv8OEBBW-TyyQumCVziZelwRUcFewSow4-NhLvOfTcoy5hMqcUf1DyPNxzJxm2MAgU2ut1MXxYaTDGiRUaXTgBi-yb"/>
</div>
<h1 class="text-3xl font-headline font-black tracking-tight text-on-surface mb-4 leading-tight">The Echo of Sun-Drenched Valleys</h1>
<div class="flex flex-wrap gap-2 mb-8">
<span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-[10px] font-bold tracking-widest uppercase">Draft v2.4</span>
<span class="px-3 py-1 bg-stone-200 text-secondary rounded-full text-[10px] font-bold tracking-widest uppercase">Literary Fiction</span>
</div>
<!-- Description -->
<section class="mb-10">
<h3 class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-secondary mb-3">Synopsis</h3>
<p class="text-sm text-stone-600 leading-relaxed font-body">
                        A meditative exploration of isolation in a remote mountain valley, told through the journals of a former urban journalist seeking silence in the ruins of an ancestral estate.
                    </p>
</section>
<!-- Author Profile -->
<section class="mb-10">
<h3 class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-secondary mb-3">Author</h3>
<div class="flex items-center gap-4 bg-white p-4 rounded-xl border border-outline-variant/10 shadow-sm">
<div class="w-12 h-12 rounded-full overflow-hidden shrink-0">
<img alt="Elena Thorne" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBG2D67WNAlGg2ISwje56r2elW1NNmsbKJoL-366ProEdvr-61dB2k81AOpToV3Pckkl1yb4MYnYYNUBbrbXbr6qXx3gXF4AkOT6cqWd5RSjCzJ5CvRAPwv_gnnlAL-3nBZkb28IahJkCErx21qYtV3cjTXSAOxqEEeJkBBgrtFBKX58ZIy_1ssfQZA8UEJCdaEr0LeElO1P8WYUFsKp3XQupg2qL9CL3x66lBmgMmv5Iwbm1ogrFmg5qkPtDo0zLMpGzatm5g8bFTq"/>
</div>
<div>
<p class="font-headline font-bold text-on-surface text-sm">Elena Thorne</p>
<p class="text-[10px] text-secondary uppercase tracking-widest font-bold">Verified Contributor</p>
</div>
</div>
</section>
<!-- Reviewer Area -->
<section class="mb-8">
<h3 class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-secondary mb-3">Decision Notes</h3>
<textarea class="w-full bg-white border border-outline-variant/20 focus:border-primary focus:ring-1 focus:ring-primary text-sm p-4 h-28 resize-none placeholder:text-secondary/40 font-body rounded-xl shadow-sm outline-none" placeholder="Add private reviewer notes..."></textarea>
</section>
</div>
</div>

<!-- Full Chapter Reading View -->
<div class="flex-1 flex flex-col h-full bg-white relative">
<!-- Reader Header -->
<div class="h-16 px-12 border-b border-outline-variant/10 flex items-center justify-between bg-white/80 backdrop-blur-sm sticky top-0 z-10 shrink-0">
<div class="flex items-center gap-4">
<span class="text-xs font-bold uppercase tracking-widest text-[#a53600]">Chapter 01</span>
<span class="h-4 w-px bg-outline-variant/30"></span>
<span class="text-sm font-headline font-medium text-secondary italic">"The Silence of the Cedar"</span>
</div>
<div class="flex items-center gap-6 text-[10px] font-bold uppercase tracking-widest text-secondary/60">
<span>14,200 Words Total</span>
<span>Reading: 45 min</span>
</div>
</div>
<!-- Scrollable Content Area -->
<div class="flex-1 overflow-y-auto custom-scrollbar px-12 py-16 bg-white relative">
<article class="max-w-[720px] mx-auto pb-32">
<div class="mb-16 text-center">
<span class="block text-[10px] font-bold tracking-[0.4em] uppercase text-secondary mb-4">— Full Chapter View —</span>
<h2 class="text-4xl font-headline font-bold text-on-surface">The Silence of the Cedar</h2>
</div>
<div class="text-lg text-on-surface/90 font-body space-y-8" style="line-height:2;">
<p>
                            The valley did not wake up so much as it gradually revealed itself. First came the scent of cedar and damp earth, then the persistent, rhythmic clicking of cicadas that seemed to vibrate through the very stones of the house. Elena stood on the porch, her coffee steam blending with the morning mist.
                        </p>
<p>
                            It had been three years since the silence became permanent. In those years, she had learned to read the landscape like a sprawling, ever-changing manuscript. The way the light hit the western ridge meant rain by sunset. The sudden flight of crows from the hollow suggested a fox was on the move. Every shadow, every rustle, was a sentence in a story that didn't need her to exist, yet she found herself recording it all.
                        </p>
<p>
                            She reached for the notebook on the railing. Its leather cover was scarred from exposure, but the pages inside were crisp, filled with meticulous shorthand. This was the work. Not the grand narratives of the city publishers she once courted, but the small, vital truths of survival and observation.
                        </p>
<div class="flex justify-center my-16">
<span class="text-2xl text-outline-variant/50 tracking-[1em] font-serif">...</span>
</div>
<p class="italic text-on-surface/70 border-l-2 border-[#a53600]/20 pl-8 py-2">
                            "If one is to truly see," she wrote that evening, "one must first accept that they are invisible to the thing they observe. The valley does not care for my gaze, and in that indifference lies its absolute beauty."
                        </p>
<p>
                            The manuscript continued for pages, a blend of naturalistic observation and philosophical inquiry. As a reviewer, the prose felt immediate—devoid of the pretension that usually clogged the slush pile. There was a raw, rhythmic quality to the sentences that suggested a writer who had spent more time listening than speaking.
                        </p>
<p>
                            By noon, the mist had cleared, revealing the sharp, jagged line of the northern peaks. Elena watched a hawk circle—a tiny black spec against the cobalt sky—and wondered if the city still hummed with the same frantic energy she had fled. Here, time was measured in the growth of lichen and the slow migration of shadows.
                        </p>
</div>
<!-- Reading Navigation -->
<div class="mt-24 pt-12 border-t border-outline-variant/10 flex justify-between items-center mb-12">
<button class="flex items-center gap-3 text-secondary hover:text-primary transition-all group">
<span class="material-symbols-outlined text-lg transition-transform group-hover:-translate-x-1" data-icon="chevron_left">chevron_left</span>
<div class="text-left">
<p class="text-[10px] font-bold uppercase tracking-widest text-secondary/40">Previous</p>
<p class="text-sm font-headline font-bold">Front Matter</p>
</div>
</button>
<div class="text-center">
<p class="text-[10px] font-bold uppercase tracking-widest text-secondary/40 mb-1">Page 1 of 42</p>
<div class="w-32 h-1 bg-stone-200 rounded-full overflow-hidden">
<div class="w-1/4 h-full bg-[#a53600]/50"></div>
</div>
</div>
<button class="flex items-center gap-3 text-secondary hover:text-primary transition-all group">
<div class="text-right">
<p class="text-[10px] font-bold uppercase tracking-widest text-secondary/40">Next Chapter</p>
<p class="text-sm font-headline font-bold">Shadows of the Ridge</p>
</div>
<span class="material-symbols-outlined text-lg transition-transform group-hover:translate-x-1" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</article>
</div>
<!-- Sticky Action Footer -->
<div class="h-24 shrink-0 px-12 bg-white/95 backdrop-blur-md border-t border-outline-variant/10 flex items-center justify-between z-20 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined text-secondary" data-icon="rate_review">rate_review</span>
<p class="text-xs font-headline font-medium text-secondary">Awaiting editorial decision...</p>
</div>
<div class="flex gap-4">
<button class="px-8 h-12 bg-stone-200 text-on-surface font-headline font-bold uppercase tracking-widest text-xs transition-all flex items-center gap-2 hover:bg-red-100 hover:text-red-700 rounded-lg">
<span class="material-symbols-outlined text-lg" data-icon="close">close</span>
                        Reject Manuscript
                    </button>
<button class="bg-[#a53600] px-10 h-12 text-white font-headline font-bold uppercase tracking-widest text-xs transition-all shadow-lg flex items-center gap-2 rounded-lg hover:brightness-110 active:scale-95">
<span class="material-symbols-outlined text-lg" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        Approve for Publishing
                    </button>
</div>
</div>
</div>
@endsection
