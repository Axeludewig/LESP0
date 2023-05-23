@php
    $true_actividad = DB::table('actividades')->where('id_curso', $actividad->id)->first();
@endphp

<x-layout>
    <div class="flex items-center justify-center">
        <div class="border-2 p-4 md:w-1/2 rounded-xl shadow-xl mb-48">
            <x-card class="p-10 max-w-lg mt-12 mx-auto mb-12 rounded-xl flex flex-col gap-6">
                    <div class="text-center font-semibold border-2 p-6  rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        {{$actividad->nombre}}
                        <p class="font-medium">Ponente: {{$actividad->nombre_del_responsable}}</p>
                    </div>
                    <div class="text-center font-semibold border-2 p-6  rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        Descripción de la actividad
                        <p class="font-medium">{{$true_actividad->descripcion}}</p>
                    </div>
                    @if ($true_actividad->archivo1 != null)
                    <div class="text-center font-semibold border-2 p-6  rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        <a target="_blank" href="{{asset('storage/' . $true_actividad->archivo1)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar archivo</a>
                    </div>
                    @endif
                    @if ($true_actividad->archivo2 != null)
                    <div class="text-center font-semibold border-2 p-6  rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        <a target="_blank" href="{{asset('storage/' . $true_actividad->archivo2)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar archivo</a>
                    </div>
                    @endif
                    @if ($true_actividad->archivo3 != null)
                    <div class="text-center font-semibold border-2 p-6  rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        <a target="_blank" href="{{asset('storage/' . $true_actividad->archivo3)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar archivo</a>
                    </div>
                    @endif
                    <div class="text-center font-semibold border-2 p-6  rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        SUBIR EVIDENCIAS
                        <form method="POST" action="/users/actividades"  enctype="multipart/form-data">
                            @csrf
                            <div class="flex flex-col gap-6 m-4 p-4">
                            <input hidden name="id_user" value="{{auth()->user()->id}}">
                            <input hidden name="id_curso" value="{{$actividad->id}}">
                            <input hidden name="id_actividad" value="{{$true_actividad->id}}">
                            <input type="file" name="archivo1" id="archivo1">
                            <input type="file" name="archivo2" id="archivo2">
                            <input type="file" name="archivo3" id="archivo3">
                            </div>

                           
                            <button  data-modal-target="popup-modal3" data-modal-toggle="popup-modal3" type="button"  class="inline-flex items-center px-5 py-2.5  text-sm font-medium text-center text-white bg-laravel rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 hover:scale-105 hover:text-xl">
                                Enviar
                            </button>
                            <div id="popup-modal3" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal3">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold text-2xl">Archivos subidos: <p id="conteoValue"></p></span>
                                                ¿Estás seguro que deseas enviar esta respuesta? Por favor, revisa tus archivos y confirma.</h3>
                                            <button data-modal-hide="popup-modal3" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Sí, estoy seguro
                                            </button>
                                            <button data-modal-hide="popup-modal3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
            </x-card>
        </div>
    </div>
</x-layout>
<script>
    function updateConteo() {
        var conteo = 0;
        var fileInput1 = document.getElementById('archivo1');
        var fileInput2 = document.getElementById('archivo2');
        var fileInput3 = document.getElementById('archivo3');

        if (fileInput1.files.length > 0) {
            conteo++;
        }
        if (fileInput2.files.length > 0) {
            conteo++;
        }
        if (fileInput3.files.length > 0) {
            conteo++;
        }

        // Display the conteo value in the HTML element
        document.getElementById('conteoValue').innerText = conteo;
    }

    // Call the function initially to set the count
    updateConteo();

        var fileInput1 = document.getElementById('archivo1');
        var fileInput2 = document.getElementById('archivo2');
        var fileInput3 = document.getElementById('archivo3');

        fileInput1.addEventListener('change', updateConteo);
        fileInput2.addEventListener('change', updateConteo);
        fileInput3.addEventListener('change', updateConteo);
</script>