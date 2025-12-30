<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
       <div id="loading" class="fixed inset-0 z-[1000] bg-gym-500 flex flex-col items-center justify-center transition-opacity duration-700 ease-in-out">
    
    <img src="{{ asset('img/noise.png') }}" 
         class="absolute inset-0 w-full h-full object-cover pointer-events-none mix-blend-multiply" 
         alt="">

            
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-gym-800 blur-3xl opacity-20"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-gym-200 blur-3xl opacity-20"></div>

<div class="relative z-10 scale-150 mb-8"> <div class="loader">
                    <span><span></span><span></span><span></span><span></span></span>
                    <div class="base">
                        <span></span>
                        <div class="face"></div>
                    </div>
                </div>
                <div class="longfazers">
                    <span></span><span></span><span></span><span></span>
                </div>
            </div>

            <div class="relative z-10 mt-4 animate-bounce">
                <span class="text-2xl font-black tracking-widest text-white drop-shadow-md">
                    IRON<span class="text-gray-900">GYM</span>
                </span>
            </div>
          <div class="relative z-10 mt-2">
    <p class="text-sm  tracking-[0.2em] text-white font-semibold animate-pulse">
        Mulai Perubahan Hari Ini
    </p>
</div>
</div>
        <div class="min-h-screen flex  ">
         
            <div class="hidden lg:flex lg:w-1/2 relative bg-gym-500 overflow-hidden flex-col  p-6 text-white">
                 <div class="absolute inset-0 bg-gradient-to-br from-red-500 to-gym-500 opacity-90 z-0"></div>
            <div class="absolute inset-0 z-0" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px; opacity: 0.1;"></div>
                <div class="absolute top-0 right-0 w-96 h-96 bg-gym-200 rounded-full blur-3xl opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-gym-50 rounded-full blur-3xl opacity-20"></div>
              
                <div class="relative z-10 flex items-center gap-2">
                <div class="bg-white rounded-lg p-2 w-10 h-10 flex items-center">
                            <x-application-logo></x-application-logo>      
                        </div>
                        <span class="text-white text-xl font-bold">
                            IRON GYM
                        </span>
                </div>

                <div class="relative z-10 flex-1 flex flex-col justify-center max-w-xl">
        <h1 class="text-white text-5xl font-extrabold ">
            Bangun Versi Terbaik Dirimu
        </h1>
        <p class="mt-4 text-lg text-white/90">
            Kelola latihan, pantau progres, dan jaga konsistensi
            dalam satu platform kebugaran.
        </p>
    </div>
           
            </div>

            <div class="w-full lg:w-1/2 flex justify-center items-center bg-white  shadow-md overflow-hidden sm:rounded-lg">
                <div class="w-full max-w-sm">
                  <div class="relative z-10 flex lg:hidden items-center gap-2">
                <div class=" rounded-lg p-2 w-10 h-10 flex items-center">
                            <x-application-logo></x-application-logo>      
                        </div>
                        <span class="text- text-xl font-bold">
                            IRON GYM
                        </span>
                </div>
                {{ $slot }}
                </div>
             
            </div>
        </div>
    </body>
    <script>
        
        window.addEventListener('load',() =>{
            const loading = document.getElementById('loading');
            setTimeout(() => {
                loading.classList.add('opacity-0')
                loading.classList.add('pointer-events-none');
            },1000);
        })
    </script>
</html>
