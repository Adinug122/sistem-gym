<x-traineer>


    <div class="w-full px-8  mt-10 ">

  
 <div class="mb-6 flex justify-between items-center  gap-3 sm:flex-row sm:items-center sm:justify-between">
            
            <h1 class="text-2xl font-bold text-gray-800">
                Dashboard <span class="text-gym-600">Program Latihan</span>
            </h1>

            <a href="{{ route('program.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gym-600 text-white rounded-lg hover:bg-gym-500 transition-colors shadow-lg shadow-gym-600/20">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah program
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
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Nama Program</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Deskripsi</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Gambar</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-right">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 bg-white">
                    @foreach ($program as $item)
                        
                 
                    <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $item->nama }}
                        </td>
                        
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ Str::limit($item->desciption,10) }}
                        </td>
            
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
    @if ($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" 
             alt="Gambar Program"
             class="w-16 h-16 rounded object-cover border border-gray-200">
    @else
        <span class="text-xs text-gray-400 italic">No Image</span>
    @endif
</td>
                        
                        
                        <td class="py-4 px-2 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex gap-3 justify-end items-center">
                 <a href="{{ route('program.edit',$item->id) }}" class="text-gym-600 hover:text-gym-900 transition-colors" title="Edit Data">
    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 16V20C20 21.1046 19.1046 22 18 22H4C2.89543 22 2 21.1046 2 20V6C2 4.89543 2.89543 4 4 4H8" 
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M12.5 15.8L22 6.2L17.8 2L8.3 11.5L8 16L12.5 15.8Z" 
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
</a>
                                                  
                                <button @click="isOpen = true; actionUrl = '{{ route('program.destroy', $item->id) }}'" class="z-20">
                                <svg class="w-7 h-6 text-gym-600 hover:text-gym-900 transition-colors" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                     stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                                         <path d="M10 11V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" 
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="currentColor"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" 
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                             </button>
                               
                          </div>
        
                        </td>
                    </tr>

             @endforeach

                </tbody>
            </table>
             
        </div>
    </div>
    <div     x-show="isOpen"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
     class="fixed inset-0 bg-black/50 flex justify-center items-center z-50">
   <div class="bg-white rounded-lg shadow-2xl w-full max-w-sm text-center p-10">
    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-gym-500">
           <svg class="w-9 h-8 text-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier"
                                     stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier">
                                         <path d="M10 11V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17"
                                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" 
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="currentColor"
                                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" 
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
    </div>
    <div>
        <h2 class="text-base mt-3">Apakah anda ingin menghapus data?</h2>
    </div>
    <div class="mt-2">
            <p class="text-xs text-gray-500">
                Data yang dihapus tidak bisa dikembalikan lagi. Apakah Anda yakin ingin melanjutkan?
            </p>
        </div>
         <div class="flex justify-between mt-5 ">
    <button @click="isOpen = false" class="bg-transparant rounded-lg px-3 py-2 text-gym-500 ring-1 ring-gym-500 text-sm hover:bg-gym-500 hover:text-white ">
        Batal
    </button>
    <form :action="actionUrl" method="POST" class="" title="Delete data">
                                @csrf
                                @method('DELETE')

    <button class="bg-gym-500 rounded-lg px-3 py-2 text-white text-sm hover:bg-gym-700">
        Hapus
    </button>
    </form>
   </div>
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


</x-traineer>