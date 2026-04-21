@extends('layouts.admin')

@section('title', 'Pending Submissions')

@section('content')
<div class="flex-1 flex flex-col -mt-4">
<!-- Page Header -->
<div class="mb-10 flex justify-between items-center">
<div>
<h3 class="text-4xl font-headline font-black tracking-tight text-on-surface">Pending Submissions</h3>
</div>
<div class="flex gap-4 items-center">
<div class="relative group w-64">
    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-[#a53600] transition-colors" style="font-size: 20px;">search</span>
    <input type="text" placeholder="Search submissions..." class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded py-2 pl-10 pr-4 text-sm font-body transition-all outline-none text-stone-800 placeholder-stone-400 shadow-sm h-[44px]" />
</div>
<button class="px-4 h-[44px] bg-stone-100 text-xs font-bold font-headline rounded flex items-center gap-2 hover:bg-stone-200 transition-colors">
<span class="text-secondary">Genre:</span>
<span>All Genres</span>
<span class="material-symbols-outlined text-[16px]" data-icon="expand_more">expand_more</span>
</button>
<button class="px-4 h-[44px] bg-stone-100 text-xs font-bold font-headline rounded flex items-center gap-2 hover:bg-stone-200 transition-colors">
<span class="text-secondary">Sorted by:</span>
<span>Newest First</span>
<span class="material-symbols-outlined text-[16px]" data-icon="expand_more">expand_more</span>
</button>
</div>
</div>
<!-- Table Container -->
<div class="bg-white overflow-hidden shadow-sm rounded-lg border border-stone-200">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-50 border-b border-stone-200">
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline">Cover</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline">Title &amp; Genre</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline">Author</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline">Submitted Date</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline text-right">Word Count</th>
<th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-secondary font-headline text-center">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-200">
<!-- Row 1 -->
<tr class="hover:bg-stone-50 transition-colors duration-200 group">
<td class="px-6 py-6">
<div class="w-12 h-16 bg-stone-200 overflow-hidden shadow-sm rounded border border-stone-300">
<img class="w-full h-full object-cover" data-alt="abstract book cover design with deep indigo and gold foil textures in a minimalist modern style" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCUEoP7Z-0aJ6YuSU69JTtJfcT7Mj2PvZzC7Q4C2gyto6X0fOnGRZxD9K-PmqR0_1tC1zvEtO02PA9_j1wyNbWgw45feAi6oqLX_Frul9BegjQuoGQs3_LwgUiK2X5BbTJ1xizwE8FJNnG3vdYLL_hqQmMKQtGmvuKBYOLnhvX1J8jJWgn2yV4IkuXLcSQ7S1fJQsQo9UmMTw5ZKqey9Kb5zHmybdnbrZqI_nn-Wm94e4eAYRbNB3gfJglLZrOuvIXmk0KoNDYuA-6R"/>
</div>
</td>
<td class="px-6 py-6">
<p class="font-headline font-bold text-on-surface text-base">The Echo of Dust</p>
<p class="text-secondary text-xs font-medium uppercase tracking-tighter mt-1">Literary Fiction</p>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<span class="w-6 h-6 rounded-full bg-stone-200 flex items-center justify-center text-[10px] font-bold text-secondary">EH</span>
<p class="text-sm font-medium text-on-surface">Evelyn Harper</p>
</div>
</td>
<td class="px-6 py-6">
<p class="text-sm text-secondary">Oct 12, 2023</p>
</td>
<td class="px-6 py-6 text-right">
<p class="text-sm font-headline font-bold">84,200</p>
</td>
<td class="px-6 py-6 text-center">
<a href="{{ url('admin/review') }}" class="inline-block bg-[#a53600] text-white px-6 py-2 rounded text-xs font-black uppercase tracking-widest hover:bg-[#8f2d00] shadow-sm transition-all active:scale-95">Review</a>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-stone-50 transition-colors duration-200">
<td class="px-6 py-6">
<div class="w-12 h-16 bg-stone-200 overflow-hidden shadow-sm rounded border border-stone-300">
<img class="w-full h-full object-cover" data-alt="minimalist white book cover with a single red rose petal and elegant black serif typography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCK44GL8scjurH2WHXMp7vmHkbhzxsy9cbDacP5pwKQzdWWRhkpgi6C1Fh7Fr7oPI11kyXbJkYCvVqThlSJcyZm9dtOyNLPEyBDFvfPmZSAJ3FW8cSvJRKrJ9D45X3_z1csq56KQv5qxxrGVZl16qf9RI04aIbYt10I8Ky4GPVpv2FNRCCbKMBK3v7XHRnV83Wr7yOHnHg5eOumE5Jb_9bHCrGlT0qgudv4rfJnSAuhCUCW6vU_x2Mod-aljEQaIZlHFmjQdIrjtEEi"/>
</div>
</td>
<td class="px-6 py-6">
<p class="font-headline font-bold text-on-surface text-base">Glass Menagerie</p>
<p class="text-secondary text-xs font-medium uppercase tracking-tighter mt-1">Poetry Collection</p>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<span class="w-6 h-6 rounded-full bg-stone-200 flex items-center justify-center text-[10px] font-bold text-secondary">MA</span>
<p class="text-sm font-medium text-on-surface">Marcus Aurel</p>
</div>
</td>
<td class="px-6 py-6">
<p class="text-sm text-secondary">Oct 14, 2023</p>
</td>
<td class="px-6 py-6 text-right">
<p class="text-sm font-headline font-bold">12,500</p>
</td>
<td class="px-6 py-6 text-center">
<a href="{{ url('admin/review') }}" class="inline-block bg-[#a53600] text-white px-6 py-2 rounded text-xs font-black uppercase tracking-widest hover:bg-[#8f2d00] shadow-sm transition-all active:scale-95">Review</a>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-stone-50 transition-colors duration-200">
<td class="px-6 py-6">
<div class="w-12 h-16 bg-stone-200 overflow-hidden shadow-sm rounded border border-stone-300">
<img class="w-full h-full object-cover" data-alt="monochrome cinematic book cover showing a foggy street lamp in a deserted city alley" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD0eIV8SIV3KnJYZSpE9hw6ZLgRV0vrT0IY75tOARfYfeNEbccRzBz0BbeSGcHHFRSOvcJpFAZpPdfrdgJ-L0sGzijrAyKlFy4-WGkQP01J7JBRbGUUWSjeChRjZSj4Mq6z5r0EnglP8nPmEwUakD4UfN8-Nr9FxWQViQ756BYchWxPNjriAms7dB2jHh32GSyefFLgi2hmGTrQh1mt0tcWws8n8b49MaBbC73zHLymwZULd3qbjc-WvQVtM4rcWVuK2ri7D7NXzVQ9"/>
</div>
</td>
<td class="px-6 py-6">
<p class="font-headline font-bold text-on-surface text-base">Neon Silence</p>
<p class="text-secondary text-xs font-medium uppercase tracking-tighter mt-1">Noir Thriller</p>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<span class="w-6 h-6 rounded-full bg-stone-200 flex items-center justify-center text-[10px] font-bold text-secondary">SV</span>
<p class="text-sm font-medium text-on-surface">Sarah Vance</p>
</div>
</td>
<td class="px-6 py-6">
<p class="text-sm text-secondary">Oct 15, 2023</p>
</td>
<td class="px-6 py-6 text-right">
<p class="text-sm font-headline font-bold">96,800</p>
</td>
<td class="px-6 py-6 text-center">
<a href="{{ url('admin/review') }}" class="inline-block bg-[#a53600] text-white px-6 py-2 rounded text-xs font-black uppercase tracking-widest hover:bg-[#8f2d00] shadow-sm transition-all active:scale-95">Review</a>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-stone-50 transition-colors duration-200">
<td class="px-6 py-6">
<div class="w-12 h-16 bg-stone-200 overflow-hidden shadow-sm rounded border border-stone-300">
<img class="w-full h-full object-cover" data-alt="vibrant abstract book cover with watercolor splashes of orange and teal against a cream background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVpduW6hS2HeNdeJ1stItrAHjYpPCtsQhZRZXEKZZhJDPGHeGnhf6slgWmj2kmD2HvA1MZ79BlNMgCXwSB4jOx1ummbazQsCfVXw0Nb5YCFLRIUAsVBBDgUViwowisWoLgBIkNvxbkLeYHAQkGdXm1-lT_T1Ru76uWfOIFM9ejwVCCdwq7UajiqgU6WztWaqdnWFju22lghHevwwFfyl_SFWc8HiZnWrk0m9R_NxJHbmPBNT0sRE81eqXaXsNxqqINqTo2KDsqH08j"/>
</div>
</td>
<td class="px-6 py-6">
<p class="font-headline font-bold text-on-surface text-base">Summer Without Sun</p>
<p class="text-secondary text-xs font-medium uppercase tracking-tighter mt-1">Contemporary Fiction</p>
</td>
<td class="px-6 py-6">
<div class="flex items-center gap-3">
<span class="w-6 h-6 rounded-full bg-stone-200 flex items-center justify-center text-[10px] font-bold text-secondary">JK</span>
<p class="text-sm font-medium text-on-surface">Julian Knight</p>
</div>
</td>
<td class="px-6 py-6">
<p class="text-sm text-secondary">Oct 16, 2023</p>
</td>
<td class="px-6 py-6 text-right">
<p class="text-sm font-headline font-bold">72,000</p>
</td>
<td class="px-6 py-6 text-center">
<a href="{{ url('admin/review') }}" class="inline-block bg-[#a53600] text-white px-6 py-2 rounded text-xs font-black uppercase tracking-widest hover:bg-[#8f2d00] shadow-sm transition-all active:scale-95">Review</a>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Shell -->
<div class="mt-8 flex justify-between items-center py-4 text-stone-500">
<p class="text-xs text-secondary font-headline">Showing 1 to 4 of 24 submissions</p>
<div class="flex items-center gap-2">
<button class="w-10 h-10 flex items-center justify-center text-secondary hover:text-on-surface transition-colors rounded hover:bg-stone-100">
<span class="material-symbols-outlined" data-icon="chevron_left">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center bg-[#a53600] text-white font-bold text-xs rounded shadow-sm">1</button>
<button class="w-10 h-10 flex items-center justify-center text-secondary hover:text-on-surface transition-colors rounded hover:bg-stone-100 font-bold text-xs">2</button>
<button class="w-10 h-10 flex items-center justify-center text-secondary hover:text-on-surface transition-colors rounded hover:bg-stone-100 font-bold text-xs">3</button>
<span class="text-secondary px-2">...</span>
<button class="w-10 h-10 flex items-center justify-center text-secondary hover:text-on-surface transition-colors rounded hover:bg-stone-100 font-bold text-xs">6</button>
<button class="w-10 h-10 flex items-center justify-center text-secondary hover:text-on-surface transition-colors rounded hover:bg-stone-100">
<span class="material-symbols-outlined" data-icon="chevron_right">chevron_right</span>
</button>
</div>
</div>
</div>
@endsection
