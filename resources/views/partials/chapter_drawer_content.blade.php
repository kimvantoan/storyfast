<!-- Search Input -->
<div class="px-6 py-4 border-b border-outline-variant/20 bg-surface-container-lowest sticky top-0 z-10 flex gap-2">
    <input type="text" id="drawerSearchInput" class="w-full bg-surface-container-low border border-outline-variant/30 text-sm py-2 px-4 rounded-full font-headline outline-none focus:border-primary transition-colors" placeholder="Search Chapter (Ex: 1, 12, title...)" value="{{ request('cq') }}">
    <button type="button" id="drawerSearchBtn" class="bg-primary text-on-primary w-10 h-10 rounded-full flex items-center justify-center shrink-0 hover:bg-primary/90 transition-colors">
        <span class="material-symbols-outlined text-lg p_icon">search</span>
    </button>
</div>

<!-- List Chapters -->
<div class="flex-1 overflow-y-auto px-6 py-4">
    <div class="grid grid-cols-1 gap-1">
        @forelse($chapters as $ch)
        <a href="{{ route('reading.show', ['id_or_slug' => $story->slug, 'order_index' => $ch->order_index]) }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-surface-container-low transition-colors group">
            <span class="w-8 h-8 rounded bg-surface-container flex items-center justify-center font-headline font-black text-xs text-secondary group-hover:text-primary group-hover:bg-primary/10 transition-colors">{{ $ch->order_index }}</span>
            <div class="flex-1 min-w-0">
                <h4 class="font-headline font-bold text-sm text-on-surface truncate group-hover:text-primary transition-colors">{{ $ch->title }}</h4>
            </div>
            @if(request()->segment(4) == $ch->order_index)
            <span class="material-symbols-outlined text-primary text-sm">radio_button_checked</span>
            @endif
        </a>
        @empty
        <div class="text-center py-12 text-secondary font-headline text-sm flex flex-col items-center gap-2">
            <span class="material-symbols-outlined text-4xl opacity-50">menu_book</span>
            No chapters found.
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($chapters->hasPages())
    <div class="mt-6 border-t border-outline-variant/20 pt-4 drawer-pagination">
        {{ $chapters->links() }}
    </div>
    @endif
</div>
