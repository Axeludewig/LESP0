<div class="shadow rounded-lg border ">
    <div class="m-4 flex flex-col">
        <div>
            <span class="font-semibold">Número total de horas: </span>{{$externo->horas_totales}}
        </div>
        <div class="flex justify-center text-center">
            @if ($externo->status === 'Pendiente')
            <div class="border rounded-lg bg-yellow-600 text-white w-[250px]">
                <span class="font-semibold">Status: </span>{{$externo->status}}
            </div>
            @endif
            @if ($externo->status === 'Validado')
            <div class="border rounded-lg bg-green-600 text-white w-[250px]">
                <span class="font-semibold">Status: </span>{{$externo->status}}
            </div>
            @endif
        </div>
    </div>
    <div class="flex flex-col items-center justify-center">
        @if ($externo->archivo != null)
            <a target="_blank" href="{{asset('storage/' . $externo->archivo)}}" class="border-2 bg-mich4 border-black mt-4 mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 1</a>
            @endif
            @if ($externo->archivo2 != null)
            <a target="_blank" href="{{asset('storage/' . $externo->archivo2)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 2</a>
            @endif
            @if ($externo->archivo3 != null)
            <a target="_blank" href="{{asset('storage/' . $externo->archivo3)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 3</a>
            @endif
            @if ($externo->archivo4 != null)
            <a target="_blank" href="{{asset('storage/' . $externo->archivo4)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Evidencia 4</a>
            @endif
    </div>
    <div>
        <form action="/users/delete_externos/{{$externo->id}}" method="POST">
            @csrf
            @method('DELETE')
        <button class="shadow rounded-lg border px-4 py-2 bg-laravel text-white m-4" data-modal-target="popup-modal{{ $externo->id }}" data-modal-toggle="popup-modal{{ $externo->id }}" type="button" >Eliminar</button>
        <div id="popup-modal{{ $externo->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{ $externo->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas eliminar este registro? <br> Número total de horas: {{$externo->horas_totales}} <br> Status: {{$externo->status}}</h3>
                        
                        <button data-modal-hide="popup-modal{{ $externo->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Sí, estoy seguro
                        </button>
                        <button data-modal-hide="popup-modal{{ $externo->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
