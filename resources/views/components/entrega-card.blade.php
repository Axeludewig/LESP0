@props(['revision'])
@php
    $user = DB::table('users')->where('id', $revision->id_user)->first();    
@endphp


<x-card>
    <h3 class="font-semibold text-center text-xl md:text-3xl truncate mb-3">
        {{$user->nombre_completo}}
    </h3>
    <div>
        <div class="flex flex-col md:flex-row items-center justify-center gap-3">
            @if ($revision->archivo1 != null)
            <a target="_blank" href="{{asset('storage/' . $revision->archivo1)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 1</a>
            @endif
            @if ($revision->archivo2 != null)
            <a target="_blank" href="{{asset('storage/' . $revision->archivo2)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 2</a>
            @endif
            @if ($revision->archivo3 != null)
            <a target="_blank" href="{{asset('storage/' . $revision->archivo3)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 3</a>
            @endif
            </div>
    </div>
    <div class="flex items-center justify-center text-center">
        <form action="/users/aprobar">
            @csrf
            <input type="hidden" name="user" value=" {{$revision->id_user}}" />
            <input type="hidden" name="curso" value=" {{$revision->id_curso}}" />
            <button  data-modal-target="popup-modal{{$revision->id}}" data-modal-toggle="popup-modal{{$revision->id}}" type="button" class="p-4 border-2 bg-laravel text-white rounded-full px-8">
                Aprobar
            </button>
            <div id="popup-modal{{$revision->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{$revision->id}}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas APROBAR a {{$user->nombre_completo}}? Se generará una validación en la bitácora y podrá descargar su constancia.</h3>
                            <button data-modal-hide="popup-modal{{$revision->id}}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Sí, estoy seguro
                            </button>
                            <button data-modal-hide="popup-modal{{$revision->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-card>
