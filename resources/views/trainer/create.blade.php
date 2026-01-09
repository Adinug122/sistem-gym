<x-app-layout>
    <div class=" w-full max-w-md mx-auto  mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6">
            
              <h1 class="text-xl font-bold mb-4 text-gray-800">
                Tambah <span class="text-gym-600">Trainer</span>
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

            <form action="{{ route('admin.trainer.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data"> 
                @csrf

                <div>
                    <label class="block font-medium">Nama</label>
                    <input type="text" name="name" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                </div>

                <div>
                    <label class="block font-medium">Email</label>
                    <input type="email" name="email" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                </div>

                <div>
                    <label class="block font-medium">Specialis</label>
                    <input type="text" name="specialis" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                </div>
                <div>
                    <label class="block font-medium">Foto</label>
                    <input type="file" name="avatar" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                </div>

                <div>
                    <label class="block font-medium">Status</label>
                    <select name="status" class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                        <option value="active">Active</option>
                        <option value="nonactive">Non Active</option>
                    </select>
                </div>

            <div class="flex justify-between gap-3 pt-4">
                    <a href="{{ route('admin.trainer.index') }}"
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
