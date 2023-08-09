<x-layout>
    <div class="flex flex-col items-center justify-center mt-24 ">
        <div class="">
            <x-card>
                <p>Manipulación de Inventario</p>
                <form method="POST" action="/excelcirce" enctype="multipart/form-data" />
                    @csrf
                    <input type="file" name="file" />
                    <button type="submit" class="rounded-lg border-2 p-4 bg-white text-black px-8">Send</button>
                </form> 
            </x-card>
        </div>
        <div>
            <x-card>
                <p>Generación de contraseñas</p>
                <form method="POST" action="/generarpasswords" enctype="multipart/form-data" />
                    @csrf
                    <input type="file" name="file" />
                    <button type="submit" class="rounded-lg border-2 p-4 bg-white text-black px-8">Send</button>
                </form> 
            </x-card>
        </div>
    </div>
</x-layout>