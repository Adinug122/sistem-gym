<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IRON GYM - Member Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gray-50 text-gray-800">
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
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-slate-800 hover:text-red-400 transition-all">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    <span class="font-medium">Logout</span>
                </a>
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

            <div class="p-4 md:p-8">
                <div class="bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl p-6 mb-8 shadow-lg text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                    
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 relative z-10">
                        <div>
                            <p class="text-red-100 text-sm mb-1 font-medium">Status Membership</p>
                            <h3 class="text-3xl font-bold mb-2">{{ $membership->paket->nama }}</h3>
                            <p class="text-red-100 text-sm md:text-base">Berlaku hingga {{ $end }} • <span class="bg-white bg-opacity-20 px-2 py-0.5 rounded font-bold">{{ $sisa_asli }} hari lagi</span></p>
                        </div>
                        <button class="w-full md:w-auto bg-white text-red-500 px-6 py-3 rounded-lg font-bold shadow-md hover:bg-gray-50 hover:scale-105 transition-all transform">
                            Perpanjang Sekarang
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-dumbbell text-blue-500 text-xl"></i>
                            </div>
                            <span class="text-green-500 text-xs font-bold bg-green-50 px-2 py-1 rounded-full">+5%</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-800 mb-1">156</h4>
                        <p class="text-gray-500 text-sm">Latihan Minggu Ini</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-orange-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-fire text-orange-500 text-xl"></i>
                            </div>
                            <span class="text-green-500 text-xs font-bold bg-green-50 px-2 py-1 rounded-full">+12%</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-800 mb-1">2,847</h4>
                        <p class="text-gray-500 text-sm">Kalori Terbakar</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-check-circle text-green-500 text-xl"></i>
                            </div>
                            <span class="text-gray-400 text-xs font-medium">Target 72%</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-800 mb-1">892</h4>
                        <p class="text-gray-500 text-sm">Kehadiran Bulan Ini</p>
                    </div>

                    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-purple-500 text-xl"></i>
                            </div>
                            <span class="text-green-500 text-xs font-bold bg-green-50 px-2 py-1 rounded-full">+8m</span>
                        </div>
                        <h4 class="text-3xl font-bold text-gray-800 mb-1">2.5 jam</h4>
                        <p class="text-gray-500 text-sm">Durasi Rata-rata</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 mb-8">
                    
                    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Jadwal Hari Ini</h3>
                            <a href="#" class="text-red-500 text-sm font-semibold hover:text-red-600">Lihat Semua</a>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-red-100 transition-colors">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-running text-red-500 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-gray-800 font-bold mb-1">Cardio Blast</h4>
                                    <p class="text-gray-500 text-xs sm:text-sm"><i class="far fa-clock mr-1"></i> 08:00 - 09:00 • Studio A</p>
                                </div>
                                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full text-center w-fit">Terdaftar</span>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-blue-100 transition-colors">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-dumbbell text-blue-500 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-gray-800 font-bold mb-1">Strength Training</h4>
                                    <p class="text-gray-500 text-xs sm:text-sm"><i class="far fa-clock mr-1"></i> 14:00 - 15:30 • Gym Area</p>
                                </div>
                                <span class="px-3 py-1 bg-gray-200 text-gray-600 text-xs font-bold rounded-full text-center w-fit">Tersedia</span>
                            </div>

                            <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100 hover:border-purple-100 transition-colors">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-spa text-purple-500 text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-gray-800 font-bold mb-1">Yoga Flow</h4>
                                    <p class="text-gray-500 text-xs sm:text-sm"><i class="far fa-clock mr-1"></i> 18:00 - 19:00 • Studio B</p>
                                </div>
                                <span class="px-3 py-1 bg-gray-200 text-gray-600 text-xs font-bold rounded-full text-center w-fit">Tersedia</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-800">Program Aktif</h3>
                            <a href="#" class="text-red-500 text-sm font-semibold hover:text-red-600">Kelola</a>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="text-gray-800 font-bold text-sm sm:text-base">Build Muscle Program</h4>
                                        <p class="text-gray-500 text-xs">12 dari 16 sesi selesai</p>
                                    </div>
                                    <span class="text-xl font-bold text-red-500">75%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-gradient-to-r from-red-500 to-orange-500 h-2.5 rounded-full" style="width: 75%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="text-gray-800 font-bold text-sm sm:text-base">Fat Loss Challenge</h4>
                                        <p class="text-gray-500 text-xs">5 dari 12 sesi selesai</p>
                                    </div>
                                    <span class="text-xl font-bold text-blue-500">42%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-gradient-to-r from-blue-500 to-cyan-500 h-2.5 rounded-full" style="width: 42%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <div>
                                        <h4 class="text-gray-800 font-bold text-sm sm:text-base">Flexibility & Mobility</h4>
                                        <p class="text-gray-500 text-xs">8 dari 10 sesi selesai</p>
                                    </div>
                                    <span class="text-xl font-bold text-purple-500">80%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 h-2.5 rounded-full" style="width: 80%"></div>
                                </div>
                            </div>

                            <button class="w-full mt-2 bg-gray-50 border-2 border-dashed border-gray-300 text-gray-500 py-3 rounded-lg hover:border-red-400 hover:text-red-500 hover:bg-red-50 transition-all font-medium text-sm">
                                <i class="fas fa-plus mr-2"></i> Tambah Program Baru
                            </button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 border border-gray-100 shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-800">Riwayat Aktivitas</h3>
                        <a href="#" class="text-red-500 text-sm font-semibold hover:text-red-600">Lihat Semua</a>
                    </div>

                    <div class="space-y-4">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-4 w-full sm:w-auto">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check text-green-500"></i>
                                </div>
                                <div class="flex-1 sm:hidden">
                                    <p class="text-gray-800 font-bold text-sm">Sesi Cardio Selesai</p>
                                    <p class="text-gray-500 text-xs">Hari ini, 09:15</p>
                                </div>
                                <span class="text-orange-500 font-bold text-sm sm:hidden">+320 kal</span>
                            </div>
                            
                            <div class="hidden sm:block flex-1">
                                <p class="text-gray-800 font-medium">Menyelesaikan sesi Cardio Blast</p>
                                <p class="text-gray-500 text-xs">Hari ini, 09:15 • Durasi 60 menit</p>
                            </div>
                            <span class="text-orange-500 font-bold text-sm hidden sm:block">+320 kal</span>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-dumbbell text-blue-500"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-800 font-medium text-sm sm:text-base">Check-in di Gym Area</p>
                                <p class="text-gray-500 text-xs">Kemarin, 14:30</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-trophy text-purple-500"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-gray-800 font-medium text-sm sm:text-base">Mencapai target minggu ini</p>
                                <p class="text-gray-500 text-xs">2 hari yang lalu</p>
                            </div>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-bold rounded-full">Pencapaian</span>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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