<x-user>
    <section class="max-w-7xl mx-auto px-4 py-10 lg:py-16">

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Berhasil!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Gagal!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
@endif
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-8 lg:p-10 border border-slate-100 relative overflow-hidden ">
                
                <!-- Decorative Elements -->
                <div class="absolute -top-20 -right-20 w-40 h-40 bg-red-500/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-red-500/5 rounded-full blur-3xl"></div>

                <!-- Header -->
              <div class="relative mb-8">
    
    <div class="rounded-2xl overflow-hidden  border-slate-100 mb-6 group relative">
        
        @if($jadwal->program->image)
            <img src="{{ asset('storage/'. $jadwal->program->image) }}" 
                 alt="{{ $jadwal->program->nama }}"
                 class="w-full h-96 lg:h-80 object-cover transform transition-transform duration-700 group-hover:scale-105">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        @else
            <div class="w-full h-64 lg:h-80 bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center">
                <svg class="w-16 h-16 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        @endif
    </div>

    <div class="flex flex-col gap-3">
        <div class="flex items-center gap-2">
            <span class="px-3 py-1 bg-red-100 text-red-600 rounded-full text-xs font-bold uppercase tracking-wide">
                Program Latihan
            </span>
        </div>

        <h1 class="text-3xl lg:text-4xl font-extrabold text-slate-800 leading-tight">
            {{ $jadwal->program->nama }}
        </h1>
    </div>

</div>
                <!-- Info Grid dengan Card Style -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                    <div class="group hover:shadow-md transition-all duration-300 bg-gradient-to-br from-slate-50 to-white p-4 rounded-xl border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Hari</p>
                                <p class="text-sm font-bold text-slate-800"> {{ $jadwal->hari }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="group hover:shadow-md transition-all duration-300 bg-gradient-to-br from-slate-50 to-white p-4 rounded-xl border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Waktu</p>
                                <p class="text-sm font-bold text-slate-800">
                                    {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - 
                                {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="group hover:shadow-md transition-all duration-300 bg-gradient-to-br from-slate-50 to-white p-4 rounded-xl border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Lokasi</p>
                                <p class="text-sm font-bold text-slate-800">{{ $jadwal->ruangan }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="group hover:shadow-md transition-all duration-300 bg-gradient-to-br from-slate-50 to-white p-4 rounded-xl border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Trainer</p>
                                <p class="text-sm font-bold text-slate-800">Coach {{ $jadwal->program->trainer->user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="group hover:shadow-md transition-all duration-300 bg-gradient-to-br from-slate-50 to-white p-4 rounded-xl border border-slate-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center shadow-lg shadow-red-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase tracking-wide">Kapasitas</p>
                                <p class="text-sm font-bold text-slate-800">{{ $jadwal->kuota_maksimal }} Orang</p>
                            </div>
                        </div>
                    </div>

                    <div class="group hover:shadow-md transition-all duration-300 bg-gradient-to-br from-green-50 to-white p-4 rounded-xl border border-green-200">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/20 group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                
                                <p class="text-xs text-green-600 font-semibold uppercase tracking-wide">Status</p>
                                <p class="text-sm font-bold text-green-700">Slot Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi dengan Border Accent -->
                <div class="bg-gradient-to-br from-slate-50 to-white p-6 rounded-xl border-l-4 w- border-red-500 mb-8 min-w-[700px]">
                    <h3 class="text-lg font-bold text-slate-800 mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        Tentang Kelas
                    </h3>
                    <p class="text-slate-700 leading-relaxed mb-4  break-words">
               {{ $jadwal->program->desciption }}
                    </p>
                    
                
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4 flex-wrap">
                 <div class="flex gap-4 flex-wrap">
                    @auth
                         @if($jadwal->status == 'active')
                         <form action="{{ route('booking.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                             <button type="submit" class="group relative bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-4 rounded-xl font-bold hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/40 hover:scale-105 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Daftar Kelas
                    </button>
                         </form>
                   
                    @else
                    <button disabled class="bg-gray-300 text-gray-500 px-8 py-4 rounded-xl font-bold cursor-not-allowed">
                        Pendaftaran Tutup
                    </button>
            
                    @endif
                    @endauth
                    @guest
                      <button disabled class="bg-gray-300 text-gray-500 px-8 py-4 rounded-xl font-bold cursor-not-allowed">
                        Silakan Daftar dulu
                    </button>
                    @endguest
                   
                </div>
            
                </div>
            </div>

            <!-- KANAN : Kelas Lainnya -->
         <aside class="bg-white p-6 rounded-3xl shadow-lg h-fit border border-slate-100">
                <div class="flex items-center gap-2 mb-6 border-b pb-4 border-slate-100">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <h3 class="text-xl font-bold text-slate-800">Kelas Lainnya</h3>
                </div>

                <div class="space-y-4">
                    @foreach($kelasLain as $lain)
                    <a href="{{ route('jadwal.show', $lain->id) }}" class="flex items-center gap-4 p-3 rounded-2xl hover:bg-slate-50 transition group cursor-pointer border border-transparent hover:border-slate-200">
                        <div class="w-14 h-14 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-md
                                    {{ $loop->iteration % 2 == 0 ? 'bg-blue-500' : 'bg-purple-500' }}">
                            {{ substr($lain->program->nama, 0, 2) }}
                        </div>
                        
                        <div class="flex-1">
                            <h4 class="font-bold text-slate-800 text-base group-hover:text-red-600 transition truncate">
                                {{ $lain->program->nama }}
                            </h4>
                            <div class="flex items-center gap-2 text-sm text-slate-500 mt-1">
                                <span>{{ $lain->hari }}</span>
                                <span class="w-1 h-1 bg-slate-300 rounded-full"></span>
                                <span>{{ \Carbon\Carbon::parse($lain->jam_mulai)->format('H:i') }}</span>
                            </div>
                        </div>

                        <div class="text-slate-300 group-hover:text-red-500 group-hover:translate-x-1 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                    <a href="{{ route('jadwal.index') }}" class="text-red-600 font-bold hover:text-red-700 text-sm flex items-center justify-center gap-1 transition">
                        Lihat Semua Kelas
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </aside>

        </div>

        <!-- Back -->
     

    </section>
</x-user>
