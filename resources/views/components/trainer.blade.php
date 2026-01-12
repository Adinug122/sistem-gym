@props(['trainer'])
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900  tracking-tight">
                Pelatih <span class="text-red-600">Profesional</span>
            </h2>
            <p class="mt-4 text-gray-500 max-w-2xl mx-auto text-lg">
                Dibimbing langsung oleh para ahli bersertifikat yang siap membantu mencapai target tubuh impianmu.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($trainer as $item)
            <div class="group relative">
                <div class="relative h-[400px] w-full overflow-hidden rounded-2xl bg-gray-100 shadow-lg">
                    <img src="{{ asset('storage/'.$item->user->avatar) }} " 
                         alt="{{ $item->user->name }}" 
                         class="h-full w-full object-cover object-center transition-all duration-500 group-hover:scale-110 filter grayscale group-hover:grayscale-0">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-transparent to-transparent opacity-80"></div>

                    <div class="absolute bottom-0 left-0 w-full p-6 text-white translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        <h3 class="text-xl font-bold uppercase">{{ $item->user->name }}</h3>
                        <p class="text-red-500 font-semibold text-sm mb-2">{{ $item->specialis }}</p>
                        
                        <div class="flex gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100 mt-3">
                        <span class="text-xs text-gray-300">@if ($item->status == 'active')
                            Trainer Aktif
                        @else
                            Trainer Libur / tidak Active
                        @endif</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <span class="text-xs text-gray-300">
                    Belum ada Trainer 
                </span>
            @endforelse

           
        </div>

        <div class="text-center mt-12">
            <a href="#" class="inline-block border-2 border-gray-900 hover:border-red-600 text-gray-900 font-bold py-3 px-8  group relative hover:text-white transition-colors duration-300">
               <div class="absolute inset-0 w-full h-full bg-red-600 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></div>
                <span class="group-hover:text-white z-10 relative transform transition-colors duration-300">Lihat Semua Pelatih</span>
            </a>
        </div>

    </div>
</section>