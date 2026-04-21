@extends('layouts.admin')

@section('title', 'Manage Categories')

@section('content')
<!-- Header Section -->
<div class="flex justify-between items-center mb-16">
<div>
<h1 class="font-headline text-5xl font-black tracking-tight text-on-surface">Manage Categories</h1>
</div>
<div class="flex gap-4 items-center">
    <div class="relative group w-64">
        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-[#a53600] transition-colors" style="font-size: 20px;">search</span>
        <input type="text" placeholder="Search categories..." class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded py-2 pl-10 pr-4 text-sm font-body transition-all outline-none text-stone-800 placeholder-stone-400 shadow-sm h-[52px]" />
    </div>
    <button class="btn-glow text-white px-8 py-4 rounded-lg font-headline font-bold text-sm transition-all hover:opacity-90 flex items-center gap-2 shadow-sm h-[52px]">
        <span class="material-symbols-outlined" data-icon="add">add</span>
        Add Category
    </button>
</div>
</div>
<!-- Bento-style Grid for Categories -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
<!-- Category Card: Xianxia -->
<div class="bg-white p-8 flex flex-col group transition-all duration-300 hover:shadow-md relative rounded border border-stone-100">
<div class="flex justify-between items-start mb-6">
<div class="cursor-grab active:cursor-grabbing text-stone-300 hover:text-stone-500 transition-colors">
<span class="material-symbols-outlined" data-icon="drag_indicator">drag_indicator</span>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-primary">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-error">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</div>
<h3 class="font-headline text-2xl font-bold mb-2">Xianxia</h3>
<p class="font-body text-secondary text-sm leading-relaxed mb-8 flex-1">Tales of cultivation, ancient immortals, and the path to divinity through spiritual hardship.</p>
<div class="flex items-center gap-4 pt-6 border-t border-stone-100">
<div class="flex flex-col">
<span class="text-xs font-headline font-bold text-primary uppercase tracking-widest">Story Count</span>
<span class="text-xl font-headline font-black">1,248</span>
</div>
</div>
</div>
<!-- Category Card: Romance -->
<div class="bg-white p-8 flex flex-col group transition-all duration-300 hover:shadow-md relative rounded border border-stone-100">
<div class="flex justify-between items-start mb-6">
<div class="cursor-grab active:cursor-grabbing text-stone-300 hover:text-stone-500 transition-colors">
<span class="material-symbols-outlined" data-icon="drag_indicator">drag_indicator</span>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-primary">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-error">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</div>
<h3 class="font-headline text-2xl font-bold mb-2">Romance</h3>
<p class="font-body text-secondary text-sm leading-relaxed mb-8 flex-1">Intimate narratives exploring the complexities of human connection, longing, and heart-felt devotion.</p>
<div class="flex items-center gap-4 pt-6 border-t border-stone-100">
<div class="flex flex-col">
<span class="text-xs font-headline font-bold text-primary uppercase tracking-widest">Story Count</span>
<span class="text-xl font-headline font-black">3,892</span>
</div>
</div>
</div>
<!-- Category Card: Sci-Fi -->
<div class="bg-white p-8 flex flex-col group transition-all duration-300 hover:shadow-md relative rounded border border-stone-100">
<div class="flex justify-between items-start mb-6">
<div class="cursor-grab active:cursor-grabbing text-stone-300 hover:text-stone-500 transition-colors">
<span class="material-symbols-outlined" data-icon="drag_indicator">drag_indicator</span>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-primary">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-error">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</div>
<h3 class="font-headline text-2xl font-bold mb-2">Sci-Fi</h3>
<p class="font-body text-secondary text-sm leading-relaxed mb-8 flex-1">Speculative fiction about futuristic technology, space exploration, and the evolution of society.</p>
<div class="flex items-center gap-4 pt-6 border-t border-stone-100">
<div class="flex flex-col">
<span class="text-xs font-headline font-bold text-primary uppercase tracking-widest">Story Count</span>
<span class="text-xl font-headline font-black">945</span>
</div>
</div>
</div>
<!-- Category Card: Mystery -->
<div class="bg-white p-8 flex flex-col group transition-all duration-300 hover:shadow-md relative rounded border border-stone-100">
<div class="flex justify-between items-start mb-6">
<div class="cursor-grab active:cursor-grabbing text-stone-300 hover:text-stone-500 transition-colors">
<span class="material-symbols-outlined" data-icon="drag_indicator">drag_indicator</span>
</div>
<div class="flex gap-2">
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-primary">
<span class="material-symbols-outlined text-xl" data-icon="edit">edit</span>
</button>
<button class="p-2 hover:bg-stone-100 rounded-full transition-colors text-secondary hover:text-error">
<span class="material-symbols-outlined text-xl" data-icon="delete">delete</span>
</button>
</div>
</div>
<h3 class="font-headline text-2xl font-bold mb-2">Mystery</h3>
<p class="font-body text-secondary text-sm leading-relaxed mb-8 flex-1">Compelling puzzles and noir settings where secrets are unearthed through deduction and suspense.</p>
<div class="flex items-center gap-4 pt-6 border-t border-stone-100">
<div class="flex flex-col">
<span class="text-xs font-headline font-bold text-primary uppercase tracking-widest">Story Count</span>
<span class="text-xl font-headline font-black">2,110</span>
</div>
</div>
</div>
<!-- Add New Category Placeholder Card -->
<button class="border-2 border-dashed border-stone-200 p-8 flex flex-col items-center justify-center group transition-all duration-300 hover:bg-white hover:border-primary rounded">
<div class="h-16 w-16 rounded-full bg-stone-100 flex items-center justify-center text-primary group-hover:bg-primary/10 transition-all mb-4">
<span class="material-symbols-outlined text-3xl" data-icon="add">add</span>
</div>
<span class="font-headline font-bold text-secondary group-hover:text-primary transition-colors">New Section</span>
</button>
</div>
@endsection
