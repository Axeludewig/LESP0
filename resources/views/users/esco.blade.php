@props(['esco'])
<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center font-semibold">
        <h3 class="text-3xl ">
            <p>Escolaridad</p>
        </h3>
    </div>
    <x-card>
        <form action="/users/esco/{{auth()->user()->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-center place-content-center content-center gap-3 mt-6">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}"></input>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel mb-4 w-1/4 p-2">
                    <span class="">Posgrado</span>
                </div>
                <div class="flex flex-row">
                    <label for="posgrado1" class="font-semibold">Posgrado #1: &nbsp;</label>
                    <input type="text" 
                    name="posgrado1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->posgrado1}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="institucion_educativa_p1" class="font-semibold">Institución educativa: &nbsp;</label>
                    <input type="text" 
                    name="institucion_educativa_p1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->institucion_educativa_p1}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo_de_realizacion_p1" class="font-semibold">Período de realización: &nbsp;</label>
                    <input 
                    type="text" 
                    name="periodo_de_realizacion_p1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->periodo_de_realizacion_p1}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Posgrado</span>
                </div>
                <div class="flex flex-row">
                    <label for="posgrado2" class="font-semibold">Posgrado #2: &nbsp;</label>
                    <input type="text" 
                    name="posgrado2" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->posgrado2}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="institucion_educativa_p2" class="font-semibold">Institución educativa: &nbsp;</label>
                    <input type="text" 
                    name="institucion_educativa_p2" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->institucion_educativa_p2}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo_de_realizacion_p2" class="font-semibold">Período de realización: &nbsp;</label>
                    <input 
                    type="text" 
                    name="periodo_de_realizacion_p1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->periodo_de_realizacion_p2}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Licenciatura</span>
                </div>
                <div class="flex flex-row">
                    <label for="licenciatura" class="font-semibold">Licenciatura: &nbsp;</label>
                    <input type="text" 
                    name="licenciatura" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->licenciatura}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="institucion_educativa_lic" class="font-semibold">Institución educativa: &nbsp;</label>
                    <input type="text" 
                    name="institucion_educativa_lic" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->institucion_educativa_lic}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="cedula" class="font-semibold">Cédula: &nbsp;</label>
                    <input type="text" 
                    name="cedula" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->cedula}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo_de_realizacion_lic" class="font-semibold">Período de realización: &nbsp;</label>
                    <input type="text" 
                    name="periodo_de_realizacion_lic" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->periodo_de_realizacion_lic}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Carrera técnica</span>
                </div>
                <div class="flex flex-row">
                    <label for="carrera_tecnica" class="font-semibold">Carrera técnica: &nbsp;</label>
                    <input type="text" 
                    name="carrera_tecnica" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->carrera_tecnica}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="institucion_educativa_ct" class="font-semibold">Institución educativa: &nbsp;</label>
                    <input type="text" 
                    name="institucion_educativa_ct" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->institucion_educativa_ct}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo_de_realizacion_ct" class="font-semibold">Período de realización: &nbsp;</label>
                    <input type="text" 
                    name="periodo_de_realizacion_ct" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->periodo_de_realizacion_ct}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Preparatoria</span>
                </div>
                <div class="flex flex-row">
                    <label for="preparatoria" class="font-semibold">Preparatoria: &nbsp;</label>
                    <input type="text" 
                    name="preparatoria" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->preparatoria}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="institucion_educativa_prepa" class="font-semibold">Institución educativa: &nbsp;</label>
                    <input type="text" 
                    name="institucion_educativa_prepa" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->institucion_educativa_prepa}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo_de_realizacion_prepa" class="font-semibold">Período de realización: &nbsp;</label>
                    <input type="text" 
                    name="periodo_de_realizacion_prepa" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$esco->periodo_de_realizacion_prepa}}"
                    ></input>
                </div>
                        
                <button type="submit" class="text-red-500 border font-bold border-solid border-red-500 pl-6 pr-6 pt-2 pb-2 mt-6 hover:ring "><i class="fa-regular fa-floppy-disk"></i> Guardar cambios</button>
            </div>
        </form>
    </x-card>
</x-layout>