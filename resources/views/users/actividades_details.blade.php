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
                            <input type="file" name="archivo1">
                            <input type="file" name="archivo2">
                            <input type="file" name="archivo3">
                            </div>
                            <button type="submit" class="inline-flex items-center px-5 py-2.5  text-sm font-medium text-center text-white bg-laravel rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 hover:scale-105 hover:text-xl">
                                Enviar
                            </button>
                        </form>
                    </div>
            </x-card>
        </div>
    </div>
</x-layout>