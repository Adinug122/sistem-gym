<x-user>
    <section class="py-24 bg-white">
    <div class="max-w-3xl mx-auto text-center pb-16 px-4">
        <h2 class="text-slate-900 text-4xl font-extrabold tracking-tight mb-4">
            Investasi Terbaik untuk Tubuhmu
        </h2>
        <p class="text-lg text-slate-500">
            Tidak ada komitmen ribet. Pilih durasi yang kamu butuhkan dan nikmati akses penuh ke semua fasilitas Iron Gym.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @foreach($paket as $item)
                <div class="group relative bg-white rounded-3xl shadow-xl hover:shadow-2xl border border-slate-200 transition-all duration-300 hover:-translate-y-2 flex flex-col h-full overflow-hidden">
                    
                    <div class="h-2 w-full bg-red-600"></div>

                    <div class="p-8 flex-1 flex flex-col">
                        
                        <div class="mb-6">
                            <h3 class="text-2xl font-bold text-slate-900 group-hover:text-red-600 transition-colors">
                                {{ $item->nama }}
                            </h3>
                            <p class="text-sm text-slate-500 mt-2">
                                Paket all-access tanpa batasan waktu latihan.
                            </p>
                        </div>

                        <div class="flex items-end mb-8">
                            <span class="text-4xl font-extrabold text-slate-900 tracking-tight">
                                Rp {{ number_format($item->harga / 1000, 0) }}k
                            </span>
                            <span class="text-slate-500 font-medium ml-1 mb-1">
                                / {{ $item->durasi_angka }} {{ $item->durasi_satuan }}
                            </span>
                        </div>

                        <div class="w-full border-b border-slate-100 mb-8"></div>

                        <div class="flex-1">
                            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-4">
                                YANG KAMU DAPATKAN:
                            </p>
                            <ul class="space-y-4 mb-8">
                                @if($item->benefits) 
                                    @foreach($item->benefits as $fitur)
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                            <span class="ml-3 text-slate-700 text-sm font-medium">{{ $fitur }}</span>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="ml-3 text-slate-700 text-sm font-medium">Akses Gym & Alat Kardio</span>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="ml-3 text-slate-700 text-sm font-medium">Free WiFi & Locker</span>
                                    </li>
                                    <li class="flex items-start">
                                        <div class="flex-shrink-0 w-6 h-6 rounded-full bg-green-100 flex items-center justify-center mt-0.5">
                                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                        </div>
                                        <span class="ml-3 text-slate-700 text-sm font-medium">Konsultasi Pelatih Awal</span>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <div class="mt-auto">
                            @auth
                                <form action="{{ route('membership.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="paket_id" value="{{ $item->id }}">
                                    <button type="submit" class="w-full py-4 rounded-xl font-bold text-white bg-slate-900 hover:bg-red-600 transition-colors duration-300 shadow-lg flex justify-center items-center group-hover:shadow-red-500/30">
                                        Pilih Paket 
                                    
                                    </button>
                                </form>
                            @else
                                <button onclick="location.href='{{ route('login') }}'" class="w-full py-4 rounded-xl font-bold text-white bg-slate-900 hover:bg-slate-800 transition-colors duration-300 shadow-lg">
                                    Masuk untuk Membeli
                                </button>
                            @endauth
                            
                            <p class="text-center text-xs text-slate-400 mt-4 flex justify-center items-center gap-1">
                                <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Pembayaran Aman & Instan
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-20 border-t border-slate-200 pt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Akses Fleksibel</h3>
                    <p class="mt-2 text-sm text-slate-500">Buka setiap hari dari jam 06:00 - 22:00. Latihan kapanpun kamu sempat.</p>
                </div>
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Peralatan Premium</h3>
                    <p class="mt-2 text-sm text-slate-500">Menggunakan alat standar internasional yang terawat dan aman.</p>
                </div>
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900">Komunitas Positif</h3>
                    <p class="mt-2 text-sm text-slate-500">Lingkungan yang mendukung untuk pemula maupun profesional.</p>
                </div>
            </div>
        </div>

    </div>
</section>
<x-footer></x-footer>
</x-user>