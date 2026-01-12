<x-user>
@php
       $hariAdaJadwal = $jadwal->pluck('hari')->unique()->values()->all();
@endphp
    <section x-data="{ 
        activeDay: '{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd') }}',
        scheduledDays: {{ json_encode($hariAdaJadwal) }} 
    }" class="py-24 bg-gray-50 relative overflow-hidden">
    
    <div class="absolute top-0 right-0 -translate-y-1/2 translate-x-1/2 w-[600px] h-[600px] bg-red-100/60 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/2 -translate-x-1/2 w-[400px] h-[400px] bg-red-50/40 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight mb-4">
                Jadwal Latihan Minggu Ini
            </h2>
            <p class="text-slate-600 text-lg max-w-2xl mx-auto">
                Jangan biarkan alasan menghalangimu. Cek jadwal, booking kelasmu, dan mulailah berkeringat.
            </p>
        </div>

        <div class="flex flex-wrap justify-center gap-3 mb-12 overflow-x-auto pb-4 no-scrollbar">
            @php
         
                $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                
            @endphp
          

            @foreach($days as $day)
                <button 
                    @click="activeDay = '{{ $day }}'"
                 
                    :class="activeDay === '{{ $day }}' ? 'bg-red-600 text-white border-red-600 shadow-md shadow-red-200' : 'bg-white text-slate-500 border-slate-200 hover:border-red-500 hover:text-red-600'"
                    class="px-6 py-2.5 rounded-full border text-sm md:text-base font-bold transition-all duration-300 transform hover:-translate-y-1 shadow-sm">
                    {{ $day }}
                </button>
            @endforeach
        </div>

        <div class="space-y-4 max-w-4xl mx-auto min-h-[400px]">
            
            @forelse($jadwal as $item)
                <div x-show="activeDay === '{{ $item->hari }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="group relative bg-white border border-slate-200 rounded-2xl p-6 transition-all duration-300 shadow-sm hover:shadow-lg hover:shadow-red-100/50 hover:border-red-500">
                    
                    <div class="absolute left-0 top-0 bottom-0 w-1.5 bg-red-600 rounded-l-2xl opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <div class="flex flex-col md:flex-row items-center gap-6 pl-2">
                        
                        <div class="flex flex-col items-center md:items-start min-w-[100px]">
                            <span class="text-3xl font-black text-slate-900 font-mono tracking-tighter leading-none">
                                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }}
                            </span>
                            <span class="text-sm text-slate-500 font-bold uppercase tracking-wide mt-1">
                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }} Selesai
                            </span>
                        </div>

                        <div class="flex-1 text-center md:text-left border-l border-slate-100 md:pl-6">
                            <h3 class="text-xl font-extrabold text-slate-900 group-hover:text-red-600 transition-colors mb-2 leading-tight">
                                {{ $item->program->nama }}
                            </h3>
                            
                            <div class="flex items-center justify-center md:justify-start gap-3">
                                <div class="w-9 h-9 rounded-full bg-slate-100 overflow-hidden border-2 border-white shadow-sm">
                                    {{-- Logika foto trainer tetap sama --}}
                                    @if($item->program->trainer->user->profile_photo_path ?? false)
                                        <img src="{{ asset('storage/' . $item->program->trainer->user->profile_photo_path) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-xs font-bold text-slate-400 bg-slate-200">
                                            {{ substr($item->program->trainer->user->name ?? 'T', 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <span class="text-slate-600 text-sm font-medium">
                                    Coach <span class="text-slate-900 font-bold">{{ $item->program->trainer->user->name ?? 'Instruktur' }}</span>
                                </span>
                            </div>
                        </div>

                        <div class="mt-5 md:mt-0 w-full md:w-auto">
                            @php
                                $isFull = ($item->bookings_count ?? 0) >= $item->kuota_maksimal;
                            @endphp

                            @if($isFull)
                                <button disabled class="w-full md:w-auto px-6 py-3 rounded-xl bg-slate-100 text-slate-400 font-bold cursor-not-allowed border border-slate-200">
                                    Kelas Penuh
                                </button>
                            @else
                                <a href="{{ route('jadwal.show', $item->id) }}" class="inline-flex justify-center items-center w-full md:w-auto px-8 py-3 rounded-xl bg-slate-900 text-white font-bold shadow-md hover:bg-red-600 transition-all duration-300 group-hover:shadow-red-200 hover:-translate-y-1">
                                    Booking
                                    <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                    <svg class="w-12 h-12 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="text-slate-500 text-lg font-medium">Belum ada jadwal untuk hari ini.</p>
                    <p class="text-slate-400 text-sm mt-2">Coba cek hari lain.</p>
                </div>
            @endforelse

            <div x-show="!scheduledDays.includes(activeDay)" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 class="text-center py-16 bg-white rounded-2xl border-2 border-dashed border-slate-200">
                
                <div class="bg-slate-50 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                
                <p class="text-slate-900 text-lg font-bold">Tidak ada jadwal <span x-text="activeDay"></span></p>
                <p class="text-slate-500 text-sm mt-1">Silakan pilih hari lain untuk latihan.</p>
            </div>
            </div>
     
    </div>
</section>
<x-footer></x-footer>
</x-user>