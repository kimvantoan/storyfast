@extends('layouts.admin')

@section('title', 'Manage Stories')

@section('content')
<!-- Header Section -->
<div class="mb-8">
<h1 class="text-[3.5rem] font-black font-headline tracking-tighter leading-none">Manage Stories</h1>
</div>
<!-- Filter Bar Section -->
<section class="bg-surface-container-low p-1 rounded-sm mb-8 flex flex-col md:flex-row gap-4 items-center">
<div class="grid grid-cols-1 md:grid-cols-4 gap-2 w-full">
<!-- Genre Dropdown -->
<div class="relative group">
<select class="w-full bg-white border-none py-3 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-primary appearance-none cursor-pointer">
<option>All Genres</option>
<option>Magical Realism</option>
<option>Noir Fiction</option>
<option>Lyrical Prose</option>
<option>Philosophy</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">expand_more</span>
</div>
<!-- Status Filter -->
<div class="relative group">
<select class="w-full bg-white border-none py-3 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-primary appearance-none cursor-pointer">
<option>All Status</option>
<option>Ongoing</option>
<option>Completed</option>
<option>Draft</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">expand_more</span>
</div>
<!-- Sort Filter -->
<div class="relative group">
<select class="w-full bg-white border-none py-3 px-4 text-xs font-bold font-headline uppercase tracking-wider focus:ring-1 focus:ring-primary appearance-none cursor-pointer">
<option>Newest First</option>
<option>Highest Reads</option>
<option>Most Chapters</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-stone-400 text-sm">swap_vert</span>
</div>
<!-- CTA Filter Action -->
<button class="bg-[#1c1b1b] text-white py-3 px-4 text-xs font-bold font-headline uppercase tracking-wider hover:bg-stone-800 transition-colors flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-sm">filter_alt</span>
                        Apply Filters
                    </button>
</div>
</section>
<!-- Table Section -->
<div class="bg-white overflow-hidden shadow-sm">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-stone-100">
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Cover</th>
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Story Title</th>
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Author</th>
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Genre</th>
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary">Status</th>
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-right">Stats</th>
<th class="px-6 py-4 text-[10px] font-black font-headline uppercase tracking-[0.2em] text-secondary text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-stone-100">
<!-- Row 1 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-5">
<div class="w-12 h-16 bg-stone-200 rounded-sm overflow-hidden flex-shrink-0">
<img alt="Book Cover" class="w-full h-full object-cover" data-alt="Minimalist book cover featuring abstract monochromatic geometric shapes and elegant serif typography in a moody setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCaPGjKhIzFfqtj_Jk5EErthmj4Jl9sO_Gd1gE3V5ag7spq2EVvWQ7Fx-n1w-Zj1WKOsBWzUms_mr4dBa4OedoQr0rlgxDFgba_h_9fzcTqgWJcpl7GnMTuPqF7dX7z4fe7FreBABbf2CV_rO3G_Bm7gTjKj4aaktT83A4j_fi7A2gIP_D986vXS7rmGr50fkWBvSGxxiNuPblbQ5u4rLRjlekS13VCN2SlXv-zAV5uByy8mRnRDDbIwx688du9sMbdniSb8Ei_Mu-y"/>
</div>
</td>
<td class="px-6 py-5">
<div class="font-bold text-base font-headline tracking-tight group-hover:text-primary transition-colors">The Echo of Silence</div>
<div class="text-xs text-stone-400 font-label">ID: SN-8829</div>
</td>
<td class="px-6 py-5 font-body text-sm">Elena Valerius</td>
<td class="px-6 py-5">
<span class="text-[10px] font-bold font-headline uppercase bg-stone-100 text-stone-600 px-2 py-1 rounded-sm">Noir Fiction</span>
</td>
<td class="px-6 py-5">
<span class="flex items-center gap-1.5 text-xs font-bold text-primary font-headline">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                    Ongoing
                                </span>
