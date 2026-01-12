<x-traineer>
    <div class="w-full max-w-md mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6">
            
            <h1 class="text-xl font-bold mb-4 text-gray-800">
                Tambah <span class="text-gym-600">Jadwal Latihan</span>
            </h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('jadwal.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium mb-1">Pilih Program</label>
                    <select name="program_id" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500 bg-white">
                        <option value="">-- Pilih Program --</option>
                        @foreach ($programs as $program)
                          
                            <option value="{{ $program->id }}">{{ $program->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-medium mb-1">Hari</label>
                    <select name="hari" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500 bg-white">
                        <option value="">-- Pilih Hari --</option>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Minggu">Minggu</option>
                    </select>
                </div>

            
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium mb-1">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Ruangan</label>
                        <input type="text" name="ruangan" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Kuota</label>
                        <input type="number" name="kuota_maksimal" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                    </div>
                </div>

             
                <div class="flex justify-between gap-3 pt-4">
                    <a href="{{ route('jadwal.index') }}"
                       class="w-1/2 text-center border border-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-100 transition-colors">
                        Batal
                    </a>

                    <button type="submit"
                            class="w-1/2 bg-gym-600 text-white px-4 py-2 rounded hover:bg-gym-500 transition-colors shadow-lg shadow-gym-600/20">
                        Simpan Jadwal
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-traineer>