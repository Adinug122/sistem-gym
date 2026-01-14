   @props(['jadwal'])
   <section class="relative w-full h-[650px] mt-20 flex items-center">
            
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/backgroubd2.jpg') }}" alt="" class="w-full h-full  object-cover">
            <div class="absolute inset-0 bg-black/30"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="text-left">

                  
                    <h1
                        class="text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-6 drop-shadow-lg">
                       Berlatih Lebih Cerdas<br>
                        <span class>
                          Bersama Ahlinya 
                        </span>
                    </h1>

                    <p class="text-gray-300  md:text-base mb-10 max-w-lg leading-relaxed">
                        Dapatkan bimbingan intensif dari pelatih profesional untuk memastikan teknik yang tepat, aman, dan hasil yang maksimal. 
                    </p>

                    <div class="flex flex-col sm:flex-row items-start gap-4">
                        <a href="{{ route('daftar.trainer') }}"
                            class="group relative px-6 py-3 text-sm sm:px-4 sm:py-3 md:px-6 md:py-5 lg:px-8 lg:py-4 bg-red-600 text-white font-bold md:text-lg rounded-md overflow-hidden shadow-lg shadow-red-600/30 transition-all  hover:shadow-red-600/50">
                            <span class="relative z-10">Cari Personal Trainer</span>
                            <div
                                class="absolute inset-0 h-full w-full scale-0 rounded-full transition-all duration-300 group-hover:scale-100 group-hover:bg-red-700/50">
                            </div>
                        </a>

                    </div>
                </div>

                <div class="hidden lg:block">
                 
                </div>

            </div>
        </div>
    </section>

<section class="py-20 bg-white">
    
    <div class="text-center mb-12 ">
        <h2 class="text-3xl md:text-4xl font-black text-gray-900 ">
          Kelas Fitnes Standar Dunia Setiap Hari
        </h2>
        <p class="mt-4 text-gym-500 text-lg">Pilih kelas yang paling membuat Anda penasaran untuk memulai!</p>
    </div>

    <div class="relative w-full max-w-7xl mx-auto px-4">
        
        <div class="swiper mySwiper !pb-12">
             <div class="swiper-wrapper items-center">
               @foreach ($jadwal as $item)
                 
               <div class="swiper-slide transition-all duration-300 ease-out">
                  <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                      <div class="relative h-[300px] w-full">
                      @if($item->program->image)
                            <img src="{{ asset('storage/'. $item->program->image) }}" class="w-full h-full object-cover">
                        @else
                            {{-- Gambar placeholder kalau admin lupa upload --}}
                            <div class="flex items-center justify-center h-full text-gray-400">No Image</div>
                        @endif
                          <div class="absolute bottom-4 left-0 w-full text-center text-white font-bold text-xl drop-shadow-md">
                           {{ $item->program->trainer->user->name ?? 'Tim Gym' }}
                          </div>
                      </div>
                      <div class="p-6 text-center border-t">
                          <h3 class="text-2xl font-bold text-gray-900 uppercase">{{ $item->program->nama }}</h3>
                   <a href="{{ route('jadwal.show', $item->id) }}" class="text-gray-500 hover:text-red-600 font-medium text-sm mt-2 block">
        View class
    </a>
                      </div>
                  </div>
              </div>
               @endforeach

            </div>
        </div>

        <div class="swiper-button-prev !w-12 !h-12 !bg-white !text-gray-800 !shadow-md !rounded-none hover:!bg-red-600 hover:!text-white after:!text-lg"></div>
        <div class="swiper-button-next !w-12 !h-12 !bg-white !text-gray-800 !shadow-md !rounded-none hover:!bg-red-600 hover:!text-white after:!text-lg"></div>

    </div>
</section>