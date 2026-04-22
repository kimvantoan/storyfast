@extends('layouts.admin')

@section('title', 'Manage Stories')

@section('content')

@if(session('success'))
<div id="toast-success" class="mb-6 p-4 bg-green-50 text-[#a53600] font-headline font-bold text-sm rounded shadow-sm border border-green-100 flex items-center gap-3 transition-opacity duration-500">
    <span class="material-symbols-outlined">check_circle</span>
    {{ session('success') }}
</div>
@endif

<!-- Header Section -->
<div class="mb-8 flex justify-between items-center">
    <h1 class="text-3xl font-black font-headline tracking-tighter leading-none text-on-surface">Manage Stories</h1>
    <button id="btnAddStory" class="btn-glow text-white px-5 py-2 rounded font-headline font-bold text-sm transition-all hover:opacity-90 flex items-center gap-2 shadow-sm h-[40px]">
        <span class="material-symbols-outlined text-[18px]" data-icon="add">add</span>
        Add Story
    </button>
</div>

<!-- Filter Bar Section -->
<section class="bg-surface-container-low p-1 rounded-sm mb-8 flex flex-col md:flex-row gap-4 items-center">
    <form action="{{ route('admin.stories.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-6 gap-2 w-full">
        <!-- Search Field -->
        <div class="relative group">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="SEARCH..." class="w-full bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] outline-none h-[40px]">
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">search</span>
        </div>
        <!-- Genre Dropdown -->
        <div class="relative group">
            <select name="genre" class="w-full bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] appearance-none cursor-pointer h-[40px]">
                <option>All Genres</option>
                @foreach($categories as $category)
                <option value="{{ $category->name }}" {{ request('genre') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">expand_more</span>
        </div>
        <!-- Status Filter -->
        <div class="relative group">
            <select name="status" class="w-full bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] appearance-none cursor-pointer h-[40px]">
                <option>All Status</option>
                <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="dropped" {{ request('status') == 'dropped' ? 'selected' : '' }}>Dropped</option>
            </select>
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">expand_more</span>
        </div>
        <!-- Publish Filter -->
        <div class="relative group">
            <select name="publish" class="w-full bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] appearance-none cursor-pointer h-[40px]">
                <option value="">All Publish</option>
                <option value="published" {{ request('publish') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="hidden" {{ request('publish') == 'hidden' ? 'selected' : '' }}>Hidden</option>
            </select>
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">expand_more</span>
        </div>
        <!-- Sort Filter (Mock) -->
        <div class="relative group">
            <select name="sort" class="w-full bg-white border-none py-2 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-[#a53600] appearance-none cursor-pointer h-[40px]">
                <option>Newest First</option>
                <option value="reads" {{ request('sort') == 'reads' ? 'selected' : '' }}>Highest Reads</option>
                <option value="chapters" {{ request('sort') == 'chapters' ? 'selected' : '' }}>Most Chapters</option>
            </select>
            <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">swap_vert</span>
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
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Cover</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Title</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Author</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Genre</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Status</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-center">Publish</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-right">Stats</th>
                <th class="px-4 py-3 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
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
                    <div class="font-bold text-sm font-headline tracking-tight group-hover:text-primary transition-colors max-w-[200px] truncate">
                        {{ $story->title }}
                        @if(!$story->is_published)
                        <span class="inline-block ml-1 text-[9px] text-white bg-stone-500 px-1 rounded uppercase tracking-widest font-black">Hidden</span>
                        @endif
                    </div>
                    <div class="text-[10px] text-stone-400 font-label flex items-center gap-2 mt-1">
                        <span>ID: {{ str_pad($story->id, 4, '0', STR_PAD_LEFT) }}</span>
                        @if(auth()->user()->role === 'author')
                        @if($story->is_draft)
                        <span class="text-stone-600 bg-stone-100 px-1.5 py-0.5 rounded-sm uppercase font-black text-[8px] tracking-widest border border-stone-200">Draft</span>
                        @elseif($story->is_approved)
                        <span class="text-green-600 bg-green-50 px-1.5 py-0.5 rounded-sm uppercase font-black text-[8px] tracking-widest border border-green-100">Approved</span>
                        @else
                        <span class="text-yellow-600 bg-yellow-50 px-1.5 py-0.5 rounded-sm uppercase font-black text-[8px] tracking-widest border border-yellow-100">Pending Review</span>
                        @endif
                        @endif
                    </div>
                </td>
                <td class="px-4 py-3 font-body text-xs max-w-[150px] truncate">{{ $story->author }}</td>
                <td class="px-4 py-3">
                    <div class="flex flex-wrap gap-1 max-w-[150px]">
                        @foreach($story->categories as $category)
                        <span class="text-[9px] font-bold font-headline uppercase bg-stone-100 text-stone-600 px-2 py-1 rounded-sm">{{ $category->name }}</span>
                        @endforeach
                    </div>
                </td>
                <td class="px-4 py-3">
                    @if($story->status === 'ongoing')
                    <span class="flex items-center gap-1.5 text-[11px] font-bold text-primary font-headline">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>Ongoing
                    </span>
                    @elseif($story->status === 'completed')
                    <span class="flex items-center gap-1.5 text-[11px] font-bold text-stone-500 font-headline">
                        <span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>Completed
                    </span>
                    @else
                    <span class="flex items-center gap-1.5 text-[11px] font-bold text-red-500 font-headline">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>Dropped
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3 text-center">
                    <form action="{{ route('admin.stories.togglePublish', $story) }}" method="POST" class="m-0 inline-block">
                        @csrf
                        @method('PATCH')
                        <label class="relative inline-flex items-center cursor-pointer" title="{{ $story->is_published ? 'Unpublish' : 'Publish' }}">
                            <input type="checkbox" class="sr-only peer" onchange="this.form.submit()" {{ $story->is_published ? 'checked' : '' }}>
                            <div class="w-8 h-4 bg-stone-300 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-[16px] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-stone-300 after:border after:rounded-full after:h-3 after:w-3 after:transition-all peer-checked:bg-green-500"></div>
                        </label>
                    </form>
                </td>
                <td class="px-4 py-3 text-right w-[120px]">
                    <div class="text-[11px] font-bold font-headline">{{ number_format($story->chapters_count ?? 0) }} Chapters</div>
                    <div class="text-[9px] text-stone-400 uppercase tracking-wider">{{ number_format($story->views) }} Reads</div>
                </td>
                <td class="px-4 py-3 text-right w-[120px]">
                    <div class="flex justify-end gap-1">
                        <a href="{{ route('story.show', $story->id) }}" target="_blank" class="p-1.5 hover:bg-white rounded-sm text-stone-400 hover:text-green-600 transition-all" title="View on Frontend">
                            <span class="material-symbols-outlined text-sm">open_in_new</span>
                        </a>
                        <a href="{{ route('admin.chapters.index', $story) }}" class="p-1.5 hover:bg-white rounded-sm text-stone-400 hover:text-primary transition-all" title="Manage Chapters">
                            <span class="material-symbols-outlined text-sm">view_list</span>
                        </a>
                        <button class="btn-edit-story p-1.5 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all"
                            data-story="{{ json_encode([
                                'id' => $story->id,
                                'title' => $story->title,
                                'author' => $story->author,
                                'description' => $story->description,
                                'status' => $story->status,
                                'cover_image' => $story->cover_image ? Storage::url($story->cover_image) : null,
                                'category_ids' => $story->categories->pluck('id')
                            ]) }}">
                            <span class="material-symbols-outlined text-sm">edit</span>
                        </button>
                        <form action="{{ route('admin.stories.destroy', $story) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this story?');" class="inline">
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
                <td colspan="7" class="px-6 py-12 text-center text-stone-500 font-body">No stories found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination Section -->
