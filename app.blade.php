<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Cleany') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-50 flex">
            @include('layouts.navigation')

            <div class="flex-1 min-w-0">
                @isset($header)
                    @php
                        $breadcrumbLabels = [
                            'dashboard' => __('Dashboard'),
                            'orders.index' => __('Orders'),
                            'orders.create' => __('New Order'),
                            'orders.show' => __('Order'),
                            'orders.edit' => __('Edit Order'),
                            'customers.index' => __('Customers'),
                            'customers.create' => __('Add Customer'),
                            'customers.show' => __('Customer'),
                            'customers.edit' => __('Edit Customer'),
                            'services.index' => __('Services & Pricing'),
                            'services.create' => __('Add Service'),
                            'services.edit' => __('Edit Service'),
                            'profile.edit' => __('Settings'),
                        ];
                        $headerTitle = $breadcrumbLabels[request()->route()?->getName()] ?? __('Page');
                    @endphp
                    <header class="bg-white border-b border-gray-100 sticky top-0 z-10">
                        <div class="px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between gap-4">
                            <div class="min-w-0">
                                <div class="leading-tight">
                                    {{ $header }}
                                </div>
                                <nav class="mt-0.5 text-xs text-gray-400 flex items-center gap-1.5">
                                    <a href="{{ route('dashboard') }}" class="hover:text-gray-600">{{ __('Home') }}</a>
                                    <span>&rsaquo;</span>
                                    <span class="text-gray-500">{{ $headerTitle ?? __('Page') }}</span>
                                </nav>
                            </div>

                            <div class="flex items-center gap-3 shrink-0">
                                <button type="button" class="relative inline-flex items-center justify-center p-2 rounded-full text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition ease-in-out duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.268 21a2 2 0 0 0 3.464 0"/>
                                        <path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/>
                                    </svg>
                                    <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                </button>

                                <a href="{{ route('profile.edit') }}" title="{{ Auth::user()->name }}" class="inline-flex items-center justify-center w-9 h-9 rounded-full bg-[#111a3a] text-white text-xs font-semibold hover:opacity-90 transition">
                                    {{ collect(explode(' ', trim(Auth::user()->name)))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') ?: 'U' }}
                                </a>
                            </div>
                        </div>
                    </header>
                @endisset

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
