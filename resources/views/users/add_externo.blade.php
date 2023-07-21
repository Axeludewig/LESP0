<x-layout>
    <a href="/users/cursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="shadow rounded-lg border md:m-24 m-4">
        <div class="text-center m-4 md:m-24">
            <div class="rounded-lg border p-2 bg-laravel text-white">
                <h1>Agregar cursos externos</h1>
            </div>
            <div class="rounded-lg border mt-4 md:mt-12">
            <form action="/users/addexternos" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col justify-center items-center mt-4">
                    <input hidden name="id_user" value="{{auth()->user()->id}}" />
                    <input hidden name="status" value="Pendiente" />
                    <div>
                        <label for="horas_totales" class="block mb-2 text-sm font-medium text-gray-900 ">Horas totales:</label>
                        <input type="number" name="horas_totales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 w-[100px]" />
                    </div>
                    <div class="mt-2 w-full flex flex-col justify-center items-center">
                        <div class="border m-2 w-full ">
                            <label for="archivo" class="block font-semibold text-gray-700">Archivo #1:</label>
                            <input type="file" name="archivo" id="archivo">
                        </div>
                        <div class="border m-2 w-full ">
                            <label for="archivo2" class="block font-semibold text-gray-700">Archivo #2:</label>
                            <input type="file" name="archivo2" id="archivo2">
                        </div>
                        <div class="border m-2 w-full ">
                            <label for="archivo3" class="block font-semibold text-gray-700">Archivo #3:</label>
                            <input type="file" name="archivo3" id="archivo3">
                        </div>
                        <div class="border m-2 w-full ">
                            <label for="archivo4" class="block font-semibold text-gray-700">Archivo #4:</label>
                            <input type="file" name="archivo4" id="archivo4">
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-laravel shadow rounded-lg border px-4 py-2 m-4">Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-layout>
