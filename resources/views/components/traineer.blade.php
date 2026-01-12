<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Iron Gym Trainer') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

      <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 z-30 bg-dark-900 text-white flex-shrink-0 md:translate-x-0 md:static md:inset-0 md:flex flex-col transition-all duration-300  z-20"
          :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="h-16 flex items-center px-8 border-b border-gray-800 bg-dark-900">
                <svg class="w-7 h-7 text-white mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                <span class="text-xl font-bold tracking-wide">IRON<span class="text-gym-600">GYM</span></span>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto custom-scroll">
                
                <p class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Menu Utama</p>

                <a href="{{ route('trainer') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group 
                {{ request()->routeIs('admin.dashboard') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}" >
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.dashboard') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <span class="font-medium">Dashboard</span>
                </a>

                <a href="{{ route('program.index') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group
                {{ request()->routeIs('admin.member.index') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}">
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.member.index') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    <span class="font-medium">Program Latihan</span>
                </a>

                <a href="{{ route('jadwal.index') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group
                {{ request()->routeIs('admin.trainer.index') ? 'bg-gym-500 text-white  shadow-lg shadow-gym-600/20 group hover:bg-gym-500 group-hover:text-white' : ''}}">
                    <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  {{ request()->routeIs('admin.trainer.index') ? 'group-hover:text-white  transition-transform group-hover:scale-110 ': '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="font-medium">Jadwal</span>
                </a>
            
            </nav>

            <div class="p-4 border-t border-gray-800">
                 <form action="{{ route('logout') }}" method="POST">
                    @csrf
                <button type="submit" class="flex items-center rounded-lg w-full  hover:bg-gym-600 ">
                   
                    <div class="h-10 w-10  p-[2px] flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#FFFFFF">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                    </div>
                <div>
                    <h1 class="font-semibold text-xl text-white">Keluar</h1>
                </div>
            </button>
               </form>
            </div>
        </aside>
        

        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden"></div>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none  md:hidden lg:hidden mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    
                    <h2 class="text-xl font-bold text-gray-800">
                        {{ $header ?? 'Trainer Area' }}
                    </h2>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <div class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-xs text-gray-500">Professional Trainer</div>
                    </div>
                    <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center text-red-600 font-bold border border-red-200">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-6">
             
                {{ $slot }}
            </main>
        </div>

    </div>
</body>
</html>