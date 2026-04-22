@extends('layouts.admin')

@section('title', 'Pending Approvals')

@section('content')

@if(session('success'))
<div id="toast-success" class="mb-6 p-4 bg-green-50 text-[#a53600] font-headline font-bold text-sm rounded shadow-sm border border-green-100 flex items-center gap-3 transition-opacity duration-500">
    <span class="material-symbols-outlined">check_circle</span>
    {{ session('success') }}
</div>
@endif

<!-- Header Section -->
<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-black font-headline tracking-tighter leading-none text-on-surface">Pending Approvals</h1>
</div>

<!-- Tabs -->
<div class="flex gap-4 mb-4 border-b border-outline-variant/20">
    <a href="{{ route('admin.pending.index') }}" class="px-6 py-3 font-headline font-bold text-sm uppercase tracking-widest transition-colors {{ $type === 'stories' ? 'border-b-2 border-primary text-primary' : 'text-secondary hover:text-on-surface' }}">
        New Stories
    </a>
    <a href="{{ route('admin.pending.chapters.index') }}" class="px-6 py-3 font-headline font-bold text-sm uppercase tracking-widest transition-colors {{ $type === 'chapters' ? 'border-b-2 border-primary text-primary' : 'text-secondary hover:text-on-surface' }}">
        New Chapters
    </a>
</div>

<!-- Filter Bar Section -->
<section class="bg-surface-container-low p-1 rounded-sm mb-8 flex flex-col md:flex-row gap-4 items-center">
    <form action="{{ $type === 'chapters' ? route('admin.pending.chapters.index') : route('admin.pending.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-2 w-full max-w-lg">
        <!-- Search Field -->
        <div class="relative group">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="SEARCH..." class="w-full bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] outline-none h-[40px]">
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">search</span>
        </div>
        <!-- CTA Filter Action -->
        <button type="submit" class="bg-[#1c1b1b] text-white py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider hover:bg-stone-800 transition-colors flex items-center justify-center gap-2 h-[40px]">
            <span class="material-symbols-outlined text-sm">filter_alt</span>
            Apply Filters
        </button>
    </form>
</section>

<!-- Table Section -->
<div class="bg-white overflow-hidden shadow-sm">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-stone-100">
                @if($type === 'stories')
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Cover</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Story Title</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Author</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Genre</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-right">Actions</th>
                @else
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Story Info</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Chapter Info</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Status</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-right">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @if($type === 'stories')
                @forelse($stories as $story)
                <tr class="hover:bg-stone-50 transition-colors group">
                    <td class="px-4 py-3">
                        <div class="w-9 h-12 bg-stone-200 rounded-sm overflow-hidden flex-shrink-0">
                            @if($story->cover_image)
                            <img alt="Book Cover" class="w-full h-full object-cover" src="{{ Storage::url($story->cover_image) }}" />
                            @else
                            <div class="w-full h-full flex items-center justify-center text-stone-400 text-[9px]">No Cover</div>
                            @endif
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="font-bold text-sm font-headline tracking-tight group-hover:text-primary transition-colors max-w-[200px] truncate">{{ $story->title }}</div>
                        <div class="text-[10px] text-stone-400 font-label">ID: {{ str_pad($story->id, 4, '0', STR_PAD_LEFT) }}</div>
                    </td>
                    <td class="px-4 py-3 font-body text-xs max-w-[150px] truncate">{{ $story->author }}</td>
                    <td class="px-4 py-3">
                        <div class="flex flex-wrap gap-1 max-w-[150px]">
                            @foreach($story->categories as $category)
                            <span class="text-[9px] font-bold font-headline uppercase bg-stone-100 text-stone-600 px-2 py-1 rounded-sm">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-4 py-3 text-right w-[200px]">
                        <div class="flex justify-end gap-1 items-center">
                            <a href="{{ route('story.show', $story->id) }}" target="_blank" class="px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 rounded-sm text-xs font-bold font-headline transition-colors">
                                Review
                            </a>

                            <form action="{{ route('admin.pending.approve', $story) }}" method="POST" class="inline ml-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1.5 bg-green-50 text-green-600 hover:bg-green-100 hover:text-green-700 rounded-sm text-xs font-bold font-headline transition-colors">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Are you sure you want to reject/delete this story?');" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 rounded-sm text-xs font-bold font-headline transition-colors">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-stone-500 font-body">No pending stories found.</td>
                </tr>
                @endforelse
            @else
                @forelse($chapters as $chapter)
                <tr class="hover:bg-stone-50 transition-colors group">
                    <td class="px-4 py-3">
                        <div class="font-bold text-sm font-headline tracking-tight group-hover:text-primary transition-colors max-w-[200px] truncate">{{ $chapter->story->title }}</div>
                        <div class="text-[10px] text-stone-400 font-label">Author: {{ $chapter->story->author }}</div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="font-bold text-sm font-headline tracking-tight text-on-surface max-w-[250px] truncate">Chapter {{ $chapter->order_index }}: {{ $chapter->title }}</div>
                        <div class="text-[10px] text-stone-400 font-label">Words: {{ number_format(str_word_count(strip_tags($chapter->content))) }}</div>
                    </td>
                    <td class="px-4 py-3 font-body text-xs">
                        <span class="px-2 py-1 text-[10px] font-bold tracking-widest uppercase rounded-sm bg-yellow-100 text-yellow-800">Pending Review</span>
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex justify-end gap-1 items-center">
                            <a href="{{ route('reading.show', ['id_or_slug' => $chapter->story->id, 'order_index' => $chapter->order_index]) }}" target="_blank" class="px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 rounded-sm text-xs font-bold font-headline transition-colors">
                                Review
                            </a>

                            <form action="{{ route('admin.pending.chapters.approve', $chapter) }}" method="POST" class="inline ml-1">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="px-3 py-1.5 bg-green-50 text-green-600 hover:bg-green-100 hover:text-green-700 rounded-sm text-xs font-bold font-headline transition-colors">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.pending.chapters.reject', $chapter) }}" method="POST" onsubmit="return confirm('Are you sure you want to reject/delete this chapter?');" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1.5 bg-red-50 text-red-600 hover:bg-red-100 hover:text-red-700 rounded-sm text-xs font-bold font-headline transition-colors">
                                    Reject
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center text-stone-500 font-body">No pending chapters found.</td>
                </tr>
                @endforelse
            @endif
        </tbody>
    </table>
</div>

<!-- Pagination Section -->
<div class="mt-8 relative z-0">
    @if($type === 'stories')
        {{ $stories->links() }}
    @else
        {{ $chapters->links() }}
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast-success');
        if (toast) {
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 5000);
        }
    });
</script>
@endsection
