<x-app-layout>


    <div class="w-full px-8  mt-10 ">

  
 <div class="mb-6 flex justify-between items-center  gap-3 sm:flex-row sm:items-center sm:justify-between">
            
            <h1 class="text-2xl font-bold text-gray-800">
                Dashboard <span class="text-gym-600">Membership</span>
            </h1>

            <a href="{{ route('admin.membership.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gym-600 text-white rounded-lg hover:bg-gym-500 transition-colors shadow-lg shadow-gym-600/20">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Membership
            </a>
        </div>
  </div>
<div x-data="{isOpen:false,actionUrl: ''} "
      class="w-full px-6 mt-10">
    
    <div class="bg-white rounded-xl border border-gray-100 shadow-lg shadow-gray-200/50 overflow-hidden">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                
                <thead class="bg-gray-50 text-gray-500 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Paket</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Start</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">End</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Status</th>
                     
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach ($membership as $item)
                        
                 
                    <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $item->member->user->name }}
                        </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $item->paket->nama }}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                       {{ $item->start }}
                        </td>
            
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                      {{ $item->end }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                      {{ $item->status }}
                        </td>
            
                
                        
                    </tr>

             @endforeach

                </tbody>
            </table>
           <div class="mt-4">
    {{ $membership->links() }}
</div>
        </div>
    </div>
 

  
@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded',()=>{
            swal({
  title: "Data berhasil Diubah",
  text: "{{ session('success') }}",
  icon: "success",
  button: "Okee",
});
        })
    </script>
@endif

</x-app-layout>