<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRON GYM - Member Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
        /* Transisi halus untuk sidebar mobile */
        #mobile-sidebar { transition: transform 0.3s ease-in-out; }
        .sidebar-open { transform: translateX(0); }
        .sidebar-closed { transform: translateX(-100%); }
    </style>
</head>
<body x-data="{modal: false}" class="bg-gray-50 text-gray-800">
    <div class="flex h-screen overflow-hidden relative">
        
        <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black bg-opacity-50 z-20 hidden lg:hidden"></div>

        <aside id="mobile-sidebar" class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-950 border-r border-slate-800 flex flex-col transform -translate-x-full lg:translate-x-0 lg:static lg:flex transition-transform duration-300">
            <div class="p-6 border-b border-slate-800 flex justify-between items-center">
                <div class="flex items-center gap-2">
                    <i class="fas fa-bolt text-red-500 text-2xl"></i>
                    <h1 class="text-2xl font-bold text-white">IRON<span class="text-red-500">GYM</span></h1>
                </div>
                <button onclick="toggleSidebar()" class="text-gray-400 hover:text-white lg:hidden">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
             
            <a href="{{ route('dashboard.user') }}" 
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('dashboard.user') ? 'bg-red-500 text-white shadow-md' : 'text-gray-400 hover:bg-slate-800 hover:text-gray-200' }}">
                <i class="fas fa-home w-5"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            {{-- Link Jadwal --}}
            <a href="{{ route('jadwal.user') }}" 
            class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('jadwal.user') ? 'bg-red-500 text-white shadow-md' : 'text-gray-400 hover:bg-slate-800 hover:text-gray-200' }}">
                <i class="fas fa-calendar-alt w-5"></i>
                <span class="font-medium">Jadwal Latihan</span>
            </a>
            <a href="{{ route('landing') }}" class="flex items-center px-4 py-3 text-gray-400 hover:bg-gray-800 hover:text-white rounded-xl transition-all duration-200 group">
                <svg class="w-5 h-5 mr-3 group-hover:text-gym-500  xmlns="http://www.w3.org/2000/svg"
     class="w-5 h-5"
     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor"
     stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round"
        d="M3 9.75L12 3l9 6.75V21a.75.75 0 01-.75.75H15a.75.75 0 01-.75-.75v-4.5h-4.5V21a.75.75 0 01-.75.75H3.75A.75.75 0 013 21V9.75z"/>
               </svg>
  <span class="font-medium">Beranda</span>
            </a>

            </nav>

            <div class="p-4 border-t border-slate-800">
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

       
            <main class="flex-1 overflow-y-auto bg-gray-50 w-full">
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <button onclick="toggleSidebar()" class="text-gray-500 focus:outline-none  md:hidden lg:hidden mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    
                    <h2 class="text-xl font-bold text-gray-800">
                        Dashboard
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

            {{$slot }}
            
         </div>
        </main>

      
        </body>
        </html>