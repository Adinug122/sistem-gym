<x-app-layout>
    <div class=" w-full max-w-md mx-auto  mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6">
            
              <h1 class="text-xl font-bold mb-4 text-gray-800">
                Edit <span class="text-gym-600">paket</span>
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

            <form action="{{ route('admin.paket.update',$paket->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block font-medium">Nama Paket</label>
                    <input type="text" name="nama" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500"
                    value="{{ old('nama',$paket->nama) }}"
                    placeholder="Contoh: Gold Memberhsip 1 bulan">
                </div>

                <div>
                    <label class="block font-medium">Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500" placeholder="Contoh: Bebas akses semua alat, free Wifi, handuk gratis.
                    "
                    value="{{ old('deskripsi',$paket->deskripsi) }}">
                        </textarea>
                </div>

                <div>
                    <label class="block font-medium">Durasi angka</label>
                    <input type="number" name="durasi_angka" min="1" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500"
                    placeholder="contoh: 30"
                    value="{{ old('durasi_angka',$paket->durasi_angka) }}">
                </div>
                <div>
                    <label class="block font-medium">Durasi satuan</label>
                    <select name="durasi_satuan" class="w-full rounded-md border-gray-300 shadow-sm focus:border-gym-500 focus:ring-gym-500 bg-gray-50">
                                    <option value="day">Hari (Days)</option>
                                    <option value="month">Bulan (Months)</option>
                                    <option value="year" >Tahun (Years)</option>
                                </select>
                </div>
                <p class="text-xs text-gray-500 -mt-4">
                            *Pilih "Bulan" agar expired date otomatis akurat (misal: Februari 28 hari).
                        </p>
              <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Harga Paket</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                    <span class="text-gray-500 sm:text-sm font-bold">Rp</span>
                                </div>
                                <input type="number" name="harga" 
                                       value="{{ old('harga',$paket->harga) }}"
                                       class="no-spinner block w-full rounded-md border-gray-300 pl-10 focus:border-gym-500 focus:ring-gym-500" 
                                       placeholder="0">
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <span class="text-gray-500 sm:text-sm">IDR</span>
                                </div>
                            </div>
                        </div>
                    <div class="mb-4">
    <label class="block font-bold">Daftar Benefit (Satu per baris)</label>
    <textarea name="benefits" rows="5" class="w-full border p-2 rounded" placeholder="Contoh:
Akses Gym 24 Jam
Free Wifi
Locker Gratis"></textarea>
    <p class="text-sm text-gray-500">*Tekan Enter untuk menambah benefit baru</p>
</div>

            <div class="flex justify-between gap-3 pt-4">
                    <a href="{{ route('admin.paket.index') }}"
                       class="w-1/2 text-center border border-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-100">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="w-1/2 bg-gym-600 text-white px-4 py-2 rounded hover:bg-gym-500">
                        Tambah
                    </button>
                </div>
            </form>

        </div>
    </div>


</x-app-layout>
