@extends('layouts.admin')

@section('title', 'Manage Users')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="font-headline font-black text-3xl tracking-tighter text-on-surface">Manage Users</h1>
    </div>
    <div class="flex gap-4 items-center">
        <div class="relative group w-64">
            <form method="GET" action="{{ route('admin.users.index') }}">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-[#a53600] transition-colors" style="font-size: 20px;">search</span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or email..." class="w-full bg-white border border-stone-200 focus:border-[#a53600] focus:ring-1 focus:ring-[#a53600] rounded py-2 pl-10 pr-4 text-sm font-body transition-all outline-none text-stone-800 placeholder-stone-400 shadow-sm h-[44px]" />
            </form>
        </div>
    </div>
</div>
<!-- Bento Filter Section -->
<div class="grid grid-cols-12 gap-6 mb-6">
    <div class="col-span-8 bg-stone-100 p-1 rounded-lg flex items-center gap-1">
        <a href="{{ route('admin.users.index') }}" class="{{ !request('role') && !request('status') ? 'bg-white text-primary font-bold shadow-sm' : 'text-secondary hover:text-on-surface' }} px-6 py-2 rounded text-sm transition-colors">All Users</a>
        <a href="{{ route('admin.users.index', ['role' => 'author']) }}" class="{{ request('role') === 'author' ? 'bg-white text-primary font-bold shadow-sm' : 'text-secondary hover:text-on-surface' }} px-6 py-2 rounded text-sm transition-colors">Authors</a>
        <a href="{{ route('admin.users.index', ['role' => 'reader']) }}" class="{{ request('role') === 'reader' && !request('requested') ? 'bg-white text-primary font-bold shadow-sm' : 'text-secondary hover:text-on-surface' }} px-6 py-2 rounded text-sm transition-colors">Readers</a>
        <a href="{{ route('admin.users.index', ['requested' => '1']) }}" class="{{ request('requested') === '1' ? 'bg-white text-[#a53600] font-bold shadow-sm' : 'text-secondary hover:text-[#a53600]' }} px-6 py-2 rounded text-sm transition-colors flex items-center gap-1">
            Requests
            @php $pendingCount = \App\Models\User::where('is_author_requested', true)->count(); @endphp
            @if($pendingCount > 0)
                <span class="w-4 h-4 bg-[#a53600] text-white text-[10px] flex items-center justify-center rounded-full ml-1">{{ $pendingCount }}</span>
            @endif
        </a>
        <a href="{{ route('admin.users.index', ['status' => 'suspended']) }}" class="{{ request('status') === 'suspended' ? 'bg-white text-primary font-bold shadow-sm' : 'text-secondary hover:text-on-surface' }} px-6 py-2 rounded text-sm transition-colors">Suspended</a>
    </div>
    <div class="col-span-4 bg-white border border-stone-200 flex items-center px-4 rounded shadow-sm py-1.5 transition-colors relative group focus-within:ring-1 focus-within:ring-primary focus-within:border-primary">
        <form method="GET" action="{{ route('admin.users.index') }}" class="w-full flex items-center h-full">
            @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
            @if(request('role')) <input type="hidden" name="role" value="{{ request('role') }}"> @endif
            @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif
            
            <label for="sort-select" class="text-xs font-bold uppercase tracking-widest text-secondary mr-auto mb-0 whitespace-nowrap cursor-pointer">Sort By</label>
            <div class="flex items-center gap-1 relative ml-4 flex-1">
                <select id="sort-select" name="sort" onchange="this.form.submit()" class="text-sm font-medium text-on-surface bg-transparent outline-none cursor-pointer appearance-none text-right pr-5 w-full relative z-10 focus:text-primary transition-colors">
                    <option value="newest" {{ request('sort') === 'newest' ? 'selected' : '' }}>Date Joined (New)</option>
                    <option value="oldest" {{ request('sort') === 'oldest' ? 'selected' : '' }}>Date Joined (Old)</option>
                    <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                    <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                </select>
                <span class="material-symbols-outlined text-xs absolute right-0 z-0 pointer-events-none text-on-surface" data-icon="expand_more">expand_more</span>
            </div>
        </form>
    </div>
</div>
<!-- User Table Container -->
<div class="bg-white rounded-xl overflow-hidden shadow-sm border border-stone-100">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-stone-50">
                <th class="px-6 py-3 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Avatar / Name</th>
                <th class="px-6 py-3 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Email Address</th>
                <th class="px-6 py-3 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Role</th>
                <th class="px-6 py-3 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Date Joined</th>
                <th class="px-6 py-3 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary">Status</th>
                <th class="px-6 py-3 font-headline text-[10px] uppercase tracking-[0.2em] font-black text-secondary text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @foreach($users as $user)
            <tr class="bg-white hover:bg-stone-50 transition-colors group">
                <td class="px-6 py-3">
                    <div class="flex items-center gap-3">
                        @if($user->avatar)
                        <img alt="{{ $user->name }}" class="w-8 h-8 rounded-full object-cover" src="{{ $user->avatar }}" />
                        @else
                        <div class="w-8 h-8 rounded-full bg-stone-200 flex items-center justify-center font-bold text-stone-500 text-[10px]">{{ strtoupper(substr($user->name, 0, 2)) }}</div>
                        @endif
                        <div>
                            <div class="font-headline font-bold text-on-surface text-sm">{{ $user->name }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-3">
                    <span class="text-xs text-secondary font-medium">{{ $user->email }}</span>
                </td>
                        <td class="px-6 py-3">
                            @if($user->role === 'admin')
                                <span class="text-[9px] appearance-none font-black uppercase tracking-widest px-3 py-1 bg-red-50 text-error border-red-100 rounded-full border text-center">ADMIN</span>
                            @else
                                <form method="POST" action="{{ route('admin.users.updateRole', $user) }}" class="inline-block relative">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role" onchange="this.form.submit()" class="text-[9px] pl-3 pr-2 appearance-none cursor-pointer outline-none font-black uppercase tracking-widest py-0.5 bg-stone-100 text-stone-600 border-stone-200 rounded-full border text-center text-center-last">
                                        <option value="reader" {{ $user->role === 'reader' ? 'selected' : '' }}>READER</option>
                                        <option value="author" {{ $user->role === 'author' ? 'selected' : '' }}>AUTHOR</option>
                                    </select>
                                    @if($user->is_author_requested)
                                    <span class="absolute -top-2 -right-2 bg-[#a53600] text-white text-[8px] uppercase font-black px-1.5 py-0.5 rounded shadow-sm whitespace-nowrap animate-pulse">Requesting</span>
                                    @endif
                                </form>
                            @endif
                        </td>
                <td class="px-6 py-3">
                    <span class="text-xs text-secondary">{{ $user->created_at->format('M d, Y') }}</span>
                </td>
                <td class="px-6 py-3">
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full {{ $user->status === 'active' ? 'bg-green-500' : 'bg-red-500' }}"></span>
                        <span class="text-[10px] font-bold uppercase {{ $user->status === 'active' ? 'text-green-700' : 'text-red-700' }}">{{ ucfirst($user->status) }}</span>
                    </div>
                </td>
                <td class="px-6 py-3 text-right">
                    <div class="flex justify-end gap-2 transition-opacity">
                        <button class="p-1.5 hover:bg-stone-200 rounded transition-all text-secondary" title="Manage">
                            <span class="material-symbols-outlined text-[16px]" data-icon="settings_account_box">settings_account_box</span>
                        </button>
                        @if($user->is_author_requested)
                        <form method="POST" action="{{ route('admin.users.rejectRequest', $user) }}" class="inline m-0 p-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="p-1.5 rounded transition-all hover:bg-orange-50 text-orange-600" title="Reject Author Request">
                                <span class="material-symbols-outlined text-[16px]">person_off</span>
                            </button>
                        </form>
                        @endif
                        @if($user->role !== 'admin')
                        <form method="POST" action="{{ route('admin.users.updateStatus', $user) }}" class="inline m-0 p-0">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="{{ $user->status === 'active' ? 'suspended' : 'active' }}">
                            <button type="submit" class="p-1.5 rounded transition-all {{ $user->status === 'active' ? 'hover:bg-red-50 text-error' : 'hover:bg-green-50 text-green-600' }}" title="{{ $user->status === 'active' ? 'Suspend' : 'Activate' }}">
                                <span class="material-symbols-outlined text-[16px]">{{ $user->status === 'active' ? 'block' : 'check_circle' }}</span>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination Shell -->
    <div class="px-6 py-3 border-t border-stone-100">
        {{ $users->links() }}
    </div>
</div>
@endsection