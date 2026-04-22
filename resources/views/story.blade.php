@extends('layouts.app')

@section('title', '- ' . $story->title)
@section('meta_title', $story->title . ' by ' . $story->author . ' | OnlineFreeNovels')
@section('meta_description', Str::limit(strip_tags($story->description), 160))
@section('meta_image', $story->cover_image ? url(Storage::url($story->cover_image)) : asset('storyfast-icon.svg'))
@section('meta_type', 'book')

@section('structured_data')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Book",
  "name": "{{ $story->title }}",
  "author": {
    "@@type": "Person",
    "name": "{{ $story->author }}"
  },
  "url": "{{ request()->url() }}",
  "image": "{{ $story->cover_image ? url(Storage::url($story->cover_image)) : asset('storyfast-icon.svg') }}",
  "inLanguage": "vi",
  "genre": "{{ $story->categories->pluck('name')->join(', ') }}",
  "numberOfPages": {{ $story->chapters->count() }}
  @if($story->rating_score && $story->rating_count)
  ,"aggregateRating": {
    "@@type": "AggregateRating",
    "ratingValue": "{{ number_format($story->rating_score, 1) }}",
    "reviewCount": "{{ $story->rating_count }}",
    "bestRating": "5",
    "worstRating": "1"
  }
  @endif
}
</script>
@endsection

