@extends('layouts.app')

@section('title', '- Search')

@section('content')
<style>
    .editorial-shadow {
        transition: transform 0.2s cubic-bezier(0.2, 0, 0, 1);
    }

    .editorial-shadow:hover {
        transform: translateY(-4px);
    }
</style>

<div class="max-w-[1280px] mx-auto px-4 md:px-8 py-6 md:py-8">
    <!-- Search Banner Section -->
    <div class="mb-10 w-full max-w-3xl mx-auto">
        <h1 class="text-2xl md:text-3xl font-bold text-[#333] mb-6 text-center">Search Stories</h1>
        <form action="{{ route('search') }}" method="GET" class="relative group">
            <input name="q" value="{{ $q ?? '' }}" class="w-full pl-6 pr-24 md:pr-28 py-4 bg-white border border-gray-200 hover:border-gray-300 focus:border-primary focus:ring-1 focus:ring-primary rounded-xl text-base md:text-lg transition-all shadow-sm outline-none text-[#333]" placeholder="Search titles, authors..." type="text" />
            <button type="submit" class="absolute right-2 md:right-3 top-1/2 -translate-y-1/2 bg-primary text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-primary/90 transition-colors">Search</button>
        </form>
    </div>

    <!-- Results Section -->
    <section>
        <div class="flex justify-between items-baseline mb-8 border-b border-gray-100 pb-4">
            <h2 class="text-[18px] md:text-[20px] font-bold text-[#333]">{{ $q ? 'Results for "' . $q . '"' : 'Recent Discoveries' }}</h2>
            <span class="text-gray-500 text-sm font-medium">{{ number_format($stories->total()) }} results found</span>
        </div>

        @if($stories->isEmpty())
        <div class="text-center py-20 bg-white border border-gray-100 rounded-xl shadow-sm">
            <span class="material-symbols-outlined text-[64px] text-gray-200 mb-4">search_off</span>
            <h3 class="font-bold text-xl text-[#333] mb-2">No discoveries yet</h3>
            <p class="text-gray-500 text-sm md:text-base">We couldn't find any stories matching "{{ $q }}". Try a different keyword.</p>
        </div>
        @else
        <!-- System Theme Story Grid (from Category page) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
            @foreach($stories as $story)
            <article class="flex gap-4 group cursor-pointer" onclick="window.location.href='{{ route('story.show', $story->slug) }}'">
                <!-- Thumbnail -->
                <div class="w-[90px] md:w-[100px] shrink-0 aspect-[2/3] relative overflow-hidden bg-gray-100 shadow-sm border border-gray-100 rounded-sm">
                    @if($story->cover_image)
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $story->title }}" src="{{ Str::startsWith($story->cover_image, 'http') ? $story->cover_image : Storage::url($story->cover_image) }}" />
                    @endif
                </div>

                <!-- Content -->
                <div class="flex-1 flex flex-col py-0.5 min-w-0">
                    <h3 class="font-bold text-[15px] sm:text-[16px] text-[#333] leading-snug mb-1 group-hover:text-primary transition-colors line-clamp-2 truncate whitespace-normal">
                        {{ $story->title }}
                    </h3>

                    <p class="text-[14px] text-primary/80 font-medium mb-2">
                        {{ $story->author }}
                    </p>

                    <p class="text-[13px] text-gray-500 line-clamp-2 mb-2 leading-relaxed">
                        {{ Str::limit(strip_tags($story->description), 150) }}
                    </p>

                    <!-- Stats Footer -->
                    <div class="mt-auto flex items-center gap-4 text-gray-500 text-[12px] font-medium">
                        <div class="flex items-center gap-1 opacity-80">
                            <span class="material-symbols-outlined text-[16px]">visibility</span>
                            <span>{{ number_format($story->views) }}</span>
                        </div>
                        <div class="flex items-center gap-1 opacity-80">
                            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span>{{ number_format($story->rating_score ?? 0, 1) }}</span>
                        </div>
                        <div class="flex items-center gap-1 opacity-80">
                            <span class="material-symbols-outlined text-[16px]">list</span>
                            <span>{{ $story->chapters_count ?? 0 }} chương</span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center items-center gap-2 pagination-system text-sm">
            {{ $stories->links('pagination::tailwind') }}
        </div>
        @endif
    </section>
</div>

@endsection