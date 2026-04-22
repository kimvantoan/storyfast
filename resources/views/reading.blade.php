@extends('layouts.app')

@section('title', '- ' . $chapter->title)

@section('main_class', 'min-h-screen pt-12 pb-48 flex flex-col items-center')

@section('content')

<article class="w-full max-w-[680px] px-6 relative z-10 mt-2">
    <!-- Chapter Metadata -->
    <header class="mb-6 text-center flex flex-col items-center gap-3">
        <!-- 1. Title (Story Title) -->
        <a href="{{ route('story.show', $story->slug) }}" class="font-sans text-[20px] md:text-[24px] font-bold text-[#003366] hover:underline">
            {{ $story->title }}
        </a>

        <!-- 2. Chapter 1: ..... -->
        <h1 class="font-sans text-[16px] md:text-[18px] text-stone-500 font-normal">
            Chapter {{ $chapter->order_index }}: {{ $chapter->title }}
        </h1>

        <!-- 3. Word -->
        <div class="font-sans text-[15px] text-stone-500">
            Word count: {{ number_format(str_word_count(strip_tags($chapter->content))) }}
        </div>
    </header>

    <!-- 4. Button next, list chapter, prev (TOP) -->
    <nav class="mb-12 border-y border-outline-variant/15 py-4">
        <div class="grid grid-cols-3 gap-4 font-headline text-sm font-medium">
            @if($prevChapter)
            <a class="flex flex-col items-start gap-1 p-3 rounded-[6px] bg-white hover:bg-surface-container-low transition-all group" href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $prevChapter->order_index]) }}">
                <span class="text-secondary text-[10px] uppercase tracking-widest flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">arrow_back</span> Prev</span>
                <span class="text-on-surface group-hover:text-primary transition-colors line-clamp-1 text-xs">Ch.{{ $prevChapter->order_index }}</span>
            </a>
            @else
            <div></div>
            @endif

            <a href="javascript:void(0)" onclick="openChapterDrawer()" class="flex items-center justify-center gap-2 p-3 rounded-[6px] bg-white hover:bg-surface-container-low transition-all text-secondary hover:text-on-surface">
                <span class="material-symbols-outlined text-[20px]">menu_book</span>
                <span class="text-[10px] uppercase tracking-widest text-center hidden md:inline">List Chapter</span>
            </a>

            @if($nextChapter)
            <a class="flex flex-col items-end gap-1 p-3 rounded-[6px] bg-white hover:bg-surface-container-low transition-all text-right group" href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $nextChapter->order_index]) }}">
                <span class="text-secondary text-[10px] uppercase tracking-widest flex items-center gap-1">Next <span class="material-symbols-outlined text-[14px]">arrow_forward</span></span>
                <span class="text-on-surface group-hover:text-primary transition-colors line-clamp-1 text-xs">Ch.{{ $nextChapter->order_index }}</span>
            </a>
            @else
            <div></div>
            @endif
        </div>
    </nav>

    <!-- 5. Content -->
    <div class="reading-content font-serif text-[18px] md:text-[20px] leading-[2.1] text-stone-800 space-y-4 text-left antialiased max-w-[65ch] mx-auto">
        {!! (str_replace('<p>&nbsp;</p>', '', $chapter->content)) !!}
    </div>

    <!-- 6. Button next, list chapter, prev (BOTTOM) -->
    <nav class="mt-12 mb-8 border-y border-outline-variant/15 py-4">
        <div class="grid grid-cols-3 gap-4 font-headline text-sm font-medium">
            @if($prevChapter)
            <a class="flex flex-col items-start gap-1 p-3 rounded-[6px] bg-white hover:bg-surface-container-low transition-all group" href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $prevChapter->order_index]) }}">
                <span class="text-secondary text-[10px] uppercase tracking-widest flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">arrow_back</span> Prev</span>
                <span class="text-on-surface group-hover:text-primary transition-colors line-clamp-1 text-xs">Ch.{{ $prevChapter->order_index }}</span>
            </a>
            @else
            <div></div>
            @endif

            <a href="javascript:void(0)" onclick="openChapterDrawer()" class="flex items-center justify-center gap-2 p-3 rounded-[6px] bg-white hover:bg-surface-container-low transition-all text-secondary hover:text-on-surface">
                <span class="material-symbols-outlined text-[20px]">menu_book</span>
                <span class="text-[10px] uppercase tracking-widest text-center hidden md:inline">List Chapter</span>
            </a>

            @if($nextChapter)
            <a class="flex flex-col items-end gap-1 p-3 rounded-[6px] bg-white hover:bg-surface-container-low transition-all text-right group" href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $nextChapter->order_index]) }}">
                <span class="text-secondary text-[10px] uppercase tracking-widest flex items-center gap-1">Next <span class="material-symbols-outlined text-[14px]">arrow_forward</span></span>
                <span class="text-on-surface group-hover:text-primary transition-colors line-clamp-1 text-xs">Ch.{{ $nextChapter->order_index }}</span>
            </a>
            @else
            <div></div>
            @endif
        </div>
    </nav>
