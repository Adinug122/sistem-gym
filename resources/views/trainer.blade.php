<x-traineer>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-red-500 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="relative z-10">
                    <h2 class="text-3xl font-bold mb-2">
                        Halo, Coach!  </h2>
                    <p class="text-slate-300">
                        Semangat melatih! Ada <span class="font-bold text-white text-lg">{{ $classHariIni }}</span> kelas dijadwalkan hari ini.
                    </p>
                </div>
                <div class="absolute right-0 top-0 w-64 h-64 bg-white opacity-5 rounded-full -mr-16 -mt-16 pointer-events-none"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Sesi Hari Ini</p>
                        <h3 class="text-2xl font-bold text-slate-800">{{ $classHariIni }}</h3> 
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4">
                    <div class="p-3 bg-green-100 text-green-600 rounded-lg">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm font-medium">Total Peserta</p>
                        <h3 class="text-2xl font-bold text-slate-800">{{ $totalPeserta }}</h3>
                    </div>
                </div>

                <a href="" class="group bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex items-center gap-4 hover:border-red-500 transition cursor-pointer">
                    <div class="p-3 bg-red-100 text-red-600 rounded-lg group-hover:bg-red-600 group-hover:text-white transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm font-medium group-hover:text-red-600">Action</p>
                        <h3 class="text-lg font-bold text-slate-800">Buat Jadwal Baru</h3>
                    </div>
                </a>

            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50">
                    <h3 class="font-bold text-slate-800">Agenda Latihan Hari Ini</h3>
                </div>

              
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-white text-slate-500 border-b">
                        <tr>
                            <th class="px-6 py-3 font-bold">Jam</th>
                            <th class="px-6 py-3 font-bold">Program Latihan</th>
                            <th class="px-6 py-3 font-bold text-center">Kuota</th>
                            <th class="px-6 py-3 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                          @foreach ($class as $item)
                  
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-mono font-medium text-slate-800">
                             {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}  - 
                             {{\Carbon\Carbon::parse( $item->jam_selesai)->format('H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-semibold text-red-600 block text-base">{{ $item->program->nama }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs font-bold">
                                 {{ $item->bookings->count() }} / {{ $item->kuota_maksimal }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end">
                                    <a href="{{ route('peserta',$item->id) }}" class="text-gym-600 p-2 rounded-lg bg-red-100 hover:text-gym-900 transition-colors" title="Edit Data">
 <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
</a>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                </table>
                
            
                </div>

        </div>
    </div>
</x-traineer>