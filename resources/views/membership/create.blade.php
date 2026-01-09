<x-app-layout>
    <div class="w-full max-w-md mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6">
            
            <h1 class="text-xl font-bold mb-4 text-gray-800">
                Tambah <span class="text-red-600">Membership</span>
            </h1>

            {{-- Menampilkan Error Validasi --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.membership.simpan') }}" method="POST" class="space-y-4">
                @csrf

                {{-- 1. Input Member (Dropdown) --}}
                <div>
                    <label class="block font-medium">Pilih Member</label>
                    <select name="member_id" class="w-full rounded border px-3 py-2 focus:border-red-500 focus:ring-red-500">
                        <option value="">-- Cari Member --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                {{ $member->user->name ?? 'User Tidak Ditemukan' }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- 2. Input Paket (Dropdown) --}}
                <div>
                    <label class="block font-medium">Pilih Paket</label>
                    <select name="paket_id" class="w-full rounded border px-3 py-2 focus:border-red-500 focus:ring-red-500">
                        <option value="">-- Pilih Paket --</option>
                        @foreach($pakets as $paket)
                            <option value="{{ $paket->id }}" {{ old('paket_id') == $paket->id ? 'selected' : '' }}>
                                {{ $paket->nama }} (Rp {{ number_format($paket->harga, 0, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

               
                <div>
                    <label class="block font-medium">Metode Pembayaran</label>
                    <select name="metode_bayar" class="w-full rounded border px-3 py-2 focus:border-red-500 focus:ring-red-500">
                        <option value="cash" {{ old('metode_bayar') == 'cash' ? 'selected' : '' }}>Tunai (Cash)</option>
                        <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer Bank</option>
                        <option value="qris_manual" {{ old('metode_bayar') == 'qris_manual' ? 'selected' : '' }}>QRIS (Manual)</option>
                    </select>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-between gap-3 pt-4">
                    <a href="{{ route('membership.index') }}"
                       class="w-1/2 text-center border border-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-100">
                        Batal
                    </a>

                    <button type="submit"
                            class="w-1/2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>