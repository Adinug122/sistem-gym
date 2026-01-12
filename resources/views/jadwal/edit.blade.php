<x-traineer>
    <div class="w-full max-w-md mx-auto mt-10 bg-white rounded-lg shadow-lg p-6">
        
        <h1 class="text-xl font-bold mb-4">Edit Jadwal Latihan</h1>
@if ($errors->any())
    <div class="bg-red-500 text-white p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
           value="{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}">
</div>

<div>
    <label class="block font-medium">Jam Selesai</label>
    <input type="time" name="jam_selesai" class="w-full border rounded px-3 py-2" 
           value="{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}">
</div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-medium">Tempat</label>
                    <input type="text" name="ruangan" class="w-full border rounded px-3 py-2" 
                           value="{{ $jadwal->ruangan }}">
                </div>
                <div>
                    <label class="block font-medium">Kuota</label>
                    <input type="number" name="kuota_maksimal" class="w-full border rounded px-3 py-2" 
                           value="{{ $jadwal->kuota_maksimal }}">
                </div>
            </div>
            <div>
            <label class="block font-medium">Status</label>
         <select name="status" id="status" class="w-full">
           <option value="active" {{ $jadwal->status == 'active' ? 'selected' : '' }}>Aktif</option>
           <option value="cancelled" {{ $jadwal->status == 'cancelled' ? 'selected' : '' }}>Batal</option>
          
</select>
            </div>

            {{-- Tombol --}}
            <div class="flex gap-3 pt-4">
                <a href="{{ route('jadwal.index') }}" class="w-1/2 text-center border py-2 rounded">Batal</a>
                <button type="submit" class="w-1/2 bg-gym-600 text-white py-2 rounded">Update</button>
            </div>
        </form>
    </div>
</x-traineer>