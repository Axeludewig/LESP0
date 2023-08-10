<x-layout>
    <a href="/users/evaluar" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="shadow border rounded-lg m-12 p-8">
        <form method="post" action="/users/evaluar">
        @csrf
        <input hidden name="id_evaladq" value="{{$eval->id}}" />
        <input hidden name="id_curso" value="{{$curso->id}}" />
        <input hidden name="id_evaluador" value="{{auth()->user()->id}}" />
        <input hidden name="id_evaluado" value="{{$user->id}}" />

        <div class="m-8">
            <h1 class="font-semibold text-center text-2xl mb-4">Evaluación de la capacitación adquirida</h1>
            <div class="flex flex-col justify-center shadow border rounded-lg m-2 text-center">
                <p class="p-2 font-semibold text-lg">Datos del Evaluador</p>
                <div class="grid md:grid-cols-3 grid-cols-1 border">
                    <div class="border p-2 overflow-scroll md:overflow-clip"> 
                        <p><span class="font-semibold">Nombre completo: </span>{{auth()->user()->nombre_completo}}</p>
                        <input hidden name="nombre_completo_evaluador" value="{{auth()->user()->nombre_completo}}" />
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Puesto del evaluador: </span>{{auth()->user()->puesto}}</p>
                        <input hidden name="puesto_evaluador" value="{{auth()->user()->puesto}}" />
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Firma del evaluador: </span></p>
                        <input hidden name="firma_del_evaluador" value="N/A" />
                    </div>
                </div>
            </div>
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
        </div>

        <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col">
            <p class="font-semibold">Nombre de la capacitación a evaluar:</p>
            <p>{{$curso->nombre}}</p>
            <input hidden name="nombre_capacitacion" value="{{$curso->nombre}}" />
        </div>
        <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col">
            <p><span class="font-semibold">Instrucciones:<br></span> Evaluar el desempeño del personal a su cargo colocando una X dentro del cuadro que se considere se apega al desempeño obtenido, para lo cual es necesario considerar la siguiente escala:<br></p>
            <p>Muy bueno (5), Bueno (4), Regular (3), Deficiente (2), Malo (1)</p>
        </div>
        <div class="text-center md:border md:shadow rounded-lg m-2 mx-24 p-4 flex flex-col gap-6">
            <div class="flex gap-24 justify-center">
                <div class="w-[300px] ">
                    <label for="evaluacion1">Mayor destreza en el desarrollo de sus actividades</label>
                </div>
                <select name="evaluacion1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="flex gap-24 justify-center">
                <div class="w-[300px]">
                    <label for="evaluacion2">Nivel de conocimientos adquiridos</label>
                </div>
                <select name="evaluacion2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="flex gap-24 justify-center">
                <div class="w-[300px]">
                    <label for="evaluacion3">Mejora en la forma en que desempeña sus actividades</label>
                </div>
                <select name="evaluacion3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="flex gap-24 justify-center">
                <div class="w-[300px]">
                    <label for="evaluacion4">Utilidad de la capacitación adquirida para la realización de su trabajo</label>
                </div>
                <select name="evaluacion4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="flex gap-24 justify-center">
                <div class="w-[300px]">
                    <label for="evaluacion5">Demuestra una aplicación de los conocimientos adquiridos</label>
                </div>
                <select name="evaluacion5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div class="flex gap-24 justify-center">
                    <div class="w-[300px]">
                        <label for="evaluacion6">Difunde el conocimiento adquirido</label>
                    </div>
                    <select name="evaluacion6" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div>
            <div class="flex gap-24 justify-center">
                    <div class="w-[300px]">
                        <label for="evaluacion7">Muestra un dominio sobre el conocimiento adquirido</label>
                    </div>
                    <select name="evaluacion7" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div>
            <div class="flex gap-24 justify-center">
                <div class="w-[300px]">
                    <label for="evaluacion8">Aceptación de la capacitación para mejorar sus actividades</label>
                </div>
                <select name="evaluacion8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
        </div>
        <div class="flex gap-4 justify-center items-center">
            <label for="resultado" class="font-semibold">Resultado: </label>
            <input type="text" name="resultado" id="resultado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
        </div>
        <div class="text-center">
            <p><span class="font-semibold">Malo</span> de 1 a 8, <span class="font-semibold">Deficiente</span> de 9 a 16, <span class="font-semibold">Regular</span> de 17 a 24, <span class="font-semibold">Bueno</span> de 25 a 32, <span class="font-semibold">Muy bueno</span> de 33 a 40</p>
        </div>
        </div>
        <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col  justify-center gap-4 items-center">
            <div class="flex justify-center items-center gap-4">
                <label for="necesidad_capacitacion">¿Usted ha detectado en el personal evaluado alguna necesidad de capacitación?</label>
                <select name="necesidad_capacitacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5">
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                </select>
            </div>
            <label for="descripcion_necesidad">De responder si en la pregunta anterior describa cual es la necesidad:</label>
            <textarea name="descripcion_necesidad" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 "></textarea>
            <div class="flex justify-center items-center gap-4">
                <label for="calificacion">Calificación obtenida en la evaluación /examen del curso (cuando aplique):</label>
                <input type="number" name="calificacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block  p-2.5"></input>
            </div>
        </div>
        <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col  justify-center gap-4 items-center">
            <p>Validación por coordinación de enseñanza: PENDIENTE</p>
            <input hidden name="validacion_ensenanza" value="N/A" />
            <button type="submit" class="bg-laravel text-white px-4 py-2 rounded-lg text-center">Evaluar</button>
        </div>
        
        </form>
    </div>
    <script>
        $(document).ready(function() {
            // Whenever a select element changes
            $('select[name^="evaluacion"]').on('change', function() {
                var total = 0;
                
                // Loop through all the select elements
                $('select[name^="evaluacion"]').each(function() {
                    var selectedValue = parseInt($(this).val());
                    if (!isNaN(selectedValue)) {
                        total += selectedValue;
                    }
                });
                
                // Update the resultado input with the calculated total
                $('#resultado').val(total);
            });
        });
        </script>
</x-layout>