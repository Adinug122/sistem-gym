<x-user>

<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-96 h-96 bg-red-50 rounded-full blur-3xl opacity-50 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-4">
                Tim Pelatih <span class="text-red-600">Profesional</span>
            </h2>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">
                Bukan sekadar mendampingi, tapi membentuk mental dan fisikmu. Pilih mentor yang sesuai dengan target spesifikmu.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
            @forelse ($trainer as $item)
            <div class="group relative bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl hover:shadow-red-900/10 transition-all duration-500 transform hover:-translate-y-2 border border-slate-100">
                
                <div class="relative h-[420px] w-full overflow-hidden bg-slate-200">
                    @if($item->user->avatar)
                        <img src="{{ asset('storage/'.$item->user->avatar) }}" 
                             alt="{{ $item->user->name }}" 
                             class="h-full w-full object-cover object-top transition-transform duration-700 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->user->name) }}&background=1f2937&color=fff&size=512" 
                             class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-90 group-hover:opacity-80 transition-opacity"></div>

                

                    <div class="absolute bottom-0 left-0 w-full p-6 translate-y-2 group-hover:translate-y-0 transition-transform duration-500">
                        
                        <h3 class="text-2xl font-black text-white uppercase tracking-wider mb-1">
                            {{ Str::limit($item->user->name, 15) }}
                        </h3>
                        
                        <p class="text-red-500 font-bold text-sm tracking-widest uppercase mb-4 border-l-2 border-red-500 pl-2">
                            {{ $item->specialis }}
                        </p>

                        <div class="flex items-center gap-3 mb-4">
                            @if ($item->status == 'active')
                                <span class="flex h-3 w-3 relative">
                                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                  <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                                </span>
                                <span class="text-xs font-bold text-green-400 tracking-wider">Aktif</span>
                            @else
                                <span class="flex h-3 w-3 relative">
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-gray-500"></span>
                                </span>
                                <span class="text-xs font-bold text-gray-400 tracking-wider">Sibuk / Libur</span>
                            @endif
                        </div>
                        
                        <div class="h-0 opacity-0 group-hover:h-auto group-hover:opacity-100 transition-all duration-500 overflow-hidden">
                            <a href="#" class="block w-full py-3 bg-white text-slate-900 font-bold text-center uppercase text-sm rounded hover:bg-red-600 hover:text-white transition-colors">
                                Lihat Profil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-span-4 text-center py-12 border-2 border-dashed border-slate-200 rounded-2xl">
                    <p class="text-slate-400">Belum ada data trainer.</p>
                </div>
            @endforelse
        </div>

        <div class="border-t border-slate-100 pt-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                
                <div class="px-4">
                    <div class="w-14 h-14 mx-auto bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mb-4 transform rotate-3 hover:rotate-6 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Program Personal</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Latihan dirancang khusus menyesuaikan bentuk tubuh, riwayat cedera, dan target spesifik Anda.
                    </p>
                </div>

                <div class="px-4 border-l-0 md:border-l border-slate-100">
                    <div class="w-14 h-14 mx-auto bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mb-4 transform -rotate-3 hover:-rotate-6 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Teknik Aman & Tepat</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Hindari risiko cedera fatal dengan koreksi postur langsung dari ahli bersertifikat.
                    </p>
                </div>

                <div class="px-4 border-l-0 md:border-l border-slate-100">
                    <div class="w-14 h-14 mx-auto bg-red-100 rounded-2xl flex items-center justify-center text-red-600 mb-4 transform rotate-3 hover:rotate-6 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-2">Hasil Lebih Cepat</h4>
                    <p class="text-sm text-slate-500 leading-relaxed">
                        Tanpa <i>trial & error</i>. Metode latihan yang efisien menghemat waktu Anda untuk mencapai hasil.
                    </p>
                </div>

            </div>
            
         
        </div>

    </div>
</section>

<x-footer></x-footer>
</x-user>