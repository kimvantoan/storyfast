@extends('layouts.admin')

@section('title', isset($chapter) ? 'Read Chapter: ' . $chapter->title : 'Review Story: ' . $story->title)
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
        <a class="group flex items-center gap-2 mb-8 text-secondary hover:text-primary transition-colors font-headline text-xs font-bold uppercase tracking-widest" href="{{ $story->is_approved ? route('admin.stories.index') : route('admin.pending.index') }}">
            <span class="material-symbols-outlined text-sm" data-icon="arrow_back">arrow_back</span>
            <span>{{ $story->is_approved ? 'Back to Stories' : 'Pending List' }}</span>
        </a>
        <div class="aspect-[2/3] w-full bg-stone-200 rounded-xl overflow-hidden mb-8 shadow-xl ring-1 ring-on-surface/5">
            <img alt="{{ $story->title }} cover" class="w-full h-full object-cover" src="{{ $story->cover_image ? Storage::url($story->cover_image) : 'https://placehold.co/400x600/E5E5E5/737373?text=No+Cover' }}" />
        </div>
        <h1 class="text-3xl font-headline font-black tracking-tight text-on-surface mb-4 leading-tight">{{ $story->title }}</h1>
        <div class="flex flex-wrap gap-2 mb-8">
            <span class="px-3 py-1 bg-primary/10 text-primary rounded-full text-[10px] font-bold tracking-widest uppercase">{{ ucfirst($story->status) }}</span>
            @foreach($story->categories as $category)
            <span class="px-3 py-1 bg-stone-200 text-secondary rounded-full text-[10px] font-bold tracking-widest uppercase">{{ $category->name }}</span>
            @endforeach
        </div>
        <!-- Description -->
        <section class="mb-10">
            <h3 class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-secondary mb-3">Synopsis</h3>
            <p class="text-sm text-stone-600 leading-relaxed font-body">
                {{ Str::limit(strip_tags($story->description), 300) }}
            </p>
        </section>
        <!-- Author Profile -->
        <section class="mb-10">
            <h3 class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-secondary mb-3">Author</h3>
            <div class="flex items-center gap-4 bg-white p-4 rounded-xl border border-outline-variant/10 shadow-sm">
                <div class="w-12 h-12 border border-stone-200 rounded-full overflow-hidden shrink-0">
                    <img alt="{{ $story->author }}" class="w-full h-full object-cover" src="https://ui-avatars.com/api/?name={{ urlencode($story->author) }}" />
                </div>
                <div>
                    <p class="font-headline font-bold text-on-surface text-sm">{{ $story->author }}</p>
                </div>
            </div>
        </section>

        @if(auth()->user()->role === 'admin' && !$story->is_approved)
        <!-- Reviewer Area -->
        <section class="mb-8">
            <h3 class="font-headline font-bold text-xs uppercase tracking-[0.2em] text-secondary mb-3">Decision Notes</h3>
            <textarea class="w-full bg-white border border-outline-variant/20 focus:border-primary focus:ring-1 focus:ring-primary text-sm p-4 h-28 resize-none placeholder:text-secondary/40 font-body rounded-xl shadow-sm outline-none" placeholder="Add private reviewer notes..."></textarea>
        </section>
        @endif
    </div>
</div>

