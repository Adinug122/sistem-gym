<x-traineer>
    <div class="w-full max-w-md mx-auto mt-10">
        <div class="bg-white rounded-lg shadow-lg p-6">

            <h1 class="text-xl font-bold mb-4 text-gray-800">
                Edit <span class="text-gym-600">Program Latihan</span>
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

            <form action="{{ route('program.update', $program->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium">Nama</label>
                    <input type="text"
                           name="nama"
                           value="{{ old('nama', $program->nama) }}"
                           class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">
                </div>

            
                <div>
                    <label class="block font-medium">Deskripsi</label>
<textarea 
        name="desciption" 
        rows="5" 
        class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500 bg-white"
        placeholder="Jelaskan detail latihan, manfaat, dan target otot..."
    >{{ old('desciption',$program->desciption) }}</textarea>
                </div>

       
                <div x-data="imagePreview('{{ asset('storage/'.$program->image) }}')" class="space-y-2">
                    <label class="block font-medium">Gambar</label>

                    <div class="w-full h-48 border-2 border-dashed rounded-lg flex items-center justify-center overflow-hidden bg-gray-100">
                        <template x-if="imageUrl">
                            <img :src="imageUrl" class="w-full h-full object-cover">
                        </template>

                        <template x-if="!imageUrl">
                            <span class="text-gray-400 text-sm">Preview gambar</span>
                        </template>
                    </div>

                    <input type="file"
                           name="image"
                           accept="image/*"
                           @change="previewImage"
                           class="w-full rounded border px-3 py-2 focus:border-gym-500 focus:ring-gym-500">

                    <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max. 2MB)</p>
                </div>

                <div class="flex gap-3 pt-4">
                    <a href="{{ route('program.index') }}"
                       class="w-1/2 text-center border border-gray-300 text-gray-600 px-4 py-2 rounded hover:bg-gray-100">
                        Batal
                    </a>

                    <button type="submit"
                            class="w-1/2 bg-gym-600 text-white px-4 py-2 rounded hover:bg-gym-500">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function imagePreview(oldImage = null) {
            return {
                imageUrl: oldImage,

                previewImage(event) {
                    const file = event.target.files[0]
                    if (!file) return

                    this.imageUrl = URL.createObjectURL(file)
                }
            }
        }
    </script>
</x-traineer>
