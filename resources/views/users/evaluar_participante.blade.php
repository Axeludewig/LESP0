<x-layout>
    <a href="/users/evaluar" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="shadow border rounded-lg m-12 p-8">
        <div class="m-8">
            <h1 class="font-semibold text-center text-2xl mb-4">Evaluación de la capacitación adquirida</h1>
            <div class="flex flex-col justify-center shadow border rounded-lg m-2 text-center">
                <p class="p-2 font-semibold text-lg">Datos del Evaluador</p>
                <div class="grid md:grid-cols-3 grid-cols-1 border">
                    <div class="border p-2 overflow-scroll md:overflow-clip"> 
                        <p><span class="font-semibold">Nombre completo: </span>{{auth()->user()->nombre_completo}}</p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Puesto del evaluador: </span>{{auth()->user()->puesto}}</p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Firma del evaluador: </span></p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center shadow border rounded-lg m-2 text-center">
                <p class="p-2 font-semibold text-lg">Datos del Evaluado</p>
                <div class="grid md:grid-cols-3 grid-cols-1 border">
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Nombre completo: </span>{{$user->nombre_completo}}</p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Puesto del evaluado: </span>{{$user->puesto}}</p>
                    </div>
                    <div class="border p-2 overflow-scroll md:overflow-clip">
                        <p><span class="font-semibold">Área a la que pertenece: </span>{{$user->area}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center border shadow rounded-lg m-2 md:mx-24 p-4 flex flex-col">
            <p class="font-semibold">Nombre de la capacitación a evaluar:</p>
            <p>{{$curso->nombre}}</p>
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
    </div>
</x-layout>