<div class="flex-1 flex flex-col h-full bg-white relative">
@if(isset($chapter))
    <!-- Full Chapter Reading View -->
    <!-- Reader Header -->
    <div class="h-16 px-12 border-b border-outline-variant/10 flex items-center justify-between bg-white/80 backdrop-blur-sm sticky top-0 z-10 shrink-0">
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.stories.show', ['story' => $story, 'toc' => 1]) }}" class="flex items-center justify-center w-8 h-8 rounded-full bg-stone-100 hover:bg-stone-200 text-stone-500 transition-colors mr-2" title="List Chapters">
                <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            </a>
            <span class="text-xs font-bold uppercase tracking-widest text-[#a53600]">Chapter {{ $chapter->order_index }}</span>
            <span class="h-4 w-px bg-outline-variant/30"></span>
            <span class="text-sm font-headline font-medium text-secondary italic">"{{ $chapter->title }}"</span>
        </div>
        <div class="flex items-center gap-6 text-[10px] font-bold uppercase tracking-widest text-secondary/60">
            <span>{{ number_format(str_word_count(strip_tags($chapter->content))) }} Words</span>
        </div>
    </div>
    <!-- Scrollable Content Area -->
    <div class="flex-1 overflow-y-auto custom-scrollbar px-12 py-16 bg-white relative">
        <article class="max-w-[720px] mx-auto pb-32">
            <div class="mb-16 text-center">
                <span class="block text-[10px] font-bold tracking-[0.4em] uppercase text-secondary mb-4">— Full Chapter View —</span>
                <h2 class="text-4xl font-headline font-black text-on-surface">{{ $chapter->title }}</h2>
            </div>


            <div class="review-content text-[19px] leading-[2.1] text-stone-800 font-serif space-y-8 max-w-[65ch] mx-auto">
                {!! $chapter->content !!}
            </div>
        </article>

        <!-- Bottom Navigation -->
        <div class="max-w-[720px] mx-auto pb-16 pt-8 border-t border-stone-100 flex items-center justify-between">
            @if($prevChapter)
            <a href="{{ route('admin.chapters.show', $prevChapter) }}" class="flex items-center gap-2 px-5 py-2.5 bg-white border border-stone-200 rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.02)] text-stone-600 hover:text-[#a53600] hover:border-[#a53600]/30 transition-all font-headline font-bold text-xs uppercase tracking-widest active:scale-95">
                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                Prev
            </a>
            @else
            <div></div>
            @endif

            <a href="{{ route('admin.stories.show', ['story' => $story, 'toc' => 1]) }}" class="flex items-center gap-2 px-4 py-2.5 text-stone-400 hover:text-stone-800 transition-colors font-headline font-bold text-xs uppercase tracking-widest group">
                <span class="material-symbols-outlined text-[18px] group-hover:scale-110 transition-transform">view_list</span>
                List Chapters
            </a>

            @if($nextChapter)
            <a href="{{ route('admin.chapters.show', $nextChapter) }}" class="flex items-center gap-2 px-5 py-2.5 bg-white border border-stone-200 rounded-lg shadow-[0_2px_4px_rgba(0,0,0,0.02)] text-stone-600 hover:text-[#a53600] hover:border-[#a53600]/30 transition-all font-headline font-bold text-xs uppercase tracking-widest active:scale-95">
                Next
                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            </a>
            @else
            <div></div>
            @endif
        </div>
    </div>
    
    @if(auth()->user()->role === 'admin' && !$chapter->is_approved)
    <!-- Sticky Action Footer for Approving/Rejecting Pending Chapters -->
    <div class="h-24 shrink-0 px-12 bg-white/95 backdrop-blur-md border-t border-outline-variant/10 flex items-center justify-between z-20 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] absolute bottom-0 left-0 right-0">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-secondary" data-icon="rate_review">rate_review</span>
            <p class="text-xs font-headline font-medium text-secondary">Chapter awaiting editorial decision...</p>
        </div>
        <div class="flex gap-4">
            <form action="{{ route('admin.pending.chapters.reject', $chapter) }}" method="POST" onsubmit="return confirm('Reject and delete this chapter?');" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-8 h-12 bg-stone-200 text-on-surface font-headline font-bold uppercase tracking-widest text-xs transition-all flex items-center gap-2 hover:bg-red-100 hover:text-red-700 rounded-lg">
                    <span class="material-symbols-outlined text-lg" data-icon="close">close</span>
                    Reject Chapter
                </button>
            </form>
            <form action="{{ route('admin.pending.chapters.approve', $chapter) }}" method="POST" class="m-0">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-[#a53600] px-10 h-12 text-white font-headline font-bold uppercase tracking-widest text-xs transition-all shadow-lg flex items-center gap-2 rounded-lg hover:brightness-110 active:scale-95">
                    <span class="material-symbols-outlined text-lg" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Approve Chapter
                </button>
            </form>
        </div>
    </div>
    @endif

@else
    <!-- General Story Review View without chapter (Table of Contents) -->
    <div class="flex-1 flex flex-col bg-white overflow-hidden relative">
        <div class="h-16 px-12 border-b border-outline-variant/10 flex items-center bg-white/80 backdrop-blur-sm sticky top-0 z-10 shrink-0">
            <h2 class="text-lg font-headline font-black tracking-tight text-stone-800">Table of Contents</h2>
        </div>
        <div class="flex-1 overflow-y-auto custom-scrollbar p-12 bg-stone-50">
            <div class="max-w-[720px] mx-auto space-y-4">
                @forelse($story->chapters()->orderBy('order_index')->get() as $ch)
                    <a href="{{ route('admin.chapters.show', $ch) }}" class="block bg-white p-6 rounded-xl border border-stone-100 shadow-sm hover:shadow-md hover:border-[#a53600]/30 transition-all group">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-[10px] font-bold uppercase tracking-widest text-stone-400 mb-1 block">Chapter {{ $ch->order_index }}</span>
                                <h3 class="font-headline font-bold text-stone-800 text-lg group-hover:text-[#a53600] transition-colors">{{ $ch->title }}</h3>
                            </div>
                            <div class="text-right flex items-center gap-6">
                                <span class="text-[10px] font-bold uppercase tracking-widest text-secondary/60">{{ number_format(str_word_count(strip_tags($ch->content))) }} Words</span>
                                <span class="material-symbols-outlined text-stone-300 group-hover:text-[#a53600] transition-colors">chevron_right</span>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center p-12 bg-white rounded-xl border border-stone-100 shadow-sm">
                        <span class="material-symbols-outlined text-6xl text-stone-300 mb-4">menu_book</span>
                        <h3 class="text-xl font-headline font-black text-stone-700 mb-2">No Chapters Yet</h3>
                        <p class="text-stone-500 font-body text-sm">This story currently has no chapters submitted for review.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    @if(auth()->user()->role === 'admin' && !$story->is_approved)
    <!-- Sticky Action Footer for Approving/Rejecting Pending Stories -->
    <div class="h-24 shrink-0 px-12 bg-white/95 backdrop-blur-md border-t border-outline-variant/10 flex items-center justify-between z-20 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
        <div class="flex items-center gap-4">
            <span class="material-symbols-outlined text-secondary" data-icon="rate_review">rate_review</span>
            <p class="text-xs font-headline font-medium text-secondary">Awaiting editorial decision...</p>
        </div>
        <div class="flex gap-4">
            <form action="{{ route('admin.stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Reject and delete this manuscript?');" class="m-0">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-8 h-12 bg-stone-200 text-on-surface font-headline font-bold uppercase tracking-widest text-xs transition-all flex items-center gap-2 hover:bg-red-100 hover:text-red-700 rounded-lg">
                    <span class="material-symbols-outlined text-lg" data-icon="close">close</span>
                    Reject Manuscript
                </button>
            </form>
            <form action="{{ route('admin.pending.approve', $story) }}" method="POST" class="m-0">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-[#a53600] px-10 h-12 text-white font-headline font-bold uppercase tracking-widest text-xs transition-all shadow-lg flex items-center gap-2 rounded-lg hover:brightness-110 active:scale-95">
                    <span class="material-symbols-outlined text-lg" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                    Approve for Publishing
                </button>
            </form>
        </div>
    </div>
    @endif
@endif
</div>
@endsection