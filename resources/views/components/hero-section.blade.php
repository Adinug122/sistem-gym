
    <section class="relative h-[600px] flex items-center mb-10 overflow-hidden">
        <button x-show="!open" x-transition.opacity @click="open = !open"
            class="absolute top-5 left-5 z-50 md:hidden text-white hover:text-red-600 transition p-2">
            <svg class="w-8 h-8 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>


        </button>


        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/background.jpg') }}" class="w-full h-full object-cover" alt="Gym Background">

            <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/60 to-black/30"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <div class="text-left">

                    <div
                        class="inline-block mb-6 px-4 py-1 rounded-full border border-gray-500 bg-white/10 backdrop-blur-sm">
                        <span class="text-white text-sm font-medium tracking-wide">Gym Terbaik </span>
                    </div>

                    <h1
                        class="text-3xl md:text-5xl font-extrabold text-white tracking-tight leading-tight mb-6 drop-shadow-lg">
                        Ubah Bentuk Tubuhmu <br>
                        <span class>
                            Demi Masa Depanmu
                        </span>
                    </h1>

                    <p class="text-gray-300  md:text-base mb-10 max-w-lg leading-relaxed">
                        Bergabunglah bersama komunitas kami untuk program diet, workout intensif, dan capai badan
                        idealmu.
                        Mulai dari <span
                            class="text-white font-bold text-xl underline decoration-gym-600  underline-offset-4"> Rp
                            100rb</span>.
                    </p>

                    <div class="flex flex-col sm:flex-row items-start gap-4">
                        <a href="{{ route('register') }}"
                            class="group relative px-6 py-3 text-sm sm:px-4 sm:py-3 md:px-6 md:py-5 lg:px-8 lg:py-4 bg-red-600 text-white font-bold md:text-lg rounded-full overflow-hidden shadow-lg shadow-red-600/30 transition-all  hover:shadow-red-600/50">
                            <span class="relative z-10">GABUNG SEKARANG</span>
                            <div
                                class="absolute inset-0 h-full w-full scale-0 rounded-full transition-all duration-300 group-hover:scale-100 group-hover:bg-red-700/50">
                            </div>
                        </a>

                        <a href="#jadwal"
                            class="px-8 py-4 text-white font-semibold hover:text-red-400 transition-colors flex items-center">
                            Lihat Jadwal &rarr;
                        </a>
                    </div>
                </div>

                <div class="hidden lg:block">

                </div>

            </div>
        </div>

        {{-- <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div> --}}

    </section>
