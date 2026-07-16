@php
    $navItems = [
        ['route' => 'dashboard', 'active' => request()->routeIs('dashboard'), 'label' => __('Dashboard'), 'icon' => '<rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/>'],
        ['route' => 'orders.index', 'active' => request()->routeIs('orders.*') && ! request()->routeIs('orders.create'), 'label' => __('Orders'), 'icon' => '<path d="M20.91 8.84 8.56 21.19a1.93 1.93 0 0 1-2.73 0L2.81 18.16a1.93 1.93 0 0 1 0-2.73L15.16 2.81a1.93 1.93 0 0 1 2.73 0l3.02 3.02a1.93 1.93 0 0 1 0 2.73z"/><path d="m9.5 6.5 8 8"/>'],
        ['route' => 'orders.create', 'active' => request()->routeIs('orders.create'), 'label' => __('New Order'), 'icon' => '<line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>'],
        ['route' => 'customers.index', 'active' => request()->routeIs('customers.*'), 'label' => __('Customers'), 'icon' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>'],
        ['route' => 'services.index', 'active' => request()->routeIs('services.*'), 'label' => __('Services & Pricing'), 'icon' => '<path d="M11 2a2 2 0 0 0-2 2v.5a.5.5 0 0 1-.5.5h-.5a2 2 0 0 0-2 2v.5a.5.5 0 0 1-.5.5H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9.5a.5.5 0 0 1 .5-.5h.5a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/>'],
        ['route' => 'profile.edit', 'active' => request()->routeIs('profile.edit'), 'label' => __('Settings'), 'icon' => '<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/>'],
    ];

    $initials = collect(explode(' ', trim(Auth::user()->name)))->map(fn ($part) => mb_substr($part, 0, 1))->take(2)->implode('');
@endphp

<!-- Sidebar -->
<aside x-data="{ collapsed: false }" :class="collapsed ? 'w-20' : 'w-64'" class="relative flex flex-col shrink-0 h-screen sticky top-0 overflow-hidden text-white border-r border-white/10 shadow-sm transition-all duration-150 ease-in-out" style="background: linear-gradient(160deg, #0f172a 0%, #1e3a8a 65%, #f59e0b 170%);">

    <!-- Faint background texture, matching the homepage hero -->
    <div class="pointer-events-none absolute inset-0 opacity-[0.15]" style="background: url('https://images.unsplash.com/photo-1545173168-9f1947eebb7f?auto=format&fit=crop&w=1600&q=60') center/cover;"></div>

    <div class="relative flex flex-col h-full">
        <div class="h-16 flex items-center px-4 shrink-0" :class="collapsed ? 'justify-center' : 'justify-between'">
            <a href="{{ route('dashboard') }}" x-show="! collapsed" class="flex items-center gap-1.5 text-xl font-bold text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="#f59e0b" stroke="#f59e0b" stroke-width="0" class="shrink-0">
                    <path d="M12 2.69s-5.5 5.79-5.5 10.31a5.5 5.5 0 0 0 11 0c0-4.52-5.5-10.31-5.5-10.31z"/>
                </svg>
                Cleany
            </a>
            <a href="{{ route('dashboard') }}" x-show="collapsed" x-cloak class="flex items-center justify-center w-9 h-9 rounded-full bg-amber-500 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" stroke="none">
                    <path d="M12 2.69s-5.5 5.79-5.5 10.31a5.5 5.5 0 0 0 11 0c0-4.52-5.5-10.31-5.5-10.31z"/>
                </svg>
            </a>

            <button x-show="! collapsed" @click="collapsed = ! collapsed" class="inline-flex items-center justify-center p-2 rounded-md text-white/60 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
                <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M18 19l-7-7 7-7" />
                </svg>
            </button>
        </div>

        <button x-show="collapsed" x-cloak @click="collapsed = ! collapsed" class="mx-auto mb-2 inline-flex items-center justify-center p-2 rounded-md text-white/60 hover:text-white hover:bg-white/10 focus:outline-none transition duration-150 ease-in-out">
            <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M6 5l7 7-7 7" />
            </svg>
        </button>

        <p x-show="! collapsed" class="px-6 pt-4 pb-2 text-[11px] font-semibold uppercase tracking-widest text-white/50">{{ __('Main Menu') }}</p>

        <nav class="flex-1 overflow-y-auto px-3 space-y-1">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                   title="{{ $item['label'] }}"
                   @class([
                       'group flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition duration-150 ease-in-out',
                       'bg-amber-500 text-white shadow-sm' => $item['active'],
                       'text-white/70 hover:bg-white/10 hover:text-white' => ! $item['active'],
                   ])>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="shrink-0">
                        {!! $item['icon'] !!}
                    </svg>
                    <span x-show="! collapsed">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="border-t border-white/10 p-3 space-y-1">
            <a href="{{ route('profile.edit') }}" class="w-full flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-white hover:bg-white/10 transition duration-150 ease-in-out">
                <span class="flex items-center justify-center w-8 h-8 rounded-full bg-amber-500/20 text-amber-400 text-xs font-semibold shrink-0">{{ $initials ?: 'U' }}</span>
                <span x-show="! collapsed" class="leading-tight text-left">
                    <span class="block text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-xs text-white/50">{{ Auth::user()->email }}</span>
                </span>
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" title="{{ __('Log Out') }}" class="w-full flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-white/70 hover:bg-white/10 hover:text-white transition duration-150 ease-in-out">
                    <svg class="h-5 w-5 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    <span x-show="! collapsed">{{ __('Log Out') }}</span>
                </button>
            </form>
        </div>
    </div>
</aside>