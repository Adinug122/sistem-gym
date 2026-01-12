<x-member>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 flex justify-between items-end">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Jadwal Saya</h2>
                    <p class="text-slate-500">Daftar kelas yang sudah kamu booking.</p>
                </div>
                <a href="{{ url('/jadwal') }}" class="text-white bg-red-500 px-3 py-2 rounded-2xl hover:text-gym-800 font-semibold text-sm">
                     Cari Kelas Lain
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($booking as $item)
                     <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-lg transition duration-300 relative group">
                    
                    <div class="absolute left-0 top-0 bottom-0 w-1 bg-gym-500 group-hover:bg-gym-600 transition"></div>

                    <div class="p-5 pl-7">
                        
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-bold text-lg text-slate-800">
                                   {{$item->jadwal->program->nama}}
                                </h3>
                                <p class="text-sm text-slate-500">
                                    Coach {{ $item->jadwal->program->trainer->user->name }}
                                </p>
                            </div>
                            
                            <span class="bg-slate-100 text-slate-600 text-xs font-bold px-2 py-1 rounded uppercase tracking-wide">
                              {{ $item->jadwal->hari }}
                            </span>
                        </div>

                        <div class="h-px bg-slate-100 my-3"></div>

                        <div class="flex items-center gap-2 text-slate-700 mb-4">
                            <svg class="w-5 h-5 text-gym-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            
                          <span class="font-mono font-medium">
                            {{ \Carbon\Carbon::parse($item->jadwal->jam_mulai)->format('H:i') }} - 
                            {{ \Carbon\Carbon::parse($item->jadwal->jam_selesai)->format('H:i') }} WIB
                        </span>
                        </div>

                        <div class="flex justify-between items-center text-xs">
                            <span class="px-2 py-1 rounded-md bg-green-100 text-green-700 font-bold">
                                Terdaftar 
                            </span>
                            <span class="text-slate-400">
                                Dipesan: 12 Jan 2026
                            </span>
                        </div>

                    </div>
                </div> 
                @empty
                    
                @endforelse
              
                </div>
        </div>
    </div>
</x-member>