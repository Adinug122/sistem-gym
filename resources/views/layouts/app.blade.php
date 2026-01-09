@props(['donutData','donutLabels'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

            
      @vite(['resources/css/app.css', 'resources/js/app.js'])
  
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        
    [x-cloak] { 
        display: none !important; 
    }

        .custom-scroll::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scroll::-webkit-scrollbar-track { background: transparent; }
        .custom-scroll::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .custom-scroll::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

      
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }


     #reader__dashboard_section_swaplink {
        display: none !important;
    }

    #reader img{
        display: none !important;
    }
    #reader button{
        background-color: red;
        color:white;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 10px;
        transition: ease-in-out;
    }
    #reader button:hover{
        background-color: rgb(200, 33, 33)
    }
    #reader select {
        padding: 8px 12px;
        border-radius: 6px;
        border: 1px solid #dbd1d1;
        background-color: #fbf9f9;
        color: #374151;
        outline: none;
        margin-right: 5px;
    }
    </style>
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50 text-gray-800 font-sans antialiased">
            <div x-data="{ sidebarOpen: false }" class="flex min-h-screen overflow-hidden">
            @include('layouts.navigation')
            <div x-show="sidebarOpen"
            @click="sidebarOpen = false"
            x-transition.opacity
            class="fixed inset-0 z-20 bg-opacity-50 md:hidden "
            style="display: none;">

            </div>
            <!-- Page Content -->
          
            <main class="flex-1 flex flex-col overflow-hidden bg-gray-50">
                  @include('components.header')
                {{ $slot }}
            </main>
            </div>
        </div>
    </body>
     
</html>
