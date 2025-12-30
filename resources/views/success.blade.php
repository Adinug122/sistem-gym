<x-user>
    
    <div class="min-h-screen">
    <div class="flex justify-center items-center mb-10 space-x-4">
                <div class="flex items-center text-red-600">
                    <span class="w-8 h-8 flex items-center justify-center border-2 border-red-600 rounded-full font-bold">1</span>
                    <span class="ml-2 font-bold">Pilih Paket</span>
                </div>
                <div class="w-16 h-1 bg-red-600"></div>
                <div class="flex items-center text-red-600">
                    <span class="w-8 h-8 flex items-center justify-center border-2 border-red-600  rounded-full font-bold">2</span>
                    <span class="ml-2 font-bold">Pembayaran</span>
                </div>
                <div class="w-16 h-1 bg-red-600"></div>
                <div class="flex items-center text-red-600">
                    <span class="w-8 h-8 flex items-center justify-center border-2 bg-red-600 text-white border-gym-600 rounded-full font-bold">3</span>
                    <span class="ml-2 font-bold">Selesai</span>
                </div>
            </div>
        <div class=" flex items-center justify-center px-4">
        <div class="max-w-md w-full bg-white shadow-2xl rounded-2xl p-8 text-center ">
            
            <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-green-100 mb-6">
                <svg class="h-12 w-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>

            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">
                Pembayaran Sukses!
            </h1>

            <p class="text-gray-500 mb-8">
                Terima kasih telah melakukan pembayaran. <br>
                Membership Anda <span class="text-green-600 font-bold">Aktif</span> sekarang.
            </p>

            <div class="space-y-3">
                <a href="{{ url('/dashboard') }}" class="block w-full py-3 px-4 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg shadow-md transition duration-200">
                    Lihat Dashboard Member
                </a>

                <a href="{{ url('/') }}" class="block w-full py-3 px-4 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold rounded-lg transition duration-200">
                    Kembali ke Beranda
                </a>
            </div>

            <p class="mt-8 text-xs text-gray-400">
                Transaction ID: {{ request('order_id') ?? '-' }}
            </p>
        </div>
    </div>
    
    </div>
        
</x-user>