<x-app-layout>


    <div class="w-full px-8  mt-10 ">

  
 <div class="mb-6 flex justify-between items-center  gap-3 sm:flex-row sm:items-center sm:justify-between">
            
            <h1 class="text-2xl font-bold text-gray-800">
                Riwayat <span class="text-gym-600">Checkin</span>
            </h1>
         
        </div>
  </div>

<div class="  p-4 rounded-lg shadow-sm  ">
    <form method="GET" action="{{ route('admin.absensi.index') }}" class="flex flex-col sm:flex-row gap-4 items-end">
        
     
        <div class="w-full sm:w-auto">
            <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Bulan</label>
            <input type="month" 
                   name="bulan" 
                   value="{{ request('bulan') }}" 
                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-gym-500 focus:ring-gym-500 text-sm">
        </div>

        <div class="w-full sm:w-64">
            <label class="block text-sm font-medium text-gray-700 mb-1">Cari Nama</label>
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}"
                   placeholder="Nama member..."
                   class="w-full rounded-md border-gray-300 shadow-sm focus:border-gym-500 focus:ring-gym-500 text-sm">
        </div>

        {{-- 3. Tombol Action --}}
        <div class="flex gap-2">
            <button type="submit" 
                    class="bg-gym-600 text-white px-4 py-2 rounded-md hover:bg-gym-700 text-sm font-medium transition">
                Filter Data
            </button>
            
            @if(request('bulan') || request('search'))
                <a href="{{ route('admin.absensi.index') }}" 
                   class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 text-sm font-medium transition flex items-center">
                    Reset
                </a>
            @endif
        </div>

    </form>
</div>
 
<div x-data="{isOpen:false,actionUrl: ''} "
      class="w-full px-6 ">
 
</div>
    <div class="bg-white rounded-xl border border-gray-100 shadow-lg shadow-gray-200/50 overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                
          <thead class="bg-gray-50 text-gray-500 border-b">
<tr>
    <th class="px-6 py-4 text-left text-xs font-bold">MEMBER</th>
    <th class="px-6 py-4 text-left text-xs font-bold">WAKTU</th>
    <th class="px-6 py-4 text-left text-xs font-bold">PAKET</th>
    <th class="px-6 py-4 text-left text-xs font-bold">SISA HARI</th>
</tr>
</thead>


                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($checkin as $absen)
                        
                    @php
                        $latestMembership = $absen->member->membership->last();

                        $namaPaket = $latestMembership->paket->nama ?? '-';
                         $status = $latestMembership->status ?? 'inactive';

                        if($latestMembership && $latestMembership->end){
                            $berakhir = \Carbon\Carbon::parse($latestMembership->end);
                            $hariIni = \Carbon\Carbon::now();
                        }

                        $selisih = $hariIni->diffInDays($berakhir,false);
                        $selisih = (int) ceil($selisih);

                        if($hariIni->greaterThan($berakhir)){
                            $sisa = 'Paket Expired';
                        }else{
                            $sisa = 'Paket tersisa '. $selisih . ' hari';
                        }

                    @endphp
                 
                  
        <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-6 py-4 font-medium text-gray-800 flex items-center gap-3">
                <div class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold">
                    {{ substr($absen->member->user->name ?? 'X', 0, 2) }}
                </div>
                {{ $absen->member->user->name ?? 'Deleted User' }}
            </td>

            <td class="px-6 py-4">
                {{ \Carbon\Carbon::parse($absen->checkin_time)->format('H:i') }} WIB
            </td>

            <td class="px-6 py-4">
                {{ $namaPaket }}
            </td>

            <td class="px-6 py-4">
               {{$sisa}}
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                Belum ada member check-in hari ini.
            </td>
        </tr>
    @endforelse

                </tbody>
            </table>
                <div class="mt-4 p-5">
                    {{ $checkin->links('pagination::tailwind') }}
                </div>
        </div>
    </div>



</x-app-layout>