</article>


<!-- Drawer Overlay & Container -->
<div id="chapterDrawerOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[90] opacity-0 pointer-events-none transition-opacity duration-300" onclick="closeChapterDrawer()"></div>

<div id="chapterDrawer" class="fixed top-0 right-0 h-full w-[400px] max-w-[90vw] bg-surface-container-lowest shadow-2xl z-[100] translate-x-full transition-transform duration-300 flex flex-col">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-outline-variant/20 flex items-center justify-between shrink-0 bg-surface">
        <div>
            <h3 class="font-headline font-black text-lg text-on-surface tracking-tight">{{ $story->title }}</h3>
        </div>
        <button onclick="closeChapterDrawer()" class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center text-secondary hover:text-on-surface hover:bg-surface-container-high transition-colors">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>

    <!-- Inner Content (Rendered via AJAX) -->
    <div id="chapterDrawerInner" class="flex-1 flex flex-col overflow-hidden relative">
        <div class="absolute inset-0 flex items-center justify-center text-secondary">
            <span class="material-symbols-outlined animate-spin text-4xl">progress_activity</span>
        </div>
    </div>
</div>

<script>
    const drawer = document.getElementById('chapterDrawer');
    const overlay = document.getElementById('chapterDrawerOverlay');
    const inner = document.getElementById('chapterDrawerInner');
    const storyIdentifier = '{{ $story->slug }}';

    function openChapterDrawer() {
        drawer.classList.remove('translate-x-full');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        document.body.style.overflow = 'hidden';

        // Load initially if not loaded
        if (!inner.dataset.loaded) {
            fetchDrawerContent(`/story/${storyIdentifier}/drawer-chapters`);
        }
    }

    function closeChapterDrawer() {
        drawer.classList.add('translate-x-full');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        document.body.style.overflow = '';
    }

    // Intercept clicks on links inside the inner div
    inner.addEventListener('click', function(e) {
        // Find if they clicked an pagination link
        const pagLink = e.target.closest('.drawer-pagination a');
        if (pagLink) {
            e.preventDefault();
            fetchDrawerContent(pagLink.href, true);
        }

        // Let normal chapter list links pass through to load new page
    });

    // Delegate search logic
    let searchTimeout;
    inner.addEventListener('input', function(e) {
        if (e.target.id === 'drawerSearchInput') {
            clearTimeout(searchTimeout);
            const val = e.target.value;

            searchTimeout = setTimeout(() => {
                fetchDrawerContent(`/story/${storyIdentifier}/drawer-chapters?cq=${encodeURIComponent(val)}`, true);
            }, 400); // 400ms debounce
        }
    });

    function fetchDrawerContent(url, ignoreCache = false) {
        fetch(url)
            .then(res => res.text())
            .then(html => {
                inner.innerHTML = html;
                inner.dataset.loaded = 'true';

                // Keep focus on search input if it exists
                const searchInput = document.getElementById('drawerSearchInput');
                if (searchInput && ignoreCache) {
                    searchInput.focus();
                    // Put cursor at end
                    const val = searchInput.value;
                    searchInput.value = '';
                    searchInput.value = val;
                }
            })
            .catch(err => {
                console.error("Failed to load chapters", err);
                inner.innerHTML = '<div class="p-6 text-center text-red-600">Failed to load content.</div>';
            });
    }
</script>

@endsection