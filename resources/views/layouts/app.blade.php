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
      <script>
        // Set Font Global agar sesuai tema
        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.color = '#64748b'; // Text gray-500

        // 1. Config Line Chart (Pertumbuhan Member)
        const ctxMember = document.getElementById('memberChart').getContext('2d');
        
        // Buat Gradient Merah yang Modern
        let gradientMember = ctxMember.createLinearGradient(0, 0, 0, 400);
        gradientMember.addColorStop(0, 'rgba(225, 29, 72, 0.4)'); // Merah Transparan di atas
        gradientMember.addColorStop(1, 'rgba(225, 29, 72, 0.0)'); // Hilang di bawah

        new Chart(ctxMember, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                datasets: [{
                    label: 'Member Baru',
                    data: [45, 52, 38, 65, 70, 85], // Data Dummy
                    borderColor: '#e11d48', // gym-600
                    backgroundColor: gradientMember,
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#e11d48',
                    pointBorderWidth: 2,
                    pointRadius: 6,
                    pointHoverRadius: 8,
                     fill: true, // Area di bawah garis diisi warna
                    tension: 0.4 // Membuat garis melengkung halus (curved)
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }, // Hilangkan legend bawaan
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        cornerRadius: 8,
                        titleFont: { size: 13 },
                        bodyFont: { size: 14, weight: 'bold' },
                        displayColors: false, // Hilangkan kotak warna di tooltip
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + ' Member';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false }, // Hilangkan garis vertikal
                        ticks: { color: '#94a3b8' }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { 
                            borderDash: [5, 5], // Garis putus-putus
                            color: '#f1f5f9' 
                        },
                        border: { display: false } // Hilangkan garis sumbu Y kiri
                    }
                }
            }
        });

        // 2. Config Doughnut Chart (Revenue)
        const ctxRevenue = document.getElementById('revenueChart').getContext('2d');

        new Chart(ctxRevenue, {
            type: 'doughnut',
            data: {
                labels: ['Membership', 'Trainer', 'Lainnya'],
                datasets: [{
                    data: [65, 25, 10],
                    backgroundColor: [
                        '#e11d48', // Merah gym-600
                        '#1f2937', // Hitam abu gray-800
                        '#cbd5e1'  // Abu terang gray-300
                    ],
                    borderWidth: 0, // Tanpa border putih antar slice
                    hoverOffset: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '80%', // Lubang tengah besar (Ring Chart Style)
                plugins: {
                    legend: { display: false }, // Kita pakai Custom Legend HTML
                    tooltip: {
                        backgroundColor: '#1e293b',
                        padding: 12,
                        callbacks: {
                            label: function(context) {
                                return ' ' + context.label + ': ' + context.parsed + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
</html>
