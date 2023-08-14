@php
    $evaluador = DB::table('users')->where('id', $eval->id_evaluador)->first();
@endphp

<x-layout>
    <a href="/admin/evaladq/{{$eval->id_evaladq}}" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="border rounded-lg shadow p-4">
        <div class="text-center">
            <h1 class="font-semibold text-xl m-4">EVALUACIÓN DE LA CAPACITACIÓN ADQUIRIDA</h1>
            <div class="flex flex-col justify-center shadow border rounded-lg m-2 text-center">
                <p class="p-2 font-semibold text-lg">Datos del Evaluado</p>
                <div class="grid md:grid-cols-3 grid-cols-1 border">
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Nombre completo: </span>{{$user->nombre_completo}}</p>
                        <input hidden name="nombre_evaluado" value="{{$user->nombre_completo}}" />
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Puesto del evaluado: </span>{{$user->puesto}}</p>
                        <input hidden name="puesto_evaluado" value="{{$user->puesto}}" />
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Área a la que pertenece: </span>{{$user->area}}</p>
                        <input hidden name="area_evaluado" value="{{$user->area}}" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center shadow border rounded-lg m-2 text-center">
                <p class="p-2 font-semibold text-lg">Datos del Evaluador</p>
                <div class="grid md:grid-cols-3 grid-cols-1 border">
                    <div class="border p-2 overflow-scroll md:overflow-clip"> 
                        <p><span class="font-semibold">Nombre completo: </span>{{$evaluador->nombre_completo}}</p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Puesto del evaluador: </span>{{$evaluador->puesto}}</p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Firma del evaluador: </span></p>
                    </div>
                </div>
            </div>
            
            <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col">
                <p class="font-semibold">Nombre de la capacitación a evaluar:</p>
                <p>{{$curso->nombre}}</p>
                <input hidden name="nombre_capacitacion" value="{{$curso->nombre}}" />
            </div>


            <div class="text-center md:border md:shadow rounded-lg m-2 mx-24 p-4 flex flex-col gap-6">
                <h1 class="font-semibold text-xl">RESULTADOS</h1>
                <div class="flex gap-24 justify-center items-center">
                    
                    <div class="w-[300px] ">
                        <label for="evaluacion1">Mayor destreza en el desarrollo de sus actividades</label>
                    </div>
                    <p>{{$eval->evaluacion1}}</p>
                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <label for="evaluacion2">Nivel de conocimientos adquiridos</label>
                    </div>
                    <p>{{$eval->evaluacion2}}</p>
                </div>
                <div class="flex gap-24 justify-center  items-center">
                    <div class="w-[300px]">
                        <label for="evaluacion3">Mejora en la forma en que desempeña sus actividades</label>
                    </div>
                    <p>{{$eval->evaluacion3}}</p>
                </div>
                <div class="flex gap-24 justify-center  items-center">
                    <div class="w-[300px]">
                        <label for="evaluacion4">Utilidad de la capacitación adquirida para la realización de su trabajo</label>
                    </div>
                    <p>{{$eval->evaluacion4}}</p>
                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <label for="evaluacion5">Demuestra una aplicación de los conocimientos adquiridos</label>
                    </div>
                    <p>{{$eval->evaluacion5}}</p>
                </div>
                <div class="flex gap-24 justify-center items-center">
                        <div class="w-[300px]">
                            <label for="evaluacion6">Difunde el conocimiento adquirido</label>
                        </div>
                        <p>{{$eval->evaluacion6}}</p>
                </div>
                <div class="flex gap-24 justify-center items-center">
                        <div class="w-[300px]">
                            <label for="evaluacion7">Muestra un dominio sobre el conocimiento adquirido</label>
                        </div>
                        <p>{{$eval->evaluacion7}}</p>
                </div>
                <div class="flex gap-24 justify-center items-center">
                    <div class="w-[300px]">
                        <label for="evaluacion8">Aceptación de la capacitación para mejorar sus actividades</label>
                    </div>
                    <p>{{$eval->evaluacion8}}</p>
            </div>
            <div class="flex gap-4 justify-center items-center">
                <label for="resultado" class="font-semibold">Resultado: </label>
                <p>{{$eval->resultado}} - {{$eval->interpretacion_resultado}}</p>
            </div>
            <div class="text-center">
                <p><span class="font-semibold">Malo</span> de 1 a 8, <span class="font-semibold">Deficiente</span> de 9 a 16, <span class="font-semibold">Regular</span> de 17 a 24, <span class="font-semibold">Bueno</span> de 25 a 32, <span class="font-semibold">Muy bueno</span> de 33 a 40</p>
            </div>
            </div>

            <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col  justify-center gap-4 items-center">
                <div class="flex justify-center items-center gap-4">
                    <label for="necesidad_capacitacion">¿Usted ha detectado en el personal evaluado alguna necesidad de capacitación?</label>
                    <p>{{$eval->necesidad_capacitacion}}</p>
                </div>
                <label for="descripcion_necesidad">De responder si en la pregunta anterior describa cual es la necesidad:</label>
                <p>{{$eval->descripcion_necesidad}}</p>
                <div class="flex justify-center items-center gap-4">
                    <label for="calificacion">Calificación obtenida en la evaluación /examen del curso (cuando aplique):</label>
                    <p>{{$eval->calificacion}}</p>
                </div>
            </div>

            <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col  justify-center gap-4 items-center">
                <p>Validación por coordinación de enseñanza:</p>
                <input hidden name="validacion_ensenanza" value="N/A" />
                <a href="/admin/firmar/{{$eval->id_evaladq}}">
                <button class="bg-laravel text-white px-4 py-2 rounded-lg text-center">FIRMAR</button>
                </a>
            </div>


        </div>
    </div>
</x-layout>