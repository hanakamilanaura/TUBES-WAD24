<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> 

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="flex min-h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 bg-gray-50 border-r border-gray-200" aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto">
                <a href="#" class="flex justify-center ps-2.5 mb-20 mt-8">
                    <img src="{{ asset('images/logo_trackin.png') }}" class="h-6 me-3 sm:h-7" alt="Trackin Logo" />
                </a>
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg group hover:bg-orange-500 hover:text-white transition duration-200 {{ request()->is('dashboard') ? 'bg-orange-500 text-white' : '' }}">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg group hover:bg-orange-500 hover:text-white transition duration-200 {{ request()->is('kanban') ? 'bg-orange-500 text-white' : '' }}">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                        </a>
                    </li>
                    <!-- Tambahkan item menu lainnya dengan logika yang sama -->
                </ul>
            </div>
        </aside>
        <!-- End Sidebar -->

        <!-- Konten Utama -->
        <div class="flex-1 p-6 sm:ml-64">
            <!-- Tombol untuk membuka dan menutup sidebar -->
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                <span class="sr-only">Open sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>

 <!-- Page Heading -->
<div class="flex justify-between items-center mb-4">
    <div class="flex items-center">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 6.50005V9.50005C11.999 10.1627 11.7352 10.7979 11.2666 11.2665C10.798 11.7352 10.1628 11.9989 9.50011 12H6.50011C5.8373 11.9989 5.20209 11.7352 4.73347 11.2665C4.26486 10.7979 4.00117 10.1627 4.00007 9.50005V6.50005C4.00114 5.83723 4.26485 5.20202 4.73347 4.73341C5.2021 4.26479 5.8373 4.0011 6.50011 4H9.50011C10.1628 4.00107 10.798 4.26478 11.2666 4.73341C11.7352 5.20202 11.9989 5.83723 12 6.50005ZM18.3 4H15.3C14.6373 4.00107 14.0021 4.26478 13.5335 4.73341C13.0649 5.20202 12.8012 5.83723 12.8001 6.50005V9.50005C12.8012 10.1627 13.0649 10.7979 13.5335 11.2665C14.0021 11.7352 14.6373 11.9989 15.3 12H18.3C18.9628 11.9989 19.598 11.7352 20.0667 11.2665C20.5353 10.7979 20.799 10.1627 20.8001 9.50005V6.50005C20.799 5.83723 20.5353 5.20202 20.0667 4.73341C19.598 4.26479 18.9628 4.0011 18.3 4ZM9.49991 12.8001H6.50005C5.83723 12.8012 5.20202 13.0649 4.73341 13.5335C4.26479 14.0021 4.0011 14.6373 4 15.3V18.3C4.00107 18.9628 4.26478 19.598 4.73341 20.0667C5.20203 20.5353 5.83723 20.799 6.50005 20.8001H9.50005C10.1627 20.799 10.7979 20.5353 11.2665 20.0667C11.7352 19.598 11.9989 18.9628 12 18.3V15.3C11.9989 14.6373 11.7352 14.0021 11.2665 13.5335C10.7979 13.0649 10.1627 12.8012 9.50005 12.8001H9.49991ZM18.3 12.8001H15.3C14.6373 12.8012 14.0021 13.0649 13.5335 13.5335C13.0649 14.0021 12.8012 14.6373 12.8001 15.3V18.3C12.8012 18.9628 13.0649 19.598 13.5335 20.0667C14.0021 20.5353 14.6373 20.799 15.3 20.8001H18.3C18.9628 20.799 19.598 20.5353 20.0667 20.0667C20.5353 19.598 20.799 18.9628 20.8001 18.3V15.3C20.799 14.6373 20.5353 14.0021 20.0667 13.5335C19.598 13.0649 18.9628 12.8012 18.3 12.8001Z" fill="url(#paint0_linear_9_749)"/>
            <defs>
            <linearGradient id="paint0_linear_9_749" x1="4" y1="4" x2="20.8001" y2="20.8001" gradientUnits="userSpaceOnUse">
            <stop stop-color="#FFB790"/>
            <stop offset="1" stop-color="#E8590C"/>
            </linearGradient>
            </defs>
        </svg>
        <h1 class="text-xl font-extrabold text-gray-900 ml-2">Dashboard</h1>
        <div class="">
            <p >Hi, {{explode(' ', Auth::user()->name)[0]}} here’s take a look at your performance and analytics</p>
        </div>
    </div>

    <!-- Settings Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">

                <button class="hover:bg-orange-200 hover:text-gray-400  inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500  hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div class="me-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <div class="flex flex-col text-left">
                        <div class="text-black">{{ Auth::user()->name }}</div>
                        <div>HCM</div> <!-- Tambahkan role user -->
                    </div>
                    <div class="ms-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</div>


            <!-- Page Content -->
            <main>
                {{-- {{ $slot }} --}}
            </main>
        </div>
    </div>

    <script>
        // JavaScript untuk membuka dan menutup sidebar
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.querySelector('[data-drawer-toggle]');
            const sidebar = document.getElementById('logo-sidebar');

            toggleButton.addEventListener('click', function () {
                sidebar.classList.toggle('-translate-x-full');
            });

            // Menutup sidebar jika area di luar sidebar diklik
            document.addEventListener('click', function (event) {
                if (!sidebar.contains(event.target) && !toggleButton.contains(event.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        });
    </script>
</body>
</html>
