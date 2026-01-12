<x-app-layout>
    
         
            <div class="flex-1 overflow-x-hidden overflow-y-auto p-6 custom-scroll">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Total Members</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $Totalmember }}</h3>
                           
                        </div>
                        <div class="p-3 bg-red-50 rounded-xl text-gym-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Member Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $memberAktif }}</h3>
                          
                        </div>
                        <div class="p-3 bg-blue-50 rounded-xl text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Trainer</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{ $Totaltrainer }}</h3>
                        
                        </div>
                        <div class="p-3 bg-orange-50 rounded-xl text-orange-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 card-hover flex justify-between items-start">
                        <div>
                            <p class="text-sm font-medium text-gray-500 mb-1">Check-in Hari Ini</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{  $AbsenHariIni }}</h3>
                    
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

                       <div class="space-y-4 mt-8">
    @foreach($dataPendapatan as $index => $item)
        <div class="flex items-center justify-between text-sm">
            <div class="flex items-center">
                @php
                    $colors = ['bg-red-500', 'bg-gray-800', 'bg-gray-400', 'bg-yellow-500', 'bg-green-500'];
                    $colorClass = $colors[$index] ?? 'bg-gray-200'; // Default abu kalau warna habis
                @endphp
                
                <span class="w-3 h-3 rounded-full {{ $colorClass }} mr-3"></span>
                <span class="text-gray-600 font-medium">{{ $item->nama_paket }}</span>
            </div>
            
            <span class="font-bold text-gray-800">
                Rp {{ number_format($item->total_pendapatan, 0, ',', '.') }}
            </span>
        </div>
    @endforeach
    
    @if($dataPendapatan->isEmpty())
        <p class="text-center text-gray-400 text-xs">Belum ada transaksi masuk.</p>
    @endif
</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-gray-800">Absensi Terkini</h3>
                            <a href="{{ route('admin.absensi.index') }}" class="text-sm text-gym-600 font-medium hover:underline">Lihat Semua</a>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-left text-sm text-gray-600">
                                <thead class="bg-gray-50 text-xs uppercase font-semibold text-gray-500">
                                    <tr>
                                        <th class="px-6 py-4">Nama Member</th>
                                        <th class="px-6 py-4">Waktu</th>
                                        <th class="px-6 py-4">Paket</th>
                                        <th class="px-6 py-4">Sisa Hari</th>
                                    </tr>
                                </thead>
                       <tbody class="divide-y divide-gray-100">
    @forelse($listAbsen as $absen)
      
        @php
           
            $latestMembership = $absen->member->membership->last(); 
            
        
            $namaPaket = $latestMembership->paket->nama ?? '-';
            $status = $latestMembership->status ?? 'inactive';

            if($latestMembership && $latestMembership->end){
                $tanggalBerakhir = \Carbon\Carbon::parse($latestMembership->end);
                $hariIni = \Carbon\Carbon::now();
            }
          
            $selisihHari = $hariIni->diffInDays($tanggalBerakhir, false);
                $selisihHari = (int) ceil($selisihHari);

                $teksSisa = $selisihHari . ' Hari';
         
        @endphp

        <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold">
                    {{ substr($absen->member->user->name ?? 'X', 0, 2) }}
                </div>
                {{ $absen->member->user->name ?? 'Deleted User' }}
            </td>

            <td class="px-6 py-4">
                {{ \Carbon\Carbon::parse($absen->checkin_time)->format('H:i') }} WIB
            </td>

            <td class="px-6 py-4">
                {{ $namaPaket }}
            </td>

            <td class="px-6 py-4">
               {{$teksSisa}}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                Belum ada member check-in hari ini.
            </td>
        </tr>
    @endforelse
</tbody>
                            </table>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl shadow-lg text-white p-6 relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 bg-gym-600 rounded-full opacity-20 blur-2xl"></div>
                        
                        <h3 class="text-lg font-bold mb-6 relative z-10">Aksi Cepat</h3>
                        
                        <div class="space-y-4 relative z-10">
                            <a href="{{ route('admin.member.index') }}" class="w-full flex items-center p-3 bg-white/10 hover:bg-white/20 rounded-xl transition-all border border-white/5 group">
                                <div class="p-2 bg-gym-600 rounded-lg mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-sm">Tambah Member</p>
                                    <p class="text-xs text-gray-400">Daftarkan anggota baru</p>
                                </div>
                            </a>

                            <a href="{{ route('admin.scan') }}" class="w-full flex items-center p-3 bg-white/10 hover:bg-white/20 rounded-xl transition-all border border-white/5 group">
                                <div class="p-2 bg-blue-600 rounded-lg mr-4 shadow-lg group-hover:scale-110 transition-transform">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                                </div>
                                <div class="text-left">
                                    <p class="font-semibold text-sm">Scan QR Code</p>
                                    <p class="text-xs text-gray-400">Check-in cepat</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

        

            </div>
        </main>
    <script>
    // Set Font Global agar sesuai tema
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#64748b'; // Text gray-500

    // --- 1. CONFIG LINE CHART (Pertumbuhan Member) ---
    const ctxMember = document.getElementById('memberChart').getContext('2d');
    
    // Buat Gradient Merah yang Modern
    let gradientMember = ctxMember.createLinearGradient(0, 0, 0, 400);
    gradientMember.addColorStop(0, 'rgba(225, 29, 72, 0.4)'); // Merah Transparan di atas
    gradientMember.addColorStop(1, 'rgba(225, 29, 72, 0.0)'); // Hilang di bawah

    new Chart(ctxMember, {
        type: 'line',
        data: {
            labels: {!! json_encode($chartMemberLabels) !!},
            datasets: [{
                label: 'Member Baru',
                data: {!! json_encode($chartMemberData) !!},
                borderColor: '#e11d48', // gym-600
                backgroundColor: gradientMember,
                borderWidth: 3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#e11d48',
                pointBorderWidth: 2,
                pointRadius: 6,
                pointHoverRadius: 8,
                fill: true, 
                tension: 0.4 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e293b',
                    padding: 12,
                    cornerRadius: 8,
                    titleFont: { size: 13 },
                    bodyFont: { size: 14, weight: 'bold' },
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' Member';
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#94a3b8' }
                },
                y: {
                    beginAtZero: true,
             
                    ticks: {
                        stepSize: 1, // Paksa lompat per 1 angka
                        callback: function(value) {
                            if (Math.floor(value) === value) {
                                return value; // Hanya tampilkan jika angka bulat
                            }
                        }
                    },
                  
                    grid: { 
                        borderDash: [5, 5],
                        color: '#f1f5f9' 
                    },
                    border: { display: false }
                }
            }
        }
    });

    // --- 2. CONFIG DOUGHNUT CHART (Revenue) ---
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');

    new Chart(ctxRevenue, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($donutLabels) !!},
            datasets: [{
                data: {!! json_encode($donutData) !!},
                backgroundColor: [
                    '#e11d48', // Merah gym-600
                    '#1F2937', // Hitam
                    '#9CA3AF', // Abu-abu
                    '#F59E0B', // Kuning
                    '#10B981'  // Hijau
                ],
                borderWidth: 0,
                hoverOffset: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '80%', 
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e293b',
                    padding: 12,
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(context.raw);
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>
</x-app-layout>

  
