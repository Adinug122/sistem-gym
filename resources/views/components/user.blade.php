<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

            
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <style>
 /* 1. Atur lebar slide agar kelihatan 3 biji (kiri-tengah-kanan) */
    .swiper-slide {
        width: 300px;
        height: auto; /* Lebar default di HP */
        opacity: 0.3; /* Slide samping agak transparan */
        transform: scale(0.85); 
    }

    /* Di layar Desktop, lebar slide dibesarin */
    @media (min-width: 768px) {
        .swiper-slide {
            width: 500px;
           
        }
    }

  
    .swiper-slide-active {
        opacity: 1; /* Terang full */
        transform: scale(1.1); /* Di-zoom jadi besar (110%) */
        z-index: 10; /* Tumpuk paling atas */
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); /* Kasih bayangan biar pop-up */
    }
        .hide-scrollbar{
            -ms-overflow-style: none;
            scroll-width:none;
        }
        .hide-scrollbar::-webkit-scrollbar{
            display:none;
        }
        .galery::-webkit-scrollbar{
            display: none;
        }      
    </style>

    </head>
    <body x-data="{open: false}" class="font-sans antialiased ">
        <div class="bg-white text-gray-800 font-sans antialiased">
               <div>
            @include('components.navbar')
            <div x-show="open"
            @click="open = false"
            x-transition.opacity
            class="fixed inset-0 z-20 bg-opacity-50 md:hidden "
            style="display: none;">

            </div>
            <!-- Page Content -->
          
         
      
            <main class=" flex flex-col overflow-hidden bg-white">
                 <button x-show="!open" x-transition.opacity @click="open = !open"
            class="absolute top-5 left-5 z-50 md:hidden text-white hover:text-red-600 transition p-2">
            <svg class="w-8 h-8 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>


        </button>
                {{ $slot }}
            </main>
            </div>
        </div>

         <script>
 
        const section = document.querySelector('.section-pembungkus')

        const galery = document.querySelector('.galery')
        section.addEventListener('wheel',(e)=>{
           // 1. Tahan halaman biar gak turun
    

           const isScrollingDown = e.deltaY > 0
           const isScrollingUp = e.deltaY < 0

           const maxScrollLeft = galery.scrollWidth - galery.clientWidth

            const isMentokKanan = galery.scrollLeft >= maxScrollLeft - 1;
            const isMentokKiri = galery.scrollLeft <= 1;
        
            if(isScrollingDown && !isMentokKanan){
                e.preventDefault();
                galery.scrollLeft += e.deltaY;
                galery.style.scrollBehavior = 'auto'
            } else if (isScrollingUp && !isMentokKiri){
                e.preventDefault();
                galery.scrollLeft += e.deltaY;
                galery.style.scrollBehavior = 'auto'
            }

        },{ passive: false })

        let swiper = new Swiper(".mySwiper",{
            slidesPerView: "auto", // Biar lebar slide ngikutin CSS
        centeredSlides: true,  // Wajib biar yang aktif di tengah
           // Muter terus
        initialSlide: 1, 
            // memberi jarak (ini 20px)
            spaceBetween:20,
            // agar bisa terusan
            loop:true,

            navigation:{
                nextEl: ".swiper-button-next",
             prevEl: ".swiper-button-prev",
            },
        })
        
    </script>
    </body>
</html>
