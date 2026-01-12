<x-member>
            <div class="p-4 md:p-bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl p-6 mb-8  text-white relative overflow-hidden8">
                <div class="bg-gradient-to-r from-red-500 to-orange-500 rounded-2xl p-6 mb-8 shadow-lg text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                
                    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 relative z-10">
                        <div>
                            <p class="text-red-100 text-sm mb-1 font-medium">Status Membership</p>
                            <h3 class="text-3xl font-bold mb-2">{{ $status }}</h3>
                            @if ($status === 'active' )
                            <p class="text-red-100 text-sm md:text-base">Berlaku hingga {{ $end }} • <span class="bg-white bg-opacity-20 px-2 py-0.5 rounded font-bold">{{ $sisaHari }} hari lagi</span></p>
                            <p class="text-red-100 text-sm mt-3">Kamu punya total {{ $totalPaket }} Paket yang aktif  </p>
                            @else
                            <p class="text-red-100 text-sm md:text-base">Silakan beli dulu yaaa</p>
                            <p class="text-red-100 text-sm mt-3">Kamu tidak punya Paket yang aktif  </p>
                            @endif
                        
                        </div>
                        <button @click="modal = true" class="w-full md:w-auto bg-white text-red-500 px-6 py-3 rounded-lg font-bold shadow-md hover:bg-gray-50 hover:scale-105 transition-all transform">
                            Lihat Paket
                        </button>
                    </div>

                </div>
</div>

<div class="flex justify-center items-center">
    <div class="bg-white shadow-lg rounded-lg px-5 pt-5 pb-2">
        {{ $test }}
          <a href="#" class="inline-flex mt-4 items-center text-xs font-normal text-gray-500 ">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 4.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                     Scan ini ke admin untuk absen
       </a>
    </div>
</div>

<!-- Main modal -->


           
        </main>
    </div>
<div x-show="modal"
     style="display: none;"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform scale-90"
     x-transition:enter-end="opacity-100 transform scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform scale-100"
     x-transition:leave-end="opacity-0 transform scale-90"
     @click.self="modal = false"
     class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-60 backdrop-blur-sm overflow-y-auto overflow-x-hidden p-4">

    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white border border-gray-200 rounded-xl shadow-2xl">
            
            <div class="flex items-center justify-between p-4 border-b border-gray-100 md:p-5">
                <h3 class="text-lg font-bold text-gray-900">
                    Daftar Paket
                </h3>
                
                <button @click="modal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <div class="p-4 md:p-5">
              
            
    @php
  $paket = $membership->filter(function($item){
    return in_array($item->status, ['active','schedule']);
  })
@endphp
<p class="text-sm font-normal text-gray-500 mb-4">Berikut Keterangan paket anda</p>
                @forelse ($paket as $item)
               
                @php $hasActive = true;  @endphp
                <ul class="space-y-3">
             <li>
                <div class="flex items-center justify-between p-3 rounded-lg border border-gray-200 bg-white shadow-sm hover:shadow-md transition">
                    
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center 
                            {{ $item->status == 'active' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                            
                            @if($item->status == 'active')
                                <i class="fas fa-bolt"></i> @else
                                <i class="fas fa-hourglass-half"></i> @endif
                        </div>

                        <div>
                            <p class="text-sm font-bold text-gray-900">
                                {{ $item->paket->nama ?? 'Paket Unknown' }}
                            </p> 
                            
                            <p class="text-xs text-gray-500">
                                @if($item->status == 'active')
                                    Berakhir: {{ \Carbon\Carbon::parse($item->end)->format('d M Y') }}
                                @else
                                    Mulai: {{ \Carbon\Carbon::parse($item->start)->format('d M Y') }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div>
                        @if($item->status == 'active')
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400">
                                Active
                            </span>
                        @elseif( $item->status == 'schedule')
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded border border-orange-400">
                                Antre
                            </span>
                            @else
                            <span class="bg-orange-100 text-orange-800 text-xs font-medium px-2.5 py-0.5 rounded border border-orange-400">
                                Habis
                            </span>

                        @endif
                    </div>

                </div>
            </li>
            @empty
            <li>
                <div class="text-center py-4">
                    <p class="text-red-600 font-medium">Kamu tidak punya paket apapun.</p>
                    <p class="text-gray-400 text-xs">Silakan beli paket membership baru.</p>
                </div>
            </li>
        @endforelse    
                        </ul>             
   
                

                
                <div class="mt-4">
                    <a href="#" class="inline-flex items-center text-xs font-normal text-gray-500 hover:underline">
                        <svg class="w-3 h-3 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.529 7.988a2.502 2.502 0 0 1 5 .191A2.441 2.441 0 0 1 10 10.582V12m-.01 4.008H10M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                     Syarat & Ketentuan Berlaku
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open Sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                // Close Sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>

</x-member>