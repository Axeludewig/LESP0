@props(['exp'])
<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center font-semibold">
        <h3 class="text-3xl ">
            <p>Experiencia profesional</p>
        </h3>
    </div>
    <x-card>
        <form action="/users/exp/{{auth()->user()->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col items-center place-content-center content-center gap-3 mt-6">
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}"></input>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Puesto #1</span>
                </div>
                <div class="flex flex-row">
                    <label for="puesto1" class="font-semibold">Puesto: &nbsp;</label>
                    <input type="text" 
                    name="puesto1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->puesto1}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="experiencia1" class="font-semibold">Experiencia: &nbsp;</label>
                    <input type="text" 
                    name="experiencia1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->experiencia1}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo1" class="font-semibold">Período en el cargo: &nbsp;</label>
                    <input type="text" 
                    name="periodo1" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->periodo1}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Puesto #2</span>
                </div>
                <div class="flex flex-row">
                    <label for="puesto2" class="font-semibold">Puesto: &nbsp;</label>
                    <input type="text" 
                    name="puesto2" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->puesto2}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="experiencia2" class="font-semibold">Experiencia: &nbsp;</label>
                    <input type="text" 
                    name="experiencia2" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->experiencia2}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo2" class="font-semibold">Período en el cargo: &nbsp;</label>
                    <input type="text" 
                    name="periodo2" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->periodo2}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Puesto #3</span>
                </div>
                <div class="flex flex-row">
                    <label for="puesto3" class="font-semibold">Puesto: &nbsp;</label>
                    <input type="text" 
                    name="puesto3" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->puesto3}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="experiencia3" class="font-semibold">Experiencia: &nbsp;</label>
                    <input type="text" 
                    name="experiencia3" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->experiencia3}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo3" class="font-semibold">Período en el cargo: &nbsp;</label>
                    <input type="text" 
                    name="periodo3" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->periodo3}}"
                    ></input>
                </div>
                <div class="text-center text-xl font-semibold border-b-4 border-laravel m-4 w-1/4 p-2">
                    <span class="">Puesto #4</span>
                </div>
                <div class="flex flex-row">
                    <label for="puesto4" class="font-semibold">Puesto: &nbsp;</label>
                    <input type="text" 
                    name="puesto4" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->puesto4}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="experiencia4" class="font-semibold">Experiencia: &nbsp;</label>
                    <input type="text" 
                    name="experiencia4" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->experiencia4}}"
                    ></input>
                </div>
                <div class="flex flex-row">
                    <label for="periodo4" class="font-semibold">Período en el cargo: &nbsp;</label>
                    <input type="text" 
                    name="periodo4" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-8"
                    value="{{$exp->periodo4}}"
                    ></input>
                </div>
                
                        
                <button type="submit" class="text-red-500 border font-bold border-solid border-red-500 pl-6 pr-6 pt-2 pb-2 mt-6 hover:ring "><i class="fa-regular fa-floppy-disk"></i> Guardar cambios</button>
            </div>
        </form>
    </x-card>
</x-layout>