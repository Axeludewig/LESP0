<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 mb-52">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Importar usuarios</h2>
            <p class="mb-4">A partir de un archivo .csv</p>
            <form method="POST" action="/usuarios" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label for="file" class="inline-block text-lg mb-2">
                        Examinar:
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full place-content-center"
                        name="file" />

                    @error('file')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black mt-6"
                        type="submit">Importar</button>
                </div>
            </form>
            <!-- <form method="POST" action="/upload" enctype="multipart/form-data">
                @csrf
                <input type="file" name="image" capture="camera">
                <button type="submit">Upload</button>
            </form> -->
        </header>
    </x-card>
</x-layout>
