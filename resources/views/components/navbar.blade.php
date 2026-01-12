
<nav class="top-0 left-0 hidden md:flex item-center justify-between relative">
   
    <div >
        <img src="{{ asset('img/logo 2.png') }}" alt="" class="absolute ml-5 z-10 sm:w-auto sm:h-25">
    </div>
    <ul class=" md:flex items-center gap-10 mr-16 p-5">
      <li>
    <a href="{{ route('landing') }}" class="group relative inline-block py-2  font-medium transition-colors hover:text-gym-500">
        Beranda
        <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
    </a>
</li>
        <li>
            <a href="{{ route('daftar.paket') }}" class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">Membership
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
        <li> <a href="{{ route('daftar.jadwal') }}" class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">Jadwal
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
        <li class="mr-7"> <a href="{{ route('daftar.trainer') }}" class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">Trainer
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </li>
  @auth
    @php
        $role = auth()->user()->role;
    @endphp

    @if ($role === 'admin')
        <li class="mr-7">
            <a href="{{ route('admin.dashboard') }}"
               class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">
                Dashboard
                <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </li>

    @elseif ($role === 'member')
        <li class="mr-7">
            <a href="{{ route('dashboard.user') }}"
               class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">
                Dashboard
                <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </li>

    @elseif ($role === 'trainer')
        <li class="mr-7">
            <a href="{{ route('trainer') }}"
               class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">
                Dashboard
                <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
        </li>
    @endif
@endauth

@guest
    <li class="relative group">
        <div class="absolute -inset-0.5 blur-xl bg-gym-500 rounded-xl opacity-75 group-hover:opacity-100 transition duration-200"></div>
        <a href="{{ route('register') }}"
           class="relative z-10 rounded-xl bg-gym-500 p-4 text-white font-bold">
            Join Online
        </a>
    </li>
@endguest

        
    </ul>
</nav>
 <div >
        <img src="{{ asset('img/logo 2.png') }}" alt="" class="absolute hidden ml-5 z-10 w-auto h-20 md:hidden sm:h-16">
    </div>
    {{-- mobile men --}}
<div x-show="open"
     x-transition:enter="transition transform duration-300 ease-out"
    x-transition:enter-start="-translate-x-full"
    x-transition:enter-end="translate-x-0"
    x-transition:leave="transition transform duration-200 ease-in"
    x-transition:leave-start="translate-x-0"
    x-transition:leave-end="-translate-x-full"
class="fixed z-50 bg-white w-72 h-full  top-0 left-0 shadow-xl  md:hidden "> 
     <div >
        <img src="{{ asset('img/logo 2.png') }}" alt="" class="absolute left-0 top-2 ml-5 z-20 w-auto h-20 sm:h-16">
    </div>

    <ul class=" md:flex items-center gap-10 mt-28 md:mt-0 mr-16 p-5">
      <li>
    <a href="{{ route('landing') }}" class="group relative inline-block py-2  font-medium transition-colors hover:text-gym-500">
        Beranda
        <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
    </a>
</li>
        <li>
            <a href="" class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">Membership
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
        <li> <a href="" class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">Jadwal
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
        <li class="mr-7"> <a href="" class="group relative inline-block py-2 font-medium transition-colors hover:text-gym-500">Trainer
            <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-gym-500 transition-all duration-300 group-hover:w-full"></span>
            </a></li>
        <li class="relative group mt-5 w-full">
        
            <a href="" class="w-full relative block text-center rounded-xl z-10 bg-gym-500 hover:bg-gym-700 p-2 md:p-4 sm:text-sm text-white font-bold">Join Online</a>
        </li>
    </ul>
</div>