@section('content')
<div class="max-w-[1440px] mx-auto px-6 md:px-12 py-12 grid grid-cols-1 xl:grid-cols-[1fr_320px] gap-8 md:gap-12 items-start">
    <!-- Left Column: Main Content -->
    <div class="w-full min-w-0">
        <!-- Above the Fold: Story Header Section -->
    <section class="flex flex-col md:flex-row gap-12 mb-24">
        <!-- Left Column: Cover & Main Actions -->
        <div class="w-full md:w-[240px] shrink-0">
            <div class="aspect-[3/4] w-full bg-surface-container overflow-hidden rounded-lg">
                @if($story->cover_image)
                <img class="w-full h-full object-cover" alt="{{ $story->title }} Cover" src="{{ Storage::url($story->cover_image) }}" />
                @else
                <div class="w-full h-full object-cover bg-stone-200 flex items-center justify-center text-stone-400">No Cover</div>
                @endif
            </div>
            <div class="mt-8 flex flex-col gap-3">
                @if($story->chapters->count() > 0)
                <a href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $story->chapters->first()->order_index]) }}" class="w-full py-4 bg-on-surface text-surface text-[12px] font-bold tracking-widest text-center uppercase rounded-[6px] hover:bg-[#111] active:scale-[0.98] transition-all duration-300 border border-transparent block">
                    Read First Chapter
                </a>
                <a href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $story->chapters->last()->order_index]) }}" class="w-full py-4 bg-surface-container-lowest border border-outline-variant/30 text-on-surface text-[12px] font-bold text-center tracking-widest uppercase rounded-[6px] hover:bg-surface-container-low active:scale-[0.98] transition-all duration-300 block">
                    Latest Chapter
                </a>
                @else
                <button disabled="disabled" class="w-full py-4 bg-stone-100 text-stone-400 text-sm font-bold tracking-widest uppercase rounded-[6px] cursor-not-allowed border border-transparent block">
                    No Chapters Yet
                </button>
                @endif
            </div>
        </div>
        <!-- Right Column: Story Metadata & Actions -->
        <div class="flex-1 flex flex-col">
            <div class="mb-2">
                <h1 class="text-4xl md:text-5xl font-black font-headline text-on-surface tracking-tighter mb-4 leading-tight uppercase">{{ $story->title }}</h1>
                <div class="flex items-center gap-2 mb-6">
                    <span class="text-secondary text-sm font-medium">Author:</span>
                    <span class="text-primary font-semibold text-sm">{{ $story->author }}</span>
                </div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-6 gap-x-8 mb-8 border-y border-outline-variant/15 py-6">
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Genre</div>
                    <div class="text-sm font-semibold text-on-surface">
                        {{ $story->categories->pluck('name')->join(', ') ?: 'Uncategorized' }}
                    </div>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Status</div>
                    <div class="text-sm font-semibold text-primary capitalize">{{ $story->status }}</div>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Chapters</div>
                    <div class="text-sm font-semibold text-on-surface">{{ number_format($story->chapters->count()) }}</div>
                </div>
                <div>
                    <div class="text-[11px] uppercase tracking-widest text-secondary mb-1">Reads</div>
                    <div class="text-sm font-semibold text-on-surface">{{ number_format($story->views) }}</div>
                </div>
            </div>
            <div class="flex items-center gap-4 mb-8">
                <div class="flex text-primary">
                    @php
                    $score = $story->rating_score ?? 0;
                    $fullStars = floor($score);
                    $hasHalfStar = ($score - $fullStars) >= 0.5;
                    $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);
                    @endphp
                    @for($i = 0; $i < $fullStars; $i++)
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
                        @endfor
                        @if($hasHalfStar)
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star_half</span>
                        @endif
                        @for($i = 0; $i < $emptyStars; $i++)
                            <span class="material-symbols-outlined">star</span>
                            @endfor
                </div>
                <span class="text-lg font-bold text-on-surface">{{ number_format($story->rating_score ?? 0, 1) }}</span>
                <span class="text-secondary text-sm">({{ number_format($story->rating_count ?? 0) }} ratings)</span>
            </div>
            <div class="mb-10 max-w-[720px]">
                <div class="relative">
                    <p id="storyDescription" class="text-secondary leading-[1.9] font-body text-base line-clamp-4 transition-all duration-300 overflow-hidden">
                        {!! nl2br(e($story->description)) !!}
                    </p>
                    <div id="descOverlay" class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-surface to-transparent pointer-events-none"></div>
                </div>
                <button id="btnReadMore" onclick="toggleDescription()" class="mt-2 text-primary text-[11px] font-bold tracking-widest uppercase hover:underline flex items-center gap-1 group hidden">
                    <span id="readMoreText">Read More</span>
                </button>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    requestAnimationFrame(() => {
                        const desc = document.getElementById('storyDescription');
                        const btn = document.getElementById('btnReadMore');
                        const overlay = document.getElementById('descOverlay');

                        // Check if text is truncated
                        if (desc.scrollHeight > desc.clientHeight) {
                            btn.classList.remove('hidden');
                        } else {
                            overlay.classList.add('hidden');
                        }
                    });
                });

                function toggleDescription() {
                    const desc = document.getElementById('storyDescription');
                    const btnText = document.getElementById('readMoreText');
                    const overlay = document.getElementById('descOverlay');

                    desc.classList.toggle('line-clamp-4');

                    if (desc.classList.contains('line-clamp-4')) {
                        if (btnText) btnText.innerText = 'Read More';
                        if (overlay) overlay.classList.remove('hidden');
                    } else {
                        if (btnText) btnText.innerText = 'Show Less';
                        if (overlay) overlay.classList.add('hidden');
                    }
                }
            </script>
            <div class="mt-auto flex flex-wrap gap-4">
                <div class="relative">
                    <button id="btnRate" class="flex items-center gap-2 px-6 py-3 bg-surface-container-low text-on-surface rounded-full text-sm font-semibold hover:bg-surface-container-high border border-outline-variant/10 transition-colors">
                        <span class="material-symbols-outlined text-xl">star_rate</span>
                        Rate
                    </button>

                    <!-- Rate Popover -->
                    <div id="ratePopover" class="hidden absolute left-0 bottom-full mb-3 bg-surface border border-outline-variant/20 shadow-xl rounded-xl p-5 z-20 w-[240px]">
                        @if(auth()->check())
                        @if(isset($userRating) && $userRating)
                        <h4 class="text-sm font-bold text-center text-on-surface mb-3">Your Rating</h4>
                        <div class="flex justify-center text-primary">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' {{ $i <= $userRating->rating ? 1 : 0 }};">star</span>
                                @endfor
                        </div>
                        <div class="text-xs text-center font-bold text-secondary mt-2">You rated {{ $userRating->rating }} stars</div>
                        @else
                        <h4 class="text-sm font-bold text-center text-on-surface mb-3">Rate this story</h4>
                        <div class="flex justify-center text-primary cursor-pointer rating-container" id="interactiveRating" data-url="{{ route('story.rate', $story->id) }}" data-csrf="{{ csrf_token() }}">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="material-symbols-outlined interactive-star transition-transform text-3xl" data-value="{{ $i }}" style="font-variation-settings: 'FILL' 0;">star</span>
                                @endfor
                        </div>
                        <div id="rateStatus" class="text-xs text-center font-bold text-primary opacity-0 transition-opacity mt-2">Rated successfully!</div>
                        @endif
                        @else
                        <div class="text-center">
                            <span class="material-symbols-outlined text-3xl text-secondary/30 mb-2">lock</span>
                            <p class="text-xs font-medium text-secondary mb-4">Please log in to rate this story.</p>
                            <a href="{{ route('login.google') }}" class="flex items-center justify-center gap-2 px-3 py-2 bg-white border border-outline-variant/30 text-on-surface hover:bg-surface-container-lowest transition-colors shadow-sm rounded border-stone-200">
                                <svg class="h-4 w-4" aria-hidden="true" viewBox="0 0 24 24">
                                    <path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335"></path>
                                    <path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4"></path>
                                    <path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05"></path>
                                    <path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.26538 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853"></path>
                                </svg>
                                <span class="text-xs font-bold">Login to Rate</span>
                            </a>
                        </div>
                        @endif
                        <!-- Arrow down -->
                        <div class="absolute -bottom-2 left-10 w-4 h-4 bg-surface border-b border-r border-outline-variant/20 transform rotate-45"></div>
                    </div>
                </div>

                <button class="flex items-center gap-2 px-6 py-3 bg-surface-container-low text-on-surface rounded-full text-sm font-semibold hover:bg-surface-container-high border border-outline-variant/10 transition-colors">
                    <span class="material-symbols-outlined text-xl">share</span>
                    Share
                </button>
            </div>
        </div>
    </section>

    <!-- Rating Script -->
    @if(auth()->check())
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnRate = document.getElementById('btnRate');
            const popover = document.getElementById('ratePopover');
            const stars = document.querySelectorAll('.interactive-star');
            const mainScoreDisplay = document.getElementById('ratingScoreDisplay');
            const mainCountDisplay = document.getElementById('ratingCountDisplay');
            const statusText = document.getElementById('rateStatus');
            const container = document.getElementById('interactiveRating');

            // Toggle popover
            btnRate.addEventListener('click', (e) => {
                e.stopPropagation();
                popover.classList.toggle('hidden');
            });

            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (!popover.contains(e.target) && !btnRate.contains(e.target)) {
                    popover.classList.add('hidden');
                }
            });

            // Star hover effects
            stars.forEach((star, index) => {
                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        s.style.fontVariationSettings = i <= index ? "'FILL' 1" : "'FILL' 0";
                        s.style.transform = i <= index ? "scale(1.15)" : "scale(1)";
                    });
                });

                star.addEventListener('mouseout', () => {
                    stars.forEach((s) => {
                        s.style.fontVariationSettings = "'FILL' 0";
                        s.style.transform = "scale(1)";
                    });
                });

                star.addEventListener('click', () => {
                    const value = star.dataset.value;
                    const url = container.dataset.url;
                    const csrf = container.dataset.csrf;

                    stars.forEach(s => s.classList.add('opacity-50', 'pointer-events-none'));

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrf,
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                rating: value
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            stars.forEach(s => s.classList.remove('opacity-50', 'pointer-events-none'));
                            if (data.success) {
                                // Update main display
                                if (mainScoreDisplay) mainScoreDisplay.innerText = Number(data.rating_score).toFixed(1);
                                if (mainCountDisplay) mainCountDisplay.innerText = '(' + Number(data.rating_count).toLocaleString() + ' ratings)';

                                // Show success
                                statusText.style.opacity = 1;
                                setTimeout(() => {
                                    statusText.style.opacity = 0;
                                    popover.classList.add('hidden'); // auto close 
                                }, 1500);
                            }
                        });
                });
            });
        });
    </script>
    @else
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btnRate = document.getElementById('btnRate');
            const popover = document.getElementById('ratePopover');
            btnRate.addEventListener('click', (e) => {
                e.stopPropagation();
                popover.classList.toggle('hidden');
            });
            document.addEventListener('click', (e) => {
                if (!popover.contains(e.target) && !btnRate.contains(e.target)) {
                    popover.classList.add('hidden');
                }
            });
        });
    </script>
    @endif

    <!-- Chapter List Section -->
    <!-- Chapter List Section -->
    <section class="max-w-[1024px] mx-auto mb-24 relative px-6 md:px-0">
        <div class="bg-surface border border-outline-variant/20 rounded-[6px] shadow-sm flex flex-col max-h-[600px]">

            <!-- Search Header -->
            <form action="{{ url()->current() }}" method="GET" class="px-6 pt-6 pb-4 shrink-0 rounded-t-[6px] bg-surface m-0 border-b border-outline-variant/10" id="chapterSearchForm">
                <div class="relative w-full text-secondary focus-within:text-on-surface transition-colors">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-[20px] pointer-events-none">search</span>
                    <input name="cq" value="{{ request('cq') }}" class="w-full bg-surface-container-lowest border border-outline-variant/40 hover:border-outline-variant/80 focus:outline-none focus:ring-0 focus:border-outline-variant/80 text-sm font-headline placeholder:text-secondary/60 py-3 pl-12 pr-4 text-on-surface transition-all rounded-[6px] shadow-sm" placeholder="Search by chapter number or title" type="text" onchange="document.getElementById('chapterSearchForm').submit()" />
                </div>
            </form>

            <!-- List Body -->
            <div class="flex-1 overflow-y-auto p-4 space-y-2 relative" style="scrollbar-width: thin;">
                @forelse($chapters as $chapter)
                <a href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $chapter->order_index]) }}" class="flex items-center gap-5 w-full bg-surface-container-lowest px-4 py-3 hover:bg-surface-container-low transition-colors border border-outline-variant/10 rounded-[4px]">
                    <span class="w-8 h-8 flex items-center justify-center shrink-0 bg-surface border border-outline-variant/20 text-on-surface font-headline font-bold text-xs">{{ $chapter->order_index }}</span>
                    <span class="text-sm font-headline font-semibold text-on-surface line-clamp-1 flex-1">{{ $chapter->title }}</span>
                </a>
                @empty
                <div class="text-center py-12 text-sm text-secondary font-body">No chapters available.</div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="border-t border-outline-variant/20 bg-surface-container-lowest px-4 py-4 flex justify-center rounded-b-[6px] shrink-0">
                @if($chapters->hasPages())
                <div class="flex items-center gap-1.5 flex-wrap justify-center">
                    @if(!$chapters->onFirstPage())
                    <a href="{{ $chapters->url(1) }}" class="px-4 h-9 flex items-center justify-center bg-surface border border-outline-variant/20 text-secondary text-sm font-headline hover:bg-surface-container-high hover:text-on-surface transition-colors rounded-[4px]">First</a>
                    <a href="{{ $chapters->previousPageUrl() }}" class="w-9 h-9 flex items-center justify-center bg-surface border border-outline-variant/20 text-secondary text-sm font-headline hover:bg-surface-container-high hover:text-on-surface transition-colors rounded-[4px]">
                        <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                    </a>
                    @endif

                    @php
                    $start = max(1, $chapters->currentPage() - 2);
                    $end = min($start + 4, $chapters->lastPage());
                    if ($end - $start < 4) {
                        $start=max(1, $end - 4);
                        }
                        @endphp
                        @for($i=$start; $i <=$end; $i++)
                        @if($i==$chapters->currentPage())
                        <span class="w-9 h-9 flex items-center justify-center bg-primary text-on-primary text-sm font-headline font-bold rounded-[4px] border border-primary">{{ $i }}</span>
                        @else
                        <a href="{{ $chapters->url($i) }}" class="w-9 h-9 flex items-center justify-center bg-surface border border-outline-variant/20 text-secondary text-sm font-headline hover:bg-surface-container-high hover:text-on-surface transition-colors rounded-[4px]">{{ $i }}</a>
                        @endif
                        @endfor

                        @if($chapters->hasMorePages())
                        <a href="{{ $chapters->nextPageUrl() }}" class="w-9 h-9 flex items-center justify-center bg-surface border border-outline-variant/20 text-secondary text-sm font-headline hover:bg-surface-container-high hover:text-on-surface transition-colors rounded-[4px]">
                            <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                        </a>
                        <a href="{{ $chapters->url($chapters->lastPage()) }}" class="px-4 h-9 flex items-center justify-center bg-surface border border-outline-variant/20 text-secondary text-sm font-headline hover:bg-surface-container-high hover:text-on-surface transition-colors rounded-[4px]">Last</a>
                        @endif
                </div>
                @endif
            </div>

        </div>
    </section>

    <!-- Comments Section -->
    <section class="max-w-[840px] mx-auto md:mx-0 mt-8" id="comments">
        <div class="flex gap-12 mb-10 border-b border-outline-variant/15">
            <button class="pb-4 text-sm font-bold tracking-widest text-primary border-b-2 border-primary uppercase">COMMENTS ({{ number_format($story->comment_count) }})</button>
        </div>

        <!-- Session Messages -->
        @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-[#e8f5e9] text-[#2e7d32] rounded-[4px] border border-[#a5d6a7] text-sm font-medium">
            {{ session('success') }}
        </div>
        @endif
        @if($errors->any())
        <div class="mb-6 px-4 py-3 bg-[#ffebee] text-[#c62828] rounded-[4px] border border-[#ef9a9a] text-sm font-medium">
            {{ $errors->first() }}
        </div>
        @endif

        <!-- Main Comment Form -->
        <div class="flex gap-4 md:gap-6 mb-16">
            <div class="w-10 h-10 md:w-12 md:h-12 rounded-full overflow-hidden shrink-0 bg-surface-container-high flex items-center justify-center font-bold text-secondary text-lg">
                @if(auth()->check())
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                @else
                <span class="material-symbols-outlined text-stone-400">person</span>
                @endif
            </div>
            <div class="flex-1">
                @if(auth()->check())
                <form action="{{ route('story.comments.store', $story->id) }}" method="POST" class="relative">
                    @csrf
                    <textarea name="content" required class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none rounded-lg text-sm p-4 pr-14 pb-12 resize-none min-h-[100px] transition-all scrollbar-hide" placeholder="Share your thoughts about this story..." onkeydown="if(event.key === 'Enter' && !event.shiftKey) { event.preventDefault(); this.closest('form').submit(); }"></textarea>
                    <button type="submit" class="absolute right-2 bottom-3 text-primary hover:text-on-surface transition-colors p-2" title="Post Comment">
                        <span class="material-symbols-outlined text-[24px]">send</span>
                    </button>
                </form>
                @else
                <div class="w-full bg-surface-container-lowest border border-outline-variant/30 py-6 px-6 text-sm text-secondary/80 cursor-text min-h-[100px] flex flex-col justify-center gap-4 items-center text-center rounded-lg shadow-sm">
                    <span class="font-medium text-base">You must be logged in to post a comment.</span>
                    <a href="{{ route('login.google') }}" class="flex items-center gap-3 px-6 py-3 bg-white border border-outline-variant/30 text-on-surface hover:bg-surface-container-low transition-all shadow-sm rounded-[6px] font-semibold text-sm active:scale-95 group">
                        <svg class="h-5 w-5 group-hover:scale-110 transition-transform" aria-hidden="true" viewBox="0 0 24 24">
                            <path d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z" fill="#EA4335"></path>
                            <path d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z" fill="#4285F4"></path>
                            <path d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z" fill="#FBBC05"></path>
                            <path d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.26538 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z" fill="#34A853"></path>
                        </svg>
                        Login with Google
                    </a>
                </div>
                @endif
            </div>
        </div>

        <!-- Comments List -->
        <div id="commentsList" class="space-y-12">
            @if($comments->count() > 0)
                @include('partials.story-comments', ['comments' => $comments])
            @else
            <div class="text-center py-10" id="emptyCommentsPlaceholder">
                <span class="material-symbols-outlined text-4xl text-outline-variant/50 mb-2">forum</span>
                <p class="text-sm font-semibold text-secondary">No comments yet. Be the first to share your thoughts!</p>
            </div>
            @endif
        </div>

        <script>
            function toggleReplyForm(id) {
                const form = document.getElementById('reply-form-' + id);
                if (form) {
                    form.classList.toggle('hidden');
                    if (!form.classList.contains('hidden')) {
                        form.querySelector('textarea').focus();
                    }
                } else {
                    if (confirm('You must log in to reply. Do you want to log in with Google now?')) {
                        window.location.href = '{{ route("login.google") }}';
                    }
                }
            }

            function toggleLike(btn, commentId) {
                @if(auth()->check())
                btn.classList.add('opacity-50', 'pointer-events-none');
                fetch(`/comments/${commentId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    btn.classList.remove('opacity-50', 'pointer-events-none');
                    if (data.success) {
                        const icon = btn.querySelector('[data-icon="thumb"]');
                        const count = btn.querySelector('[data-count]');
                        
                        count.innerText = data.likes_count;
                        if (data.liked) {
                            btn.classList.remove('text-secondary', 'hover:text-primary');
                            btn.classList.add('text-primary');
                            icon.style.fontVariationSettings = "'FILL' 1";
                        } else {
                            btn.classList.add('text-secondary', 'hover:text-primary');
                            btn.classList.remove('text-primary');
                            icon.style.fontVariationSettings = "'FILL' 0";
                        }
                    }
                })
                .catch(err => {
                    btn.classList.remove('opacity-50', 'pointer-events-none');
                    console.error(err);
                });
                @else
                if (confirm('You must log in to like a comment. Do you want to log in with Google now?')) {
                    window.location.href = '{{ route("login.google") }}';
                }
                @endif
            }
        </script>

        <!-- Comments Pagination (AJAX Load More) -->
        @if($comments->hasPages())
        <div class="mt-16 flex justify-center" id="loadMoreContainer">
            <button id="btnLoadMore" onclick="loadMoreComments(this)" data-page="2" class="px-8 py-3 bg-surface border border-outline-variant/30 text-on-surface text-xs font-bold tracking-widest uppercase rounded-full hover:bg-surface-container-high transition-all focus:outline-none">
                Load More Comments
            </button>
        </div>
        @endif
        
        <script>
            function loadMoreComments(btn) {
                const page = btn.dataset.page;
                const originalText = btn.innerText;
                btn.innerText = 'Loading...';
                btn.classList.add('opacity-50', 'pointer-events-none');

                fetch(`?comment_page=${page}`, {
                    headers: {
                        'X-Load-More-Comments': 'true',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('commentsList');
                    container.insertAdjacentHTML('beforeend', data.html);

                    if (data.has_more) {
                        btn.dataset.page = data.next_page;
                        btn.innerText = originalText;
                        btn.classList.remove('opacity-50', 'pointer-events-none');
                    } else {
                        document.getElementById('loadMoreContainer').remove();
                    }
                })
                .catch(err => {
                    console.error('Error loading comments:', err);
                    btn.innerText = originalText;
                    btn.classList.remove('opacity-50', 'pointer-events-none');
                });
            }
        </script>
    </section>
    </div> <!-- Close Left Column -->

    <!-- Right Column: Related Stories Sidebar -->
    <aside class="w-full flex flex-col gap-6 sticky top-24">
        <h3 class="text-base font-bold tracking-widest text-on-surface uppercase border-b-2 border-primary pb-3 inline-flex w-fit">Related Stories</h3>
        <div class="flex flex-col gap-5">
            @forelse($relatedStories as $related)
            <a href="{{ route('story.show', $related->slug) }}" class="flex gap-4 group bg-surface-container-lowest p-2 rounded-lg hover:shadow-md border border-outline-variant/10 transition-all">
                <div class="w-[72px] aspect-[3/4] bg-surface-container rounded-md overflow-hidden shrink-0">
                    @if($related->cover_image)
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $related->title }}" src="{{ Storage::url($related->cover_image) }}">
                    @else
                    <div class="w-full h-full bg-stone-200 flex items-center justify-center text-stone-400">
                        <span class="material-symbols-outlined text-sm">image</span>
                    </div>
                    @endif
                </div>
                <div class="flex-1 flex flex-col py-1 pr-1">
                    <h4 class="text-sm font-bold text-on-surface line-clamp-2 leading-snug group-hover:text-primary transition-colors">{{ $related->title }}</h4>
                    <span class="text-xs font-medium text-secondary mt-1.5 line-clamp-1">{{ $related->author }}</span>
                    <div class="flex items-center gap-3 mt-auto text-[11px] text-secondary font-medium">
                        <div class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">visibility</span> {{ number_format($related->views) }}</div>
                        <div class="flex items-center gap-1 text-primary"><span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span> {{ number_format($related->rating_score ?? 0, 1) }}</div>
                    </div>
                </div>
            </a>
            @empty
            <div class="text-sm text-secondary bg-surface border border-outline-variant/10 rounded-lg p-6 text-center">No recommendations yet.</div>
            @endforelse
        </div>
    </aside>
</div>
@endsection