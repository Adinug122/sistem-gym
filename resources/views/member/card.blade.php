<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Card - {{ $member->user->name }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;900&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Montserrat', sans-serif; }
        
        @media print {
            /* Hapus margin default browser saat print */
            @page { margin: 0; size: auto; }
            body { 
                -webkit-print-color-adjust: exact; 
                print-color-adjust: exact; 
                background: white;
            }
            /* Sembunyikan elemen yang tidak perlu saat print */
            .no-print { display: none !important; }
            
            /* Posisikan kartu di tengah atau pojok atas */
            .print-area {
                position: absolute;
                top: 0;
                left: 0;
                margin: 0;
            }
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen p-4">

    <div class="print-area relative w-[85.6mm] h-[53.98mm] bg-white rounded-xl shadow-2xl overflow-hidden flex flex-row select-none ring-1 ring-gray-900/5">
        
        <div class="relative w-[65%] bg-[#DC2626] text-white p-5 flex flex-col justify-center overflow-hidden">
            
            <div class="absolute -left-4 -bottom-4 text-red-700 opacity-20 text-[5rem] font-black leading-none select-none pointer-events-none">
                GYM
            </div>

            <div class="relative z-10">
                <p class="text-[7px] tracking-[0.25em] font-semibold uppercase opacity-90 mb-0.5">Membership Card</p>
                <h1 class="text-2xl font-black uppercase italic tracking-tighter leading-none shadow-black drop-shadow-sm">
                    IRON GYM
                </h1>
            </div>

            <div class="relative z-10 mt-auto">
                <div class="mb-1">
                    <p class="text-[6px] uppercase font-bold opacity-80 mb-px">Name</p>
                    <h2 class="text-[15px] font-bold uppercase leading-tight truncate pr-4">
                        {{ Str::limit($member->user->name, 18) }}
                    </h2>
                </div>
                <div>
                        <p class="text-[6px] uppercase font-bold opacity-80 mb-px">Telepon</p>
                        <h2>{{ $member->phone }}</h2>
                </div>
                
                <div class="inline-block bg-black/20 backdrop-blur-sm border border-white/10 px-2 py-0.5 rounded text-[7px] font-medium tracking-wide">
                    JOINED: {{ $member->created_at->format('d M Y') }}
                </div>
            </div>

    
        </div>

        <div class="relative w-[35%] bg-white flex flex-col justify-center items-center pl-2 pr-4 py-2 z-10">
            
            <div class="w-full aspect-square flex items-center justify-center p-1 bg-white">
                <div class="w-full h-full [&>svg]:w-full [&>svg]:h-full">
                    {!! $qrcode !!}
                </div>
            </div>
            
            <div class="text-center mt-1">
                <p class="text-[9px] font-black text-gray-900 leading-none">SCAN ME</p>
                <p class="text-[6px] font-bold text-gray-400 tracking-wider">FOR ACCESS</p>
            </div>
        </div>

    </div>

    <div class="no-print fixed bottom-10 flex flex-col items-center gap-2">
        <button onclick="window.print()" class="bg-gray-900 hover:bg-black text-white px-6 py-3 rounded-full font-bold shadow-xl transition transform hover:-translate-y-1 active:scale-95 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Cetak Kartu
        </button>
        <p class="text-gray-500 text-xs">Pastikan layout setting print adalah "Landscape" atau sesuai ukuran kertas.</p>
    </div>

</body>
</html>