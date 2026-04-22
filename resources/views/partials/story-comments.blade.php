@foreach($comments as $comment)
<!-- Parent Comment -->
<div class="space-y-6 md:space-y-8">
    <div class="flex gap-4 md:gap-6">
        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full overflow-hidden shrink-0 bg-surface-container-high flex items-center justify-center font-bold text-on-surface text-lg">
            {{ strtoupper(substr($comment->user->name, 0, 1)) }}
        </div>
        <div class="flex-1">
            <div class="flex items-center gap-2 md:gap-3 mb-1">
                <span class="font-bold text-sm text-on-surface line-clamp-1">{{ $comment->user->name }}</span>
                <span class="text-[10px] md:text-[11px] text-secondary font-medium uppercase tracking-wider shrink-0 whitespace-nowrap">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-sm text-secondary leading-[1.8] md:leading-relaxed mb-3 md:mb-4">{!! nl2br(e($comment->content)) !!}</p>

            <div class="flex gap-6">
                <button onclick="toggleReplyForm({{ $comment->id }})" class="text-[11px] md:text-xs font-bold text-primary hover:underline">Reply</button>
                <!-- Like button -->
                <button onclick="toggleLike(this, {{ $comment->id }})" class="flex items-center gap-1 text-[11px] md:text-xs transition-colors {{ in_array($comment->id, $likedCommentIds ?? []) ? 'text-primary' : 'text-secondary hover:text-primary' }}">
                    <span class="material-symbols-outlined text-[14px] md:text-sm" data-icon="thumb" style="font-variation-settings: 'FILL' {{ in_array($comment->id, $likedCommentIds ?? []) ? 1 : 0 }};">thumb_up</span>
                    <span data-count>{{ $comment->likes ?? 0 }}</span>
                </button>
            </div>

            <!-- Hidden Reply Form -->
            @if(auth()->check())
            <div id="reply-form-{{ $comment->id }}" class="hidden mt-4 pt-4 border-t border-outline-variant/10">
                <form action="{{ route('story.comments.store', $story->id) }}" method="POST" class="flex gap-4">
                    @csrf
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    <div class="w-8 h-8 rounded-full overflow-hidden shrink-0 bg-surface-container flex items-center justify-center font-bold text-secondary text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 relative">
                        <textarea name="content" required class="w-full bg-surface-container-lowest border border-outline-variant/30 focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none rounded-lg text-sm py-3 pl-4 pr-12 resize-none min-h-[60px]" placeholder="Write a reply..." onkeydown="if(event.key === 'Enter' && !event.shiftKey) { event.preventDefault(); this.closest('form').submit(); }"></textarea>
                        <button type="submit" class="absolute right-0 bottom-2 text-primary hover:text-on-surface transition-colors p-1">
                            <span class="material-symbols-outlined text-[20px]">send</span>
                        </button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>

    <!-- Nested Replies -->
    @if($comment->replies->count() > 0)
    <div class="ml-[40px] md:ml-[60px] border-l-2 border-outline-variant/10 pl-4 md:pl-6 space-y-6">
        @foreach($comment->replies as $reply)
        <div class="flex gap-3 md:gap-6">
            <div class="w-8 h-8 md:w-10 md:h-10 rounded-full overflow-hidden shrink-0 bg-surface-container flex items-center justify-center font-bold text-on-surface text-sm">
                {{ strtoupper(substr($reply->user->name, 0, 1)) }}
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-2 md:gap-3 mb-1">
                    <span class="font-bold text-sm text-on-surface line-clamp-1">{{ $reply->user->name }}</span>
                    <span class="text-[10px] md:text-[11px] text-secondary font-medium uppercase tracking-wider shrink-0 whitespace-nowrap">{{ $reply->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-sm text-secondary leading-[1.8] md:leading-relaxed mb-3 md:mb-4">{!! nl2br(e($reply->content)) !!}</p>
                <div class="flex gap-6">
                    <button onclick="toggleReplyForm({{ $comment->id }})" class="text-[11px] md:text-xs font-bold text-primary hover:underline">Reply</button>
                    <button onclick="toggleLike(this, {{ $reply->id }})" class="flex items-center gap-1 text-[11px] md:text-xs transition-colors {{ in_array($reply->id, $likedCommentIds ?? []) ? 'text-primary' : 'text-secondary hover:text-primary' }}">
                        <span class="material-symbols-outlined text-[14px] md:text-sm" data-icon="thumb" style="font-variation-settings: 'FILL' {{ in_array($reply->id, $likedCommentIds ?? []) ? 1 : 0 }};">thumb_up</span> <span data-count>{{ $reply->likes ?? 0 }}</span>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endforeach
