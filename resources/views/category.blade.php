@extends('layouts.app')

@section('title', '- Category')

@section('content')
<div class="max-w-[1280px] mx-auto px-4 md:px-8 py-2">
    <!-- Page Title -->
    <header class="mb-8">
        <h1 class="text-[26px] md:text-[28px] font-bold text-gray-800 mb-2">{{ $category->name }}</h1>
        @if($category->description)
        <div class="text-[14px] text-gray-600 leading-[1.6] max-w-none">
            {{ $category->description }}
        </div>
        @endif
    </header>

    <!-- Filter Bar -->
    <div class="mb-8 flex gap-6 items-center text-[13px] uppercase border-b border-gray-100 pb-4">
        <a href="{{ route('category.show', ['slug' => $category->slug, 'filter' => 'hottest']) }}" class="{{ (!isset($filter) || $filter === 'hottest') ? 'bg-[#3b66f5] text-white px-3 py-1.5 rounded-sm' : 'text-gray-500 hover:text-blue-600 transition-colors' }}">Hot</a>
        <a href="{{ route('category.show', ['slug' => $category->slug, 'filter' => 'newest']) }}" class="{{ (isset($filter) && $filter === 'newest') ? 'bg-[#3b66f5] text-white px-3 py-1.5 rounded-sm' : 'text-gray-500 hover:text-blue-600 transition-colors' }}">Newest</a>
        <a href="{{ route('category.show', ['slug' => $category->slug, 'filter' => 'full']) }}" class="{{ (isset($filter) && $filter === 'full') ? 'bg-[#3b66f5] text-white px-3 py-1.5 rounded-sm' : 'text-gray-500 hover:text-blue-600 transition-colors' }}">Full</a>
    </div>

    <!-- Story Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-8">
        @foreach($stories as $story)
        <article class="flex gap-4 group cursor-pointer" onclick="window.location.href='{{ route('story.show', $story->slug) }}'">
            <!-- Thumbnail -->
            <div class="w-[90px] md:w-[100px] shrink-0 aspect-[2/3] relative overflow-hidden bg-gray-100 shadow-sm border border-gray-100">
                @if($story->cover_image)
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="{{ $story->title }}" src="{{ Str::startsWith($story->cover_image, 'http') ? $story->cover_image : Storage::url($story->cover_image) }}" />
                @endif
            </div>

            <!-- Content -->
            <div class="flex-1 flex flex-col py-0.5 min-w-0">
                <h3 class="font-bold text-[15px] sm:text-[16px] text-[#333] leading-snug mb-2 group-hover:text-primary transition-colors line-clamp-2 truncate whitespace-normal">
                    {{ $story->title }}
                </h3>

                <p class="text-[13px] text-gray-500 line-clamp-3 mb-2 leading-relaxed">
                    {{ Str::limit(strip_tags($story->description), 150) }}
                </p>

                <!-- Stats Footer -->
                <div class="mt-auto flex items-center gap-4 text-gray-500 text-[12px] font-medium">
                    <div class="flex items-center gap-1 opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[14px] h-[14px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span>{{ number_format($story->views) }}</span>
                    </div>
                    <div class="flex items-center gap-1 opacity-80">
                        <svg class="w-[14px] h-[14px] text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005z" clip-rule="evenodd" />
                        </svg>
                        <span>5.0</span>
                    </div>
                    <div class="flex items-center gap-1 opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-[14px] h-[14px]">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 010 3.75H5.625a1.875 1.875 0 010-3.75z" />
                        </svg>
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
</div>
@endsection