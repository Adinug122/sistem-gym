<x-traineer>
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            
            <thead class="bg-gray-50 text-gray-500 border-b border-gray-100">
                <tr>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">No</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Kode Booking</th>    
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider">Dibuat </th>
                    <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 bg-white">
                
                @forelse($jadwal->bookings as $index => $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-semibold">
                            {{ $item->member->user->name ?? 'User Tidak Ditemukan' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-500 font-mono">
                            {{ $item->kode_booking }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm ">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 text-center">
                            
                            <form id="delete-form-{{ $item->id }}" action="{{ route('booking.destroy', $item->id ) }}" 
                                  method="POST"
                              >
                                
                                @csrf
                                @method('DELETE')
                                
                                <button type="button" onclick="konfirmasiHadir('{{ $item->id }}')" class="bg-gym-500 hover:bg-gym-600  text-white px-5 py-3 rounded-lg font-bold  flex items-center gap-2 mx-auto shadow-md transition">
                                    Hadir
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-8 text-center text-gray-400">
                            Belum ada peserta yang mendaftar di kelas ini.
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <script>
   function konfirmasiHadir(itemId) {
            
            Swal.fire({
                title: "Konfirmasi Kehadiran?",
                text: "Member akan diabsen dan data booking dihapus dari antrian.",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#10B981",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hadir!",
                cancelButtonText: "Batal"
            }).then((result) => {
              
                if (result.isConfirmed) {
                    // Cari form berdasarkan ID yang dikirim
                    let form = document.getElementById('delete-form-' + itemId);
                    
                    // Submit form secara manual
                    if (form) {
                        form.submit();
                    }
                }
            });
        }
    </script>
</x-traineer>