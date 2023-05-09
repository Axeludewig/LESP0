@props(['info'])
<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center font-medium">
        <h3 class="text-3xl ">
            <p>Información personal</p>
        </h3>
    </div>
    
    <div class="flex justify-center mb-40 mt-12">
<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-xl sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form action="/users/info/{{auth()->user()->id}}" method="POST" class="space-y-6">
        @csrf
            @method('PUT')
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}"></input>
        <div>
            <label for="direccion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección</label>
            <input type="text" name="direccion" id="direccion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$info->direccion}}" >
        </div>
        <div>
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
            <input type="text" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$info->telefono}}" >
        </div>
        <div>
            <label for="nacionalidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nacionalidad</label>
            <input type="text" name="nacionalidad" id="nacionalidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$info->nacionalidad}}" >
        </div>
        <div>
            <label for="lugar_de_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lugar de nacimiento</label>
            <input type="text" name="lugar_de_nacimiento" id="lugar_de_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{$info->lugar_de_nacimiento}}" >
        </div>
        <div>
            <label for="fecha_de_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
            <div class="relative max-w-sm">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
                <input datepicker name="fecha_de_nacimiento" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Selecciona una fecha" value="{{$info->fecha_de_nacimiento}}">
              </div>
        </div>
        <button type="submit" class="w-full text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar cambios</button>
    </form>
</div>
    </div>
<!--
    <x-card class="mb-40">
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
    </x-card> --> 
</x-layout>