<div class="mt-8 relative z-0">
    {{ $stories->links() }}
</div>

<!-- Modal Overlay -->
<div id="storyModal" class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300 overflow-y-auto">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl my-8 overflow-hidden transform scale-95 opacity-0 transition-all duration-300 relative top-10 md:top-0" id="storyModalContent">
        <div class="px-8 py-6 border-b border-stone-100 flex justify-between items-center bg-white z-10 sticky top-0">
            <h2 id="modalTitle" class="font-headline font-bold text-2xl text-stone-800">Add Story</h2>
            <button id="btnCloseModal" type="button" class="text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="storyForm" data-errors="{{ $errors->any() ? '1' : '0' }}" class="p-8 pb-12 overflow-y-auto max-h-[80vh]" method="POST" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">

            @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 text-red-700 font-headline font-bold text-sm rounded border border-red-100">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block font-headline text-sm font-bold text-stone-700 mb-2">Story Title</label>
                    <input type="text" id="storyTitle" name="title" required class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body outline-none">
                </div>
                <div>
                    <label class="block font-headline text-sm font-bold text-stone-700 mb-2">Author Name</label>
                    <input type="text" id="storyAuthor" name="author" required class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body outline-none">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block font-headline text-sm font-bold text-stone-700 mb-2">Status</label>
                    <select id="storyStatus" name="status" class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body outline-none">
                        <option value="ongoing">Ongoing</option>
                        <option value="completed">Completed</option>
                        <option value="dropped">Dropped</option>
                    </select>
                </div>
                <div>
                    <label class="block font-headline text-sm font-bold text-stone-700 mb-2">Thumbnail (Cover Image)</label>
                    <div class="flex items-start gap-4">
                        <div id="coverPreviewContainer" class="hidden w-16 h-20 bg-stone-100 rounded border border-stone-200 overflow-hidden flex-shrink-0 shadow-sm">
                            <img id="coverPreviewImage" src="#" alt="Preview" class="w-full h-full object-cover">
                        </div>
                        <input type="file" id="storyCover" name="cover_image" accept="image/*" class="w-full bg-white border border-stone-200 rounded px-4 py-2 text-sm font-body outline-none">
                    </div>
                </div>
            </div>

            <div class="mb-6 bg-stone-50 p-4 rounded border border-stone-100">
                <label class="block font-headline text-sm font-bold text-stone-700 mb-3">Categories / Genres</label>
                <div class="flex flex-wrap gap-3 max-h-32 overflow-y-auto">
                    @foreach($categories as $category)
                    <label class="flex items-center gap-2 cursor-pointer font-body text-sm text-stone-700 bg-white border border-stone-200 px-3 py-1.5 rounded hover:border-[#a53600] transition-colors">
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="category-checkbox text-[#a53600] rounded ring-0 focus:ring-[#a53600]">
                        {{ $category->name }}
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="mb-8">
                <label class="block font-headline text-sm font-bold text-stone-700 mb-2">Description / Summary</label>
                <textarea id="storyDesc" name="description" required rows="6" class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body outline-none"></textarea>
            </div>

            <div class="flex justify-end gap-3 w-full border-t border-stone-100 pt-6">
                <button type="button" id="btnCancelModal" class="px-6 py-3 rounded-lg font-headline font-bold text-sm text-stone-500 hover:bg-stone-100 transition-colors mr-auto">Cancel</button>
                <button type="submit" name="action" value="draft" class="px-6 py-3 rounded-lg font-headline font-bold text-sm text-stone-700 bg-stone-100 hover:bg-stone-200 transition-colors border border-stone-200">Save as Draft</button>
                <button type="submit" name="action" value="submit" class="btn-glow text-white px-8 py-3 rounded-lg font-headline font-bold text-sm transition-all hover:opacity-90 shadow-sm">Submit for Review</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toast = document.getElementById('toast-success');
        if (toast) {
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 500); // Wait for transition to finish
            }, 5000);
        }

        const modal = document.getElementById('storyModal');
        const modalContent = document.getElementById('storyModalContent');
        const btnAdd = document.getElementById('btnAddStory');
        const btnsEdit = document.querySelectorAll('.btn-edit-story');
        const btnClose = document.getElementById('btnCloseModal');
        const btnCancel = document.getElementById('btnCancelModal');
        const modalTitle = document.getElementById('modalTitle');
        const form = document.getElementById('storyForm');

        const methodInput = document.getElementById('formMethod');

        const coverInput = document.getElementById('storyCover');
        const coverPreviewContainer = document.getElementById('coverPreviewContainer');
        const coverPreviewImage = document.getElementById('coverPreviewImage');

        if (coverInput) {
            coverInput.addEventListener('change', function() {
                const file = this.files[0];
                if (file) {
                    coverPreviewImage.src = URL.createObjectURL(file);
                    coverPreviewContainer.classList.remove('hidden');
                }
            });
        }

        function openModal(isEdit, data = {}) {
            modalTitle.textContent = isEdit ? 'Edit Story' : 'Add Story';

            if (isEdit) {
                document.getElementById('storyTitle').value = data.title || '';
                document.getElementById('storyAuthor').value = data.author || '';
                document.getElementById('storyStatus').value = data.status || 'ongoing';
                document.getElementById('storyDesc').value = data.description || '';

                if (data.cover_image) {
                    coverPreviewImage.src = data.cover_image;
                    coverPreviewContainer.classList.remove('hidden');
                } else {
                    coverPreviewImage.src = '#';
                    coverPreviewContainer.classList.add('hidden');
                }

                // check boxes
                document.querySelectorAll('.category-checkbox').forEach(cb => {
                    cb.checked = (data.category_ids || []).includes(parseInt(cb.value));
                });

                form.action = `/admin/stories/${data.id}`;
                methodInput.value = 'PUT';
            } else {
                form.reset();
                coverPreviewImage.src = '#';
                coverPreviewContainer.classList.add('hidden');
                form.action = `{{ route('admin.stories.store') }}`;
                methodInput.value = 'POST';
                // ensure all checkboxes are unchecked
                document.querySelectorAll('.category-checkbox').forEach(cb => {
                    cb.checked = false;
                });
            }

            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }

        function closeModal() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 300);
        }

        if (btnAdd) btnAdd.addEventListener('click', () => openModal(false));

        btnsEdit.forEach(btn => {
            btn.addEventListener('click', function() {
                const data = JSON.parse(this.dataset.story);
                openModal(true, data);
            });
        });

        if (btnClose) btnClose.addEventListener('click', closeModal);
        if (btnCancel) btnCancel.addEventListener('click', closeModal);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        if (form && form.dataset.errors === '1') {
            openModal(false);
        }
    });
</script>
@endsection