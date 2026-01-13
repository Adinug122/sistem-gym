<section class="pt-10  pb-10">
    <div class="text-center pb-10">
        <h2 class="text-gym-600 text-4xl font-bold ">Paket Member</h2>
        <p class="text-lg">Pilih Paket Member sesuai seleramu dan rasakan benerfitnya</p>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 mt-10">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
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
                {{-- card kedua --}}
                {{-- <div class="relative bg-gradient-to-br from-red-500 to-red-800 rounded-lg shadow-lg border border-1 scale-110 border-gray-200">
                  <div class="flex justify-center items-center">
                      <div class="bg-yellow-400 absolute flex justify-center w-[30%] text-sm p-2 text-slate-700 rounded-lg">
                          Paling Populer
                      </div>
                  </div>
                    <div class="text-left p-10 text-white">
                        <h2 class="text-xl">Gold</h2>
                        <p class="text-lg">Aman di kantong pastinya</p>
                    </div>
                    <div class="max-w-[80%] mx-auto ">
                        <div class="flex flex-col gap-4">
                                <div class="bg-red-400 flex justify-between rounded-lg p-4 text-white">
                            <div>
                                Harian
                            </div>
                            <div>
                                Rp. 25.000
                            </div>
                    </div>
                         <div class="bg-red-400 flex justify-between rounded-lg p-4 text-white">
                            <div>
                                Bulanan
                            </div>
                            <div>
                                Rp. 200.000
                            </div>
                    </div>
                         <div class="bg-red-400 flex justify-between rounded-lg p-4 text-white">
                            <div>
                                Tahunan
                            </div>
                            <div>
                                Rp. 2000.000
                            </div>
                    </div>
                    <div class="flex gap-5 text-white">
                        <div class="rounded-full w-10 h-10 flex justify-center items-center bg-[#FFE2E2] text-gym-500">
    <svg class="w-6 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
            </g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                        <div class="flex justify-center items-center">
                            Akses gym standar
                        </div>
                    </div>
                    <div class="flex gap-5 text-white">
                        <div class="rounded-full w-10 h-10 flex justify-center items-center bg-[#FFE2E2] text-gym-500">
    <svg class="w-6 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
            </g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                        <div class="flex justify-center items-center">
                            Akses gym standar
                        </div>
                    </div>
                    <div class="flex gap-5 text-white">
                        <div class="rounded-full w-10 h-10 flex justify-center items-center bg-[#FFE2E2] text-gym-500">
    <svg class="w-6 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
            </g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                        <div class="flex justify-center items-center">
                            Akses gym standar
                        </div>
                    </div>

                    <button class="bg-white text-gym-600 border border-1 border-gym-600 px-4 py-2 w-80%  mb-10">
                        Pilih Paket
                     </button>
                        </div>
                     
                    </div>
                   
                </div>
                <div class="bg-white rounded-lg shadow-lg border border-1 border-gray-200">
                    <div class="text-left p-10 text-black">
                        <h2 class="text-xl">Silver</h2>
                        <p class="text-lg">Cocok untuk Pemula</p>
                    </div>
                    <div class="max-w-[80%] mx-auto ">
                        <div class="flex flex-col gap-4">
                                <div class="bg-gray-100 flex justify-between rounded-lg p-4">
                            <div>
                                Harian
                            </div>
                            <div>
                                Rp. 25.000
                            </div>
                    </div>
                         <div class="bg-gray-100 flex justify-between rounded-lg p-4">
                            <div>
                                Bulanan
                            </div>
                            <div>
                                Rp. 200.000
                            </div>
                    </div>
                         <div class="bg-gray-100 flex justify-between rounded-lg p-4">
                            <div>
                                Tahunan
                            </div>
                            <div>
                                Rp. 2000.000
                            </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="rounded-full w-10 h-10 flex justify-center items-center bg-[#FFE2E2] text-gym-500">
    <svg class="w-6 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
            </g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                        <div class="flex justify-center items-center">
                            Akses gym standar
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="rounded-full w-10 h-10 flex justify-center items-center bg-[#FFE2E2] text-gym-500">
    <svg class="w-6 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
            </g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                        <div class="flex justify-center items-center">
                            Akses gym standar
                        </div>
                    </div>
                    <div class="flex gap-5">
                        <div class="rounded-full w-10 h-10 flex justify-center items-center bg-[#FFE2E2] text-gym-500">
    <svg class="w-6 h-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
            </g><g id="SVGRepo_iconCarrier"> <path d="M4 12.6111L8.92308 17.5L20 6.5"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                        </div>
                        <div class="flex justify-center items-center">
                            Akses gym standar
                        </div>
                    </div>

                    <button class="bg-gym-600 px-4 py-2 w-80% text-white mb-10">
                        Pilih Paket
                     </button>
                        </div>
                     
                    </div>
                   
                </div> --}}
            </div>
        </div>
    
</section>
<div class="white h-16">
</div>

