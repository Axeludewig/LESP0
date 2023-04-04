@props(['info'])
<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center font-semibold">
        <h3 class="text-3xl ">
            <p>Información personal</p>
        </h3>
    </div>
    <x-card>
        <form action="/users/info/{{auth()->user()->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-center place-content-center content-center gap-3 mt-6">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}"></input>
                <div class="flex flex-row">
                    <label for="direccion" class="font-semibold">Direccion: &nbsp;</label>
                    <input type="text" 
                    name="direccion" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$info->direccion}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="telefono" class="font-semibold">Telefono: &nbsp;</label>
                    <input type="text" 
                    name="telefono" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$info->telefono}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="nacionalidad" class="font-semibold">Nacionalidad: &nbsp;</label>
                    <input 
                    type="text" 
                    name="nacionalidad" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$info->nacionalidad}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="lugar_de_nacimiento" class="font-semibold">Lugar de Nacimiento: &nbsp;</label>
                    <input 
                    type="text" 
                    name="lugar_de_nacimiento" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$info->lugar_de_nacimiento}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="fecha_de_nacimiento" class="font-semibold">Fecha de Nacimiento: &nbsp;</label>
                    <input 
                    type="date"
                    name="fecha_de_nacimiento" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$info->fecha_de_nacimiento}}"
                    ></input>
                </div>            
                <button type="submit" class="text-red-500 border font-bold border-solid border-red-500 pl-6 pr-6 pt-2 pb-2 mt-6 hover:ring "><i class="fa-regular fa-floppy-disk"></i> Guardar cambios</button>
            </div>
        </form>
    </x-card>
</x-layout>