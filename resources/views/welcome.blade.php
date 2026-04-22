@extends('layouts.app')

@section('title', '- Read Free Novels Online')
@section('meta_title', 'OnlineFreeNovels - Read Free Novels Online')
@section('meta_description', 'Read the best free novels online at OnlineFreeNovels. Discover top-tier literature, web novels, and light novels updated daily.')

@section('structured_data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "WebSite",
  "name": "OnlineFreeNovels",
  "url": "{{ url('/') }}",
  "description": "Read the best free novels online."
}
</script>
@endsection

@section('content')
<div class="max-w-[1440px] mx-auto px-4 sm:px-8 md:px-12 py-8">
    <!-- Hero Section: The Manuscript Spotlight -->
    @if($featuredStory)
    <section class="relative mb-24 overflow-hidden rounded-[6px] bg-surface-container-low group">
        <div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-1/2 p-6 sm:p-10 md:p-12 lg:p-20 order-2 md:order-1">
                <span class="inline-block px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold tracking-widest uppercase mb-4 md:mb-6 rounded-full">Editor's Choice</span>
                <h1 class="font-headline font-black text-[32px] md:text-[40px] lg:text-[48px] leading-[1.1] text-on-surface mb-4 md:mb-6 tracking-tighter">{{ $featuredStory->title }}</h1>
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($featuredStory->categories->take(3) as $cat)
                    <span class="text-xs font-semibold text-secondary px-3 py-1 bg-surface-container-high rounded-full">{{ $cat->name }}</span>
                    @endforeach
                </div>
                <p class="font-body text-base md:text-lg leading-[1.9] text-secondary mb-8 md:mb-10 line-clamp-2 max-w-lg">
                    {{ Str::limit(strip_tags($featuredStory->description), 150) }}
                </p>
                <div class="flex flex-col sm:flex-row gap-3 md:gap-4">
                    <button onclick="window.location.href='{{ route('story.show', $featuredStory->slug) }}'" class="bg-primary text-white px-8 py-3.5 md:py-4 rounded-[6px] font-bold text-sm flex items-center justify-center gap-2 hover:bg-black transition-colors">
                        Read Now
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
            <div class="w-full md:w-1/2 order-1 md:order-2 h-[280px] xs:h-[350px] sm:h-[400px] md:h-[500px]">
                @if($featuredStory->cover_image)
                <img class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-700" alt="Cover" src="{{ Storage::url($featuredStory->cover_image) }}" />
                @else
                <div class="w-full h-full bg-stone-200 flex items-center justify-center text-stone-400">No Cover</div>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Section: New Updates -->
    <section class="mb-16 md:mb-24">
        <style>
            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>
        <div class="flex justify-between items-end mb-6 md:mb-10">
            <h2 class="font-headline font-black text-2xl md:text-3xl tracking-tighter">New Updates</h2>
        </div>
        <div class="flex overflow-x-auto hide-scrollbar snap-x snap-mandatory gap-4 md:gap-6 pb-6">
            @forelse($latestUpdates as $story)
            <div class="group cursor-pointer shrink-0 w-[140px] sm:w-[160px] md:w-[200px] snap-start" onclick="window.location.href='{{ route('story.show', $story->slug) }}'">
                <div class="aspect-[3/4] overflow-hidden rounded-[6px] mb-4 bg-surface-container-highest border border-transparent group-hover:border-primary/30 transition-all duration-300">
                    @if($story->cover_image)
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Cover" src="{{ Storage::url($story->cover_image) }}" />
                    @else
                    <div class="w-full h-full flex items-center justify-center bg-stone-100 text-stone-400 font-headline">No Cover</div>
                    @endif
                </div>
                <h3 class="font-headline font-bold text-base text-on-surface mb-1 group-hover:text-primary transition-colors truncate">{{ $story->title }}</h3>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-secondary font-medium">Chapter {{ $story->chapters_count ?? 0 }}</span>
                </div>
            </div>
            @empty
            <p class="text-secondary col-span-full">No updates found.</p>
            @endforelse
        </div>
    </section>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-24 mb-16 md:mb-24">
        <!-- Section: Rankings -->
        <section class="lg:col-span-2">
            <div class="flex items-center gap-4 mb-6 md:mb-10">
                <h2 class="font-headline font-black text-2xl md:text-3xl tracking-tighter">Rankings</h2>
                <div class="flex bg-surface-container-low p-1 rounded-full text-[10px] font-bold uppercase tracking-widest text-secondary">
                    <button class="px-4 py-1 bg-white rounded-full text-primary shadow-sm">Hot</button>
                </div>
            </div>
            <div class="space-y-4 md:space-y-6">
                @forelse($hotStories as $index => $story)
                <div class="flex items-center gap-4 md:gap-6 group cursor-pointer border-b border-surface-container pb-4 md:pb-6 last:border-0" onclick="window.location.href='{{ route('story.show', $story->slug) }}'">
                    <div class="text-5xl font-black text-surface-container-high italic w-12 group-hover:text-primary transition-colors">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="w-16 h-20 bg-surface-container-low rounded-lg overflow-hidden shrink-0">
                        @if($story->cover_image)
                        <img class="w-full h-full object-cover" alt="Cover" src="{{ Storage::url($story->cover_image) }}" />
                        @else
                        <div class="w-full h-full bg-stone-100 flex items-center justify-center text-[10px] text-stone-400 text-center">No Cover</div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <h4 class="font-headline font-bold text-lg text-on-surface group-hover:text-primary transition-colors line-clamp-1">{{ $story->title }}</h4>
                        <p class="text-sm text-secondary">{{ implode(', ', $story->categories->pluck('name')->toArray()) }}</p>
                    </div>
                    <div class="text-right hidden sm:block">
                        <span class="text-xs font-bold text-primary px-3 py-1 bg-primary/5 rounded-full uppercase tracking-tighter">{{ number_format($story->views) }} views</span>
                    </div>
                </div>
                @empty
                <p class="text-secondary">No rankings available.</p>
                @endforelse
            </div>
        </section>

        <!-- Section: Genres -->
        <section>
            <h2 class="font-headline font-black text-2xl md:text-3xl tracking-tighter mb-6 md:mb-10">Genres</h2>
            <div class="flex flex-wrap gap-3">
                @forelse($categories as $category)
                <a class="px-5 py-3 bg-surface-container-lowest border border-outline-variant/20 rounded-[6px] text-sm font-semibold text-secondary hover:bg-primary hover:text-white hover:border-primary transition-all duration-300" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                @empty
                <p class="text-secondary">No genres found.</p>
                @endforelse
            </div>
            <div class="mt-12 p-8 bg-surface-container-low rounded-[6px]">
                <h5 class="font-headline font-bold text-on-surface mb-2">Find your favorite story?</h5>
                <p class="text-sm text-secondary leading-relaxed mb-6">A treasure trove of over 10,000+ carefully selected titles just for you.</p>
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="w-full py-3 bg-white text-on-surface border border-outline-variant/30 rounded-[6px] font-bold text-sm hover:border-primary transition-all">Explore now</button>
            </div>
        </section>
    </div>
</div>
@endsection