<x-user>
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex justify-center items-center mb-10 space-x-4">
                <div class="flex items-center text-red-600">
                    <span class="w-8 h-8 flex items-center justify-center border-2 border-red-600 rounded-full font-bold">1</span>
                    <span class="ml-2 font-bold">Pilih Paket</span>
                </div>
                <div class="w-16 h-1 bg-red-600"></div>
                <div class="flex items-center text-red-600">
                    <span class="w-8 h-8 flex items-center justify-center bg-red-600 text-white rounded-full font-bold">2</span>
                    <span class="ml-2 font-bold">Pembayaran</span>
                </div>
                <div class="w-16 h-1 bg-gray-300"></div>
                <div class="flex items-center text-gray-400">
                    <span class="w-8 h-8 flex items-center justify-center border-2 border-gray-300 rounded-full font-bold">3</span>
                    <span class="ml-2 font-bold">Selesai</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                            <h3 class="font-bold text-gray-700">Rincian Pesanan</h3>
                            <span class="text-xs font-mono text-gray-500">Order ID: #{{ $payment->order_id }}</span>
                        </div>
                        <div class="p-6">
                            <div class="flex flex-col md:flex-row gap-6">
                                <div class="w-24 h-24 bg-red-100 rounded-xl flex items-center justify-center text-red-600 shrink-0">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                </div>
                                
                                <div class="flex-1">
                                    <h2 class="text-2xl font-black text-gray-900">{{ $paket->nama }}</h2>
                                    <p class="text-gray-500 mt-1 mb-4">{{ $paket->deskripsi }}</p>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                        @foreach($paket->benefits ?? [] as $benefit)
                                            <div class="flex items-center text-sm text-gray-600">
                                                <svg class="w-4 h-4 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                {{ $benefit }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
                        <h3 class="font-bold text-gray-700 mb-4">Data Pemesan</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-xs text-gray-400 uppercase font-bold">Nama Lengkap</label>
                                <p class="text-gray-900 font-medium">{{ auth()->user()->name }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-400 uppercase font-bold">Email</label>
                                <p class="text-gray-900 font-medium">{{ auth()->user()->email }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-400 uppercase font-bold">Tanggal Pemesanan</label>
                                <p class="text-gray-900 font-medium">{{ now()->format('d F Y, H:i') }}</p>
                            </div>
                            <div>
                                <label class="text-xs text-gray-400 uppercase font-bold">Status</label>
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded font-bold">Menunggu Pembayaran</span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-200 sticky top-6 overflow-hidden">
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">Ringkasan Pembayaran</h3>
                            
                            <div class="flex justify-between items-center mb-2 text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($paket->harga, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-2 text-gray-600">
                                <span>Biaya Admin</span>
                                <span>Rp 0</span>
                            </div>
                        
                            <hr class="border-dashed border-gray-300 my-4">
                            
                            <div class="flex justify-between items-center mb-6">
                                <span class="font-bold text-gray-900">Total Tagihan</span>
                                <span class="text-2xl font-black text-red-600">Rp {{ number_format($payment->amount, 0, ',', '.') }}</span>
                            </div>

                            <button id="pay-button" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-red-200 transition-all transform hover:-translate-y-1">
                                Bayar Sekarang 
                            </button>

                            <p class="text-xs text-center text-gray-400 mt-4 flex items-center justify-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                Transaksi Enkripsi Aman
                            </p>
                        </div>
                        <div class="bg-gray-50 px-6 py-3 border-t border-gray-100">
                            <form action="{{ route('membership.destroy',$membership->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                     <button type="submit" class="text-sm text-gray-500 hover:text-red-600 flex justify-center items-center">
                                 Batalkan Pesanan
                            </button>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            window.snap.pay('{{ $payment->snap_token }}', {
                onSuccess: function(result){
                    window.location.href = "{{ route('success') }}"; // Arahkan ke dashboard jika sukses
                },
                onPending: function(result){
                    alert("Menunggu pembayaran!");
                    location.reload();
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                    location.reload();
                }
            });
        };
    </script>
</x-user>