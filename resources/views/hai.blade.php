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
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-red-500 text-white transition-all shadow-md">
                    <i class="fas fa-home w-5"></i>
                    <span class="font-medium">Dashboard</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-800 hover:text-gray-200 transition-all">
                    <i class="fas fa-calendar-alt w-5"></i>
                    <span class="font-medium">Jadwal Latihan</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-800 hover:text-gray-200 transition-all">
                    <i class="fas fa-book-open w-5"></i>
                    <span class="font-medium">Program</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-800 hover:text-gray-200 transition-all">
                    <i class="fas fa-history w-5"></i>
                    <span class="font-medium">Riwayat</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-800 hover:text-gray-200 transition-all">
                    <i class="fas fa-credit-card w-5"></i>
                    <span class="font-medium">Membership</span>
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
            <header class="bg-white border-b border-gray-200 px-4 md:px-8 py-4 flex items-center justify-between sticky top-0 z-10 shadow-sm">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-600 hover:text-red-500">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 class="text-xl md:text-2xl font-bold text-gray-800">Overview</h2>
                </div>
                
                <div class="flex items-center gap-4">
                    <div class="hidden md:block relative">
                        <input type="text" placeholder="Cari..." class="bg-gray-100 text-gray-700 px-4 py-2 pl-10 rounded-lg border border-transparent focus:bg-white focus:border-red-500 focus:outline-none w-64 transition-all">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                    
                    <div class="flex items-center gap-3 pl-2 border-l border-gray-200">
                        <div class="text-right hidden sm:block">
                            <p class="text-gray-800 font-medium text-sm">Obrolan</p>
                            <p class="text-red-500 text-xs font-semibold">Premium</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-orange-500 rounded-full flex items-center justify-center text-white font-bold shadow-md cursor-pointer hover:shadow-lg transition-all">
                            O
                        </div>
                    </div>
                </div>
            </header>

            <div class="p-4 md:p-bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl p-6 mb-8  text-white relative overflow-hidden8">
                <div class="bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl p-6 mb-8 shadow-lg text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 relative z-10">
                        <div>
                            <p class="text-red-100 text-sm mb-1 font-medium">Status Membership</p>
                            <h3 class="text-3xl font-bold mb-2">{{ $status }}</h3>
                            @if ($status === 'active' )
                            <p class="text-red-100 text-sm md:text-base">Berlaku hingga {{ $end }} • <span class="bg-white bg-opacity-20 px-2 py-0.5 rounded font-bold">{{ $sisaHari }} hari lagi</span></p>
                            <p class="text-red-100 text-sm mt-3">Kamu punya total {{ $totalPaket }} Paket yang aktif  </p>
                            @else
                            <p class="text-red-100 text-sm md:text-base">Silakan beli dulu yaaa</p>
                            <p class="text-red-100 text-sm mt-3">Kamu tidak punya Paket yang aktif  </p>
                            @endif
                        
                        </div>
                        <button @click="modal = true" class="w-full md:w-auto bg-white text-red-500 px-6 py-3 rounded-lg font-bold shadow-md hover:bg-gray-50 hover:scale-105 transition-all transform">
                            Lihat Paket
                        </button>
                    </div>

                </div>
</div>

<div class="flex justify-center items-center">
    <div class="bg-white shadow-lg rounded-lg px-5 pt-5 pb-2">
        {{ $test }}
          <a href="#" class="inline-flex mt-4 items-center text-xs font-normal text-gray-500 ">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 4.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                     Scan ini ke admin untuk absen
       </a>
    </div>
</div>

<!-- Main modal -->


           
        </main>
    </div>
<div x-show="modal"
     style="display: none;"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     @click.self="modal = false"
     class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-60 backdrop-blur-sm overflow-y-auto overflow-x-hidden p-4">

    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white border border-gray-200 rounded-xl shadow-2xl">
            
            <div class="flex items-center justify-between p-4 border-b border-gray-100 md:p-5">
                <h3 class="text-lg font-bold text-gray-900">
                    Daftar Paket
                </h3>
                
                <button @click="modal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4 md:p-5">
              
            
    @php
  $paket = $membership->filter(function($item){
    return in_array($item->status, ['active','schedule']);
  })
@endphp
<p class="text-sm font-normal text-gray-500 mb-4">Berikut Keterangan paket anda</p>
                @forelse ($paket as $item)
               
                @php $hasActive = true;  @endphp
                <ul class="space-y-3">
             <li>
                <div class="flex items-center justify-between p-3 rounded-lg border border-gray-200 bg-white shadow-sm hover:shadow-md transition">
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center 
                            {{ $item->status == 'active' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                            
                            @if($item->status == 'active')
                                <i class="fas fa-bolt"></i> @else
                                <i class="fas fa-hourglass-half"></i> @endif
                        </div>

                        <div>
                            <p class="text-sm font-bold text-gray-900">
                                {{ $item->paket->nama ?? 'Paket Unknown' }}
                            </p> 
                            
                            <p class="text-xs text-gray-500">
                                @if($item->status == 'active')
                                    Berakhir: {{ \Carbon\Carbon::parse($item->end)->format('d M Y') }}
                                @else
                                    Mulai: {{ \Carbon\Carbon::parse($item->start)->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div>
                        @if($item->status == 'active')
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400">
                                Active
                            </span>
                        @elseif( $item->status == 'schedule')
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded border border-orange-400">
                                Antre
                            </span>
                            @else
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded border border-orange-400">
                                Habis
                            </span>

                        @endif
                    </div>

                </div>
            </li>
            @empty
            <li>
                <div class="text-center py-4">
                    <p class="text-red-600 font-medium">Kamu tidak punya paket apapun.</p>
                    <p class="text-gray-400 text-xs">Silakan beli paket membership baru.</p>
                </div>
            </li>
        @endforelse    
                        </ul>             
   
                

                
                <div class="mt-4">
                    <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 4.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                     Syarat & Ketentuan Berlaku
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open Sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                // Close Sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>
</body>
</html>