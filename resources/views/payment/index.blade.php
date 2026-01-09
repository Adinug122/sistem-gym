<x-app-layout>


    <div class="w-full px-8  mt-10 ">

  
 <div class="mb-6 flex justify-between items-center  gap-3 sm:flex-row sm:items-center sm:justify-between">
            
            <h1 class="text-2xl font-bold text-gray-800">
                Dashboard <span class="text-gym-600">payment</span>
            </h1>

           

         
        </div>
  </div>

 
   <form action="{{ route('admin.payment.index') }}" method="GET" class="mt-4 px-8">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau id order ..." class="px-3 py-2   border border-gray-400 rounded-lg focus:border-red-500 focus:ring-1 focus:ring-red-500  w-30 ">

                  <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 ml-2">
                Search
            </button>
            </form>
            <div class="bg-white p-6 mx-5 mt-5 rounded-xl shadow-sm border border-gray-100 ">
    <div class="flex flex-col md:flex-row justify-between items-center gap-4">
        
        <div>
            <h3 class="text-lg font-bold text-gray-800">Laporan Keuangan</h3>
            <p class="text-sm text-gray-500">Download rekap pendapatan bulanan dalam format Excel.</p>
        </div>

      <form action="{{ route('admin.payment.export') }}" method="GET" class="flex items-center gap-5">
            
    <select name="bulan" class="px-4 py-2 pr-4 border border-gray-300 rounded-lg text-sm focus:ring-red-500 focus:border-red-500 bg-white">
        @foreach(range(1, 12) as $m)
            <option value="{{ $m }}" {{ date('n') == $m ? 'selected' : '' }}>
                {{ date('F', mktime(0, 0, 0, $m, 10)) }}
            </option>
        @endforeach
    </select>

    <select name="tahun" class="px-4 py-2 pr-8 border border-gray-300 rounded-lg text-sm focus:ring-red-500 focus:border-red-500 bg-white">
        @foreach(range(date('Y'), 2024) as $y)
            <option value="{{ $y }}">{{ $y }}</option>
        @endforeach
    </select>

    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg text-sm font-semibold transition shadow-sm">
        Export Excel
    </button>
</form>
    </div>
</div>
<div x-data="{isOpen:false,actionUrl: ''} "
      class="w-full px-6 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    
    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Pemasukan</p>
                <h3 class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalOmzet, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Transaksi Berhasil</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $transaksiSukses }} <span class="text-sm font-normal">Kali</span></h3>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-gray-500">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-gray-100 text-gray-600 mr-4">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Total Record</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalTransaksi }}</h3>
            </div>
        </div>
    </div>

</div>
    <div class="bg-white rounded-xl border border-gray-100 shadow-lg shadow-gray-200/50 overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                
                <thead class="bg-gray-50 text-gray-500 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Member</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Paket member</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Tipe pembayaran</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Tanggal</th>
                        <th class="px-8 py-4 text-xs font-bold uppercase tracking-wider text-right">order_id</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach ($payment as $item)
                        
                 
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-semibold text-gray-900">{{ $item->membership->member->user->name }}</div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-xs text-gray-500">{{ $item->membership->paket->nama }}</div>
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $item->status}}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                        {{ $item->payment_type }}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap">
                        {{ $item->amount }}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $item->paid_at}}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $item->order_id}}
                        </td>
                        
                     
                    </tr>

             @endforeach

                </tbody>
            </table>
                <div class="mt-4 p-5">
                    {{ $payment->links('pagination::tailwind') }}
                </div>
        </div>
    </div>



</x-app-layout>