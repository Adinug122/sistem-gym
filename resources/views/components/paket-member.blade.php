<section class="pt-10  pb-10">
    <div class="text-center pb-10">
        <h2 class="text-gym-600 text-4xl font-bold ">Paket Member</h2>
        <p class="text-lg">Pilih Paket Member sesuai seleramu dan rasakan benerfitnya</p>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 mt-10">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
    @foreach($paket as $item)
        @php
            // Logika Warna tetap bisa dipakai
            $isPopular = $item->nama == 'Gold';
            $cardClass = $isPopular ? "bg-gradient-to-br from-red-500 to-red-800 scale-110 text-white" : "bg-white text-gray-900 border shadow-lg";
            $checkColor = $isPopular ? "text-white" : "text-red-600";
        @endphp

        <div class="relative rounded-2xl p-8 border flex flex-col h-full {{ $cardClass }}">
            
            <h3 class="text-2xl font-bold">{{ $item->nama }}</h3>
            
            <div class="mb-8 mt-4">
                 <span class="text-4xl font-extrabold">
                    Rp {{ number_format($item->harga / 1000, 0) }}k
                </span>
                 <span class="text-sm">/ {{ $item->durasi_angka }} {{ $item->durasi_satuan }}</span>
            </div>

            <ul class="space-y-4 mb-8 flex-1">
                {{-- Cek apakah ada benefits di database --}}
                @if($item->benefits) 
                    @foreach($item->benefits as $fitur)
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 {{ $checkColor }} shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span class="text-sm font-medium">{{ $fitur }}</span>
                        </li>
                    @endforeach
                @else
                    <li class="text-sm opacity-50 italic">Belum ada benefit diinput.</li>
                @endif
            </ul>
            @auth
            <form action="{{ route('membership.store') }}" method="POST">
                @csrf
                  <input type="hidden" name="paket_id" value="{{ $item->id }}">
                <button type="submit" class="w-full py-3 relative group rounded-xl font-bold bg-gray-900 text-white">
                    <div class="absolute inset-0  group-hover:bg-red-700 rounded-xl shadow-lg scale-x-0 transform origin-left transition-transform  group-hover:scale-x-100 duration-300  "></div>
                    <span class=" relative group-hover:{{ $checkColor }} duration-300 transition-colors z-10"> Pilih {{ $item->nama }}</span> 
                </button>
            </form>
            @else
             <button onclick="alert('daftar dulu woy')" class="w-full py-3 relative group rounded-xl font-bold bg-gray-900 text-white">
                    <div class="absolute inset-0  group-hover:bg-red-700 rounded-xl shadow-lg scale-x-0 transform origin-left transition-transform  group-hover:scale-x-100 duration-300  "></div>
                    <span class=" relative group-hover:{{ $checkColor }} duration-300 transition-colors z-10"> Pilih {{ $item->nama }}</span> 
                </button>
            @endauth

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