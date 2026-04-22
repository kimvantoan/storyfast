@extends('layouts.admin')

@section('title', 'Manage Chapters - ' . $story->title)

@section('content')
<div class="flex items-center gap-4 mb-6">
    <a href="{{ route('admin.stories.index') }}" class="p-2 text-stone-400 hover:text-stone-800 transition-colors bg-stone-100 rounded-full hover:bg-stone-200 flex items-center">
        <span class="material-symbols-outlined text-[20px]">arrow_back</span>
    </a>
    <div>
        <h1 class="font-headline font-black text-3xl tracking-tighter text-on-surface mb-1">Manage Chapters</h1>
        <p class="text-sm font-body text-stone-500 font-medium">Story: <span class="font-bold text-stone-700">{{ $story->title }}</span></p>
    </div>
    <div class="ml-auto">
        <a href="{{ route('admin.chapters.create', $story) }}" class="btn-glow text-white px-5 py-2 rounded shadow-sm font-headline font-bold text-sm transition-all hover:opacity-90 flex items-center gap-2 h-[40px]">
            <span class="material-symbols-outlined text-[18px]">add</span>
            Add Chapter
        </a>
    </div>
</div>

@if(session('success'))
<div id="toast-success" class="bg-green-50 text-green-700 px-4 py-3 rounded mb-6 flex items-center gap-3 border border-green-100 shadow-sm transition-opacity duration-300">
    <span class="material-symbols-outlined text-green-500">check_circle</span>
    <p class="font-body text-sm font-medium">{{ session('success') }}</p>
</div>
@endif

<div class="mb-6 flex justify-end">
    <form action="{{ route('admin.chapters.index', $story) }}" method="GET" class="flex gap-2 w-full md:w-auto">
        <select name="publish" class="w-full md:w-64 bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] rounded outline-none cursor-pointer shadow-sm h-[40px]" onchange="this.form.submit()">
            <option value="">All Publish Status</option>
            <option value="published" {{ request('publish') == 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft" {{ request('publish') == 'draft' ? 'selected' : '' }}>Draft / Hidden</option>
        </select>
    </form>
</div>
<div class="bg-white rounded-xl overflow-hidden shadow-sm border border-stone-100">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-stone-50">
                <th class="px-6 py-4 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary w-16">#</th>
                <th class="px-6 py-4 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Chapter Title</th>
                <th class="px-6 py-4 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Words</th>
                <th class="px-6 py-4 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary text-center">Publish</th>
                <th class="px-6 py-4 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Last Updated</th>
                <th class="px-6 py-4 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @forelse($chapters as $chapter)
            <tr class="bg-white hover:bg-stone-50 transition-colors group">
                <td class="px-6 py-4 border-l-4 border-transparent group-hover:border-[#a53600]">
                    <span class="font-headline font-black text-xs text-stone-400">{{ $chapter->order_index }}</span>
                </td>
                <td class="px-6 py-4">
                    <p class="font-headline font-bold text-on-surface text-sm">{{ $chapter->title }}</p>
                    <div class="text-[10px] text-stone-400 font-medium uppercase tracking-widest mt-1 flex items-center gap-2">
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[13px]">visibility</span>
                            {{ number_format($chapter->views) }}
                        </span>
                        @if(auth()->user()->role === 'author')
                        @if($chapter->status === 'draft')
                        <span class="text-stone-600 bg-stone-100 px-1.5 py-0.5 rounded-sm font-black text-[8px] border border-stone-200 leading-none">DRAFT</span>
                        @elseif($chapter->is_approved)
                        <span class="text-green-600 bg-green-50 px-1.5 py-0.5 rounded-sm font-black text-[8px] border border-green-100 leading-none">APPROVED</span>
                        @else
                        <span class="text-yellow-600 bg-yellow-50 px-1.5 py-0.5 rounded-sm font-black text-[8px] border border-yellow-100 leading-none">PENDING</span>
                        @endif
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs text-secondary">{{ number_format(str_word_count(strip_tags($chapter->content))) }} <span class="text-[10px]">words</span></span>
                </td>
                <td class="px-6 py-4 text-center">
                    <form action="{{ route('admin.chapters.togglePublish', $chapter) }}" method="POST" class="m-0 inline-block">
                        @csrf
                        @method('PATCH')
                        <label class="relative inline-flex items-center cursor-pointer" title="{{ $chapter->status === 'published' ? 'Unpublish' : 'Publish' }}">
                            <input type="checkbox" class="sr-only peer" onchange="this.form.submit()" {{ $chapter->status === 'published' ? 'checked' : '' }}>
                            <div class="w-8 h-4 bg-stone-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[16px] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-stone-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-green-500"></div>
                        </label>
                    </form>
                </td>
                <td class="px-6 py-4">
                    <span class="text-xs text-secondary">{{ $chapter->updated_at->format('M d, Y h:ia') }}</span>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="flex justify-end gap-1">
                        <a href="{{ route('reading.show', ['id_or_slug' => $story->id, 'order_index' => $chapter->order_index]) }}" target="_blank" class="p-1.5 hover:bg-white rounded-sm text-stone-400 hover:text-green-600 transition-all font-bold" title="Read Chapter">
                            <span class="material-symbols-outlined text-sm">menu_book</span>
                        </a>
                        <a href="{{ route('admin.chapters.edit', $chapter) }}" class="p-1.5 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all" title="Edit Chapter">
                            <span class="material-symbols-outlined text-sm">edit</span>
                        </a>
                        <form action="{{ route('admin.chapters.destroy', $chapter) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this chapter?');" class="inline m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1.5 hover:bg-white rounded-sm text-stone-400 hover:text-error transition-all">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-stone-500 font-body text-sm bg-stone-50/50">
                    <span class="material-symbols-outlined text-4xl text-stone-300 mb-2 block">menu_book</span>
                    No chapters have been added yet
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast-success');
        if (toast) {
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }
    });
</script>
@endsection