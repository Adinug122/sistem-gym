<x-app-layout>
    

         
            <div class="flex-1 overflow-x-hidden overflow-y-auto p-6 custom-scroll">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Total Members</p>
                            <h3 class="text-2xl font-bold text-gray-800">1,245</h3>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 mt-2">
                                +12% bln ini
                            </span>
                        </div>
                        <div class="p-3 bg-red-50 rounded-xl text-gym-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Member Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-800">892</h3>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600 mt-2">
                                72% Rasio
                            </span>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Trainer</p>
                            <h3 class="text-2xl font-bold text-gray-800">14</h3>
                            <p class="text-xs text-gray-400 mt-2">Semua hadir</p>
                        </div>
                        <div class="p-3 bg-orange-50 rounded-xl text-orange-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Check-in Hari Ini</p>
                            <h3 class="text-2xl font-bold text-gray-800">156</h3>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800 mt-2">
                                +5% vs kmrn
                            </span>
                        </div>
                        <div class="p-3 bg-purple-50 rounded-xl text-purple-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    
                    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Pertumbuhan Member</h3>
                                <p class="text-xs text-gray-500">Statistik member baru 6 bulan terakhir</p>
                            </div>
                            <button class="p-2 bg-gray-50 hover:bg-gray-100 rounded-lg text-gray-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg>
                            </button>
                        </div>
                        
                        <div class="relative w-full h-80">
                            <canvas id="memberChart"></canvas>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
                        <div class="mb-4">
                            <h3 class="text-lg font-bold text-gray-800">Sumber Pendapatan</h3>
                            <p class="text-xs text-gray-500">Distribusi revenue bulan ini</p>
                        </div>

                        <div class="relative w-full h-56 flex justify-center">
                            <canvas id="revenueChart"></canvas>
                        </div>

                        <div class="mt-6 space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 rounded-full bg-gym-600 mr-2"></span>
                                    <span class="text-gray-600">Membership</span>
                                </div>
                                <span class="font-bold text-gray-800">65%</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 rounded-full bg-gray-800 mr-2"></span>
                                    <span class="text-gray-600">Personal Trainer</span>
                                </div>
                                <span class="font-bold text-gray-800">25%</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 rounded-full bg-gray-300 mr-2"></span>
                                    <span class="text-gray-600">Merchandise/Lainnya</span>
                                </div>
                                <span class="font-bold text-gray-800">10%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-800">Absensi Terkini</h3>
                            <a href="#" class="text-sm text-gym-600 font-medium hover:underline">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm text-gray-600">
                                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500">
                                    <tr>
                                        <th class="px-6 py-4">Nama Member</th>
                                        <th class="px-6 py-4">Waktu</th>
                                        <th class="px-6 py-4">Paket</th>
                                        <th class="px-6 py-4">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold">AS</div>
                                            Andi Saputra
                                        </td>
                                        <td class="px-6 py-4">08:45 WIB</td>
                                        <td class="px-6 py-4">Gold Plan</td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span></td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold">SL</div>
                                            Siti Lestari
                                        </td>
                                        <td class="px-6 py-4">08:30 WIB</td>
                                        <td class="px-6 py-4">Basic</td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700">Expiring</span></td>
                                    </tr>
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                                            <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold">BD</div>
                                            Budi Darma
                                        </td>
                                        <td class="px-6 py-4">08:15 WIB</td>
                                        <td class="px-6 py-4">Platinum</td>
                                        <td class="px-6 py-4"><span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-lg text-white p-6 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-gym-600 rounded-full opacity-20 blur-2xl"></div>
                        
                        <h3 class="text-lg font-bold mb-6 relative z-10">Aksi Cepat</h3>
                        
                        <div class="space-y-4 relative z-10">
                            <button class="w-full flex items-center p-3 bg-white/10 hover:bg-white/20 rounded-xl transition-all border border-white/5 group">
                                <div class="p-2 bg-gym-600 rounded-lg mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-sm">Tambah Member</p>
                                    <p class="text-xs text-gray-400">Daftarkan anggota baru</p>
                                </div>
                            </button>

                            <button class="w-full flex items-center p-3 bg-white/10 hover:bg-white/20 rounded-xl transition-all border border-white/5 group">
                                <div class="p-2 bg-blue-600 rounded-lg mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-sm">Scan QR Code</p>
                                    <p class="text-xs text-gray-400">Check-in cepat</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <footer class="mt-12 mb-6 text-center text-xs text-gray-400">
                    &copy; 2023 IronGym Management System. Dibuat dengan Tailwind & Chart.js.
                </footer>

            </div>
        </main>
</x-app-layout>

  
