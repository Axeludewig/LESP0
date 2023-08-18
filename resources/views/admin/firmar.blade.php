<x-layout>
    <a href="/admin/evaladq" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="flex flex-col justify-center items-center border shadow rounded-lg p-4">
        <h1 class="font-semibold text-xl">AUTENTICACIÓN EN DOS PASOS PARA CONFIRMACIÓN DE FIRMA</h1>
        <form method="post" action="/admin/firmar/{{ $eval->id }}">
            @csrf
            <div class="flex gap-4 items-center m-4">

                <label for="otp">Código de confirmación:</label>
                <input type="text" name="otp" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
            </div>
            <div class="flex justify-center">
                <button type="submit" class="text-white bg-laravel border rounded-lg p-4">Verificar código</button>
            </div>
        </form>
    </div>
</x-layout>