</td>
<td class="px-6 py-5 text-right">
<div class="text-xs font-bold font-headline">12 Chapters</div>
<div class="text-[10px] text-stone-400 uppercase tracking-wider">14.2k Reads</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-error transition-all">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">archive</span>
</button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-5">
<div class="w-12 h-16 bg-stone-200 rounded-sm overflow-hidden flex-shrink-0">
<img alt="Book Cover" class="w-full h-full object-cover" data-alt="Classic leather bound book lying on an old wooden table with soft candle light illuminating the gold embossed title" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBpf9oN6ohtN3OOezqd76uegMdSBOMFrPNhYkeCd63fzU3f89KxrtKhJHHMhQH_D6n2fMxMR3buyioXVs-NO_cI7xkQTBuPsqtzelzDbJv6jrYSHJ2lzxhXehy58s59ughK-hBkGJokHITnxkCtgz2161ymPYf_eqIiGbmjLIiLwLsNEWojEWZgGDjdYqC257yyl1_VP0DrDKRINn0diefYu2ePSpLCJ6wdOhboY7LRZZWTWqZ1uyqFYZkdxY7BDYRq-ohhSSiIA0DB"/>
</div>
</td>
<td class="px-6 py-5">
<div class="font-bold text-base font-headline tracking-tight group-hover:text-primary transition-colors">Dust and Diamonds</div>
<div class="text-xs text-stone-400 font-label">ID: SN-1204</div>
</td>
<td class="px-6 py-5 font-body text-sm">Julian Graves</td>
<td class="px-6 py-5">
<span class="text-[10px] font-bold font-headline uppercase bg-stone-100 text-stone-600 px-2 py-1 rounded-sm">Lyrical Prose</span>
</td>
<td class="px-6 py-5">
<span class="flex items-center gap-1.5 text-xs font-bold text-stone-500 font-headline">
<span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
                                    Completed
                                </span>
</td>
<td class="px-6 py-5 text-right">
<div class="text-xs font-bold font-headline">48 Chapters</div>
<div class="text-[10px] text-stone-400 uppercase tracking-wider">3.1k Reads</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-error transition-all">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">archive</span>
</button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-5">
<div class="w-12 h-16 bg-stone-200 rounded-sm overflow-hidden flex-shrink-0">
<img alt="Book Cover" class="w-full h-full object-cover" data-alt="Surreal digital art for a book cover showing a person walking through a forest of giant glowing mushrooms under a purple sky" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDWXMdALdWv3cAq3DsN8AAJYUsQeoo7H3dxV2xo5QpnQz__nBntGWO-ahRB7AgCsCIPkK2q28n6l7Cq0RzDpZAOTkrhJlg2Duo6DKoWHTTiIGifVxfdB2OIOm0Nqw2MbWNNvVWgQj9EeRxV86a_PGAicdkbv0O2KMq2g_80Ha4wj2aitk7XEnMQyWRgR7s-Z63wkgycv_5K9H_XfrCRgPIw6rVH-JWX9nS1ixus2W7wqTnVp4OggrvBS5yakHQgtm_5kN8JJzwtRVT7"/>
</div>
</td>
<td class="px-6 py-5">
<div class="font-bold text-base font-headline tracking-tight group-hover:text-primary transition-colors">The Third Horizon</div>
<div class="text-xs text-stone-400 font-label">ID: SN-0931</div>
</td>
<td class="px-6 py-5 font-body text-sm">Sarah Thorne</td>
<td class="px-6 py-5">
<span class="text-[10px] font-bold font-headline uppercase bg-stone-100 text-stone-600 px-2 py-1 rounded-sm">Magical Realism</span>
</td>
<td class="px-6 py-5">
<span class="flex items-center gap-1.5 text-xs font-bold text-primary font-headline">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                    Ongoing
                                </span>
