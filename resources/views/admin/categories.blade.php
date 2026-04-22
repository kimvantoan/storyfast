@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
@if(session('success'))
<div class="mb-6 p-4 bg-green-50 text-green-700 font-headline font-bold text-sm rounded shadow-sm border border-green-100 flex items-center gap-3">
    <span class="material-symbols-outlined">check_circle</span>
    {{ session('success') }}
</div>
@endif
<!-- Header Section -->
<div class="flex justify-between items-center mb-16">
    <div>
        <h1 class="font-headline text-3xl font-black tracking-tight text-on-surface">Manage Categories</h1>
    </div>
    <div class="flex gap-4 items-center">
        <form action="{{ route('admin.categories.index') }}" method="GET" class="relative group w-64">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-[#a53600] transition-colors" style="font-size: 20px;">search</span>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search categories..." class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded py-2 pl-10 pr-4 text-sm font-body transition-all outline-none text-stone-800 placeholder-stone-400 shadow-sm h-[40px]" />
        </form>
        <button id="btnAddCategory" class="btn-glow text-white px-5 py-2 rounded font-headline font-bold text-sm transition-all hover:opacity-90 flex items-center gap-2 shadow-sm h-[40px]">
            <span class="material-symbols-outlined text-[18px]" data-icon="add">add</span>
            Add Category
        </button>
    </div>
</div>
<!-- Bento-style Grid for Categories -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($categories as $category)
    <!-- Category Card -->
    <div class="bg-white p-5 flex flex-col group transition-all duration-300 hover:shadow-md relative rounded border border-stone-100">
        <div class="flex justify-between items-start gap-4 mb-2">
            <h3 class="font-headline text-xl font-bold mt-1 line-clamp-1">{{ $category->name }}</h3>
            <div class="flex gap-1 shrink-0 -mr-2">
                <button class="btn-edit-category p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-primary group-hover:bg-stone-50"
                    data-id="{{ $category->id }}"
                    data-name="{{ $category->name }}"
                    data-desc="{{ $category->description }}">
                    <span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
                </button>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-error group-hover:bg-stone-50">
                        <span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
                    </button>
                </form>
            </div>
        </div>
        <p class="font-body text-secondary text-sm leading-relaxed mb-4 flex-1">{{ Str::limit($category->description, 120) }}</p>
        <div class="flex items-center gap-4 pt-4 border-t border-stone-100">
            <div class="flex flex-col">
                <span class="text-xs font-headline font-bold text-primary uppercase tracking-widest">Story Count</span>
                <span class="text-xl font-headline font-black">{{ number_format($category->stories_count ?? 0) }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Modal Overlay -->
<div id="categoryModal" class="fixed inset-0 bg-stone-900/50 backdrop-blur-sm z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="categoryModalContent">
        <div class="px-8 py-6 border-b border-stone-100 flex justify-between items-center">
            <h2 id="modalTitle" class="font-headline font-bold text-2xl text-stone-800">Add Category</h2>
            <button id="btnCloseModal" class="text-stone-400 hover:text-stone-600 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="categoryForm" class="p-8" method="POST" action="">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">
            <input type="hidden" id="categoryId" name="id">
            <div class="mb-6">
                <label for="categoryName" class="block font-headline text-sm font-bold text-stone-700 mb-2">Category Name</label>
                <input type="text" id="categoryName" name="name" placeholder="e.g. Xianxia" class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body transition-all outline-none text-stone-800 shadow-sm" required>
            </div>
            <div class="mb-8">
                <label for="categoryDesc" class="block font-headline text-sm font-bold text-stone-700 mb-2">Description</label>
                <textarea id="categoryDesc" name="description" placeholder="A brief description of this category..." class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded px-4 py-3 text-sm font-body transition-all outline-none text-stone-800 shadow-sm min-h-[100px]" required></textarea>
            </div>
            <div class="flex justify-end gap-3 w-full">
                <button type="button" id="btnCancelModal" class="px-6 py-2.5 rounded-lg font-headline font-bold text-sm text-stone-500 hover:bg-stone-100 transition-colors">Cancel</button>
                <button type="submit" class="btn-glow text-white px-6 py-2.5 rounded-lg font-headline font-bold text-sm transition-all hover:opacity-90 shadow-sm">Save Category</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('categoryModal');
        const modalContent = document.getElementById('categoryModalContent');
        const btnAdd = document.getElementById('btnAddCategory');
        const btnsEdit = document.querySelectorAll('.btn-edit-category');
        const btnClose = document.getElementById('btnCloseModal');
        const btnCancel = document.getElementById('btnCancelModal');
        const modalTitle = document.getElementById('modalTitle');
        const form = document.getElementById('categoryForm');

        const idInput = document.getElementById('categoryId');
        const nameInput = document.getElementById('categoryName');
        const descInput = document.getElementById('categoryDesc');
        const methodInput = document.getElementById('formMethod');

        function openModal(isEdit, data = {}) {
            modalTitle.textContent = isEdit ? 'Edit Category' : 'Add Category';

            if (isEdit) {
                idInput.value = data.id || '';
                nameInput.value = data.name || '';
                descInput.value = data.desc || '';
                form.action = `/admin/categories/${data.id}`;
                methodInput.value = 'PUT';
            } else {
                form.reset();
                idInput.value = '';
                form.action = `{{ route('admin.categories.store') }}`;
                methodInput.value = 'POST';
            }

            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');

            setTimeout(() => {
                nameInput.focus();
            }, 100);
        }

        function closeModal() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('opacity-0', 'pointer-events-none');
            }, 300);
        }

        btnAdd.addEventListener('click', () => openModal(false));

        btnsEdit.forEach(btn => {
            btn.addEventListener('click', function() {
                openModal(true, {
                    id: this.dataset.id,
                    name: this.dataset.name,
                    desc: this.dataset.desc
                });
            });
        });

        btnClose.addEventListener('click', closeModal);
        btnCancel.addEventListener('click', closeModal);

        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    });
</script>
@endsection