<x-traineer>
    <div class="w-full max-w-md mx-auto mt-10 bg-white rounded-lg shadow-lg p-6">
        
        <h1 class="text-xl font-bold mb-4">Edit Jadwal Latihan</h1>

        <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

         
            <div>
                <label class="block font-medium">Pilih Program</label>
                <select name="program_id" class="w-full border rounded px-3 py-2">
                    @foreach ($programs as $program)
                        <option value="{{ $program->id }}" {{ $jadwal->program_id == $program->id ? 'selected' : '' }}>
                            {{ $program->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

      
            <div>
                <label class="block font-medium">Hari</label>
                <select name="hari" class="w-full border rounded px-3 py-2">
                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                        <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                            {{ $hari }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Jam Mulai</label>
                    <input type="time" name="jam_mulai" class="w-full border rounded px-3 py-2" 
                           value="{{ $jadwal->jam_mulai }}">
                </div>
                <div>
                    <label class="block font-medium">Jam Selesai</label>
                    <input type="time" name="jam_selesai" class="w-full border rounded px-3 py-2" 
                           value="{{ $jadwal->jam_selesai }}">
                </div>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 pt-4">
                <a href="{{ route('jadwal.index') }}" class="w-1/2 text-center border py-2 rounded">Batal</a>
                <button type="submit" class="w-1/2 bg-gym-600 text-white py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-traineer>