</td>
<td class="px-6 py-5 text-right">
<div class="text-xs font-bold font-headline">5 Chapters</div>
<div class="text-[10px] text-stone-400 uppercase tracking-wider">892 Reads</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-error transition-all">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">archive</span>
</button>
</div>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-stone-50 transition-colors group">
<td class="px-6 py-5">
<div class="w-12 h-16 bg-stone-200 rounded-sm overflow-hidden flex-shrink-0">
<img alt="Book Cover" class="w-full h-full object-cover" data-alt="High contrast black and white book cover with a single red rose on a dark textured background with elegant typography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOi6VXICgp5Uxk4I5Hr6s5rfvA5aZfqYWVik0aeDLes1SexllGMsYXKUbEpieEcaUXyyD9ilenls6ghrCZxzV4LWYOJtNDZbTC1PI7YvYb6KDW7igTk7pNOBmtVbP22gu86fCQyiOOKg3SEEx3ZE5K2PC1sxdp3o-WC3ogde9gu32jlzC1K3Ch3Efex3pJ300EaQesGPEARC9bPykC3TNkpzTZ_oPReNqm3_D5kavpp-5akOiOOT4mt23ssiE-qzkeYhCS5GOKhFg_"/>
</div>
</td>
<td class="px-6 py-5">
<div class="font-bold text-base font-headline tracking-tight group-hover:text-primary transition-colors">Beyond the Veil</div>
<div class="text-xs text-stone-400 font-label">ID: SN-7712</div>
</td>
<td class="px-6 py-5 font-body text-sm">Marcus Sol</td>
<td class="px-6 py-5">
<span class="text-[10px] font-bold font-headline uppercase bg-stone-100 text-stone-600 px-2 py-1 rounded-sm">Philosophy</span>
</td>
<td class="px-6 py-5">
<span class="flex items-center gap-1.5 text-xs font-bold text-stone-500 font-headline">
<span class="w-1.5 h-1.5 rounded-full bg-stone-400"></span>
                                    Completed
                                </span>
</td>
<td class="px-6 py-5 text-right">
<div class="text-xs font-bold font-headline">10 Chapters</div>
<div class="text-[10px] text-stone-400 uppercase tracking-wider">22.5k Reads</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">edit</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-error transition-all">
<span class="material-symbols-outlined text-sm">delete</span>
</button>
<button class="p-2 hover:bg-white rounded-sm text-stone-400 hover:text-on-surface transition-all">
<span class="material-symbols-outlined text-sm">archive</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Section -->
<div class="mt-8 flex justify-between items-center">
<div class="text-xs font-headline font-bold uppercase tracking-widest text-stone-400">
                    Showing 1 to 4 of 124 Manuscripts
                </div>
<div class="flex gap-1">
<button class="w-10 h-10 flex items-center justify-center bg-white text-stone-400 hover:text-on-surface hover:bg-stone-200 transition-all rounded shadow-sm">
<span class="material-symbols-outlined text-base">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center bg-stone-900 text-white font-headline text-xs font-bold rounded shadow-sm">1</button>
<button class="w-10 h-10 flex items-center justify-center bg-white text-stone-600 font-headline text-xs font-bold hover:bg-stone-200 rounded shadow-sm">2</button>
<button class="w-10 h-10 flex items-center justify-center bg-white text-stone-600 font-headline text-xs font-bold hover:bg-stone-200 rounded shadow-sm">3</button>
<span class="w-10 h-10 flex items-center justify-center text-stone-400">...</span>
<button class="w-10 h-10 flex items-center justify-center bg-white text-stone-600 font-headline text-xs font-bold hover:bg-stone-200 rounded shadow-sm">31</button>
<button class="w-10 h-10 flex items-center justify-center bg-white text-stone-400 hover:text-on-surface hover:bg-stone-200 transition-all rounded shadow-sm">
<span class="material-symbols-outlined text-base">chevron_right</span>
</button>
</div>
</div>
@endsection
