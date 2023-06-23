<x-layout>
    <div class="flex justify-center md:mr-80">
        <a href="/listings/create" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
        </a>
    </div>
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16  shadow-xl mb-48 mt-12 border-3 border-slate-300 rounded-xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900">Crear curso en línea</h2>
            <form method="POST" enctype="multipart/form-data" action="/admin/cursoenlinea" id="virtual-form">
                @csrf
                @method('POST')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900">Nombre de la capacitación</label>
                        <input type="text" name="nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                    </div>
                    <input type="hidden" name="numero_consecutivo" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" value="1" required="">
                    <div class="w-full">
                        <label for="modalidad" class="block mb-2 text-sm font-medium text-gray-900">Modalidad a realizar</label>
                        <select name="modalidad" id="modalidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                            value="{{ old('modalidad') }}">
                            <option value="curso">Curso</option>
                            <option value="sesion">Sesión</option>
                            <option value="congreso">Congreso</option>
                            <option value="diplomado">Diplomado</option>
                            <option value="simposio">Simposio</option>
                            <option value="curso-taller">Curso-Taller</option>
                            <option value="videoconferencia">Videoconferencia</option>
                        </select>
                        @error('modalidad')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <label for="tipo" class="hidden text-lg mb-2">Tipo de capacitación:</label>
                    <input type="hidden" name="tipo" value="Virtual" id="tipo">
                    @error('tipo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="nombre_del_responsable" class="block mb-2 text-sm font-medium text-gray-900">Nombre del responsable</label>
                        @php
                        $allusers = DB::table('users')->orderBy('nombre')->get();
                        @endphp
                            <select required id="nombre_del_responsable" name="nombre_del_responsable" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option value="">Seleccionar responsable</option>
                                @foreach($allusers as $user)
                                    <option value="{{ $user->id }}" {{ old('nombre_del_responsable') == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                                @endforeach
                            </select>
                            @error('nombre_del_responsable')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="coordinacion" class="block mb-2 text-sm font-medium text-gray-900 ">Coordinación repsonsable</label>
                            <select name="coordinacion" id="coordinacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="12" required="" value="{{ old('coordinacion') }}"> 
                                <option value="todo-el-personal-de-la-unidad">Todo el personal de la unidad</option>
                                <option value="coordinacion-de-vigilancia-epidemiologica">Coordinación de Vigilancia Epidemiológica
                                </option>
                                <option value="coordinacion-de-vigilancia-contra-riesgos-sanitarios">Coordinación de Vigilancia
                                    Contra Riesgos Sanitarios</option>
                                <option value="coordinacion-de-biologia-molecular">Coordinación de Biologia Molecular</option>
                                <option value="coordinacion-de-cacu">Coordinación de CACU</option>
                                <option value="coordinacion-de-gestion-de-calidad">Coordinación de Gestión de Calidad</option>
                                <option value="coordinacion-administrativa">Coordinación Administrativa</option>
                                <option value="coordinacion-de-la-red-estatal-de-laboratorios">Coordinación de la Red Estatal de
                                    Laboratorios</option>
                                <option value="coordinacion-de-tecnologias-de-la-informacion">Coordinación de tecnologías de la
                                    información</option>
                                <option value="coordinacion-de-ensenanza-e-investigacion">Coordinación de Enseñanza e Investigación
                                </option>
                            </select>
                            @error('coordinacion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div>
                            <label for="dirigido" class="block mb-2 text-sm font-medium text-gray-900 ">Personal al que va dirigido</label>
                            <input required type="text" id="dirigido" name="dirigido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " value="{{ old('dirigido') }}">
                            @error('dirigido')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="numero_de_asistentes" class="block mb-2 text-sm font-medium text-gray-900 ">No. de asistentes esperados</label>
                            <input type="number" name="numero_de_asistentes" id="numero_de_asistentes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="" value="{{ old('numero_de_asistentes') }}">
                            @error('numero_de_asistentes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="horas_teoricas" class="block mb-2 text-sm font-medium text-gray-900 ">Horas teóricas:</label>
                            <input required type="number" id="horas_teoricas" name="horas_teoricas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('horas_teoricas') }}">
                            @error('horas_teoricas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="horas_practicas" class="block mb-2 text-sm font-medium text-gray-900 ">Horas prácticas:</label>
                            <input required type="number" id="horas_practicas" name="horas_practicas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('horas_practicas') }}">
                            @error('horas_practicas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="">
                            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 ">Categoría:</label>
                            <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                value="{{ old('categoria') }}">
                                <option>Cursos técnicos del proceso analítico</option>
                                <option> Cursos del sistema de gestión integral (Calidad)</option>
                                <option>Cursos de Riesgo biológico (Bioseguridad) y gestión ambiental en laboratorios</option>
                                <option>Cursos de tecnologías de la información e informática</option>
                                <option>Cursos de enseñanza e investigación</option>
                                <option>Cursos relacionados con el cuidado de la salud</option>
                                <option>Cursos sobre Desarrollo Organizacional LESP MICHOACÁN</option>
            
                            </select>
                            @error('categoria')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                            <input hidden name="auditorio" value="Virtual"/>

                        <div class="">
                            <label for="fecha_de_inicio" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de inicio:</label>
                            <input type="date" id="fecha_de_inicio" name="fecha_de_inicio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ date('Y-m-d') }}">
                            @error('fecha_de_inicio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="">
                            <label for="fecha_de_terminacion"  class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de término:</label>
                            <input type="date" id="fecha_de_terminacion" name="fecha_de_terminacion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ date('Y-m-d') }}">
                            @error('fecha_de_terminacion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="forma_de_evaluacion" class="block mb-2 text-sm font-medium text-gray-900 ">Forma de evaluación:</label>
                            <select locked id="forma_de_evaluacion" name="forma_de_evaluacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option value="Ninguna">Ninguna</option>
                            </select>
                            @error('forma_de_evaluacion')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="">
                            <label for="porcentaje_asistencia" class="block mb-2 text-sm font-medium text-gray-900 ">Porcentaje de asistencia
                                para acreditar:</label>
                                <select id="porcentaje_asistencia" name="porcentaje_asistencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " value="{{ old('porcentaje_asistencia') }}">
                                    <option value="0" selected>NA</option>
                                    <option value="10">10%</option>
                                    <option value="20">20%</option>
                                    <option value="30">30%</option>
                                    <option value="40">40%</option>
                                    <option value="50">50%</option>
                                    <option value="60">60%</option>
                                    <option value="70">70%</option>
                                    <option value="80">80%</option>
                                    <option value="90">90%</option>
                                    <option value="100">100%</option>
                                </select>
                            @error('porcentaje_asistencia')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="">
                            <label for="calificacion_requerida"  class="block mb-2 text-sm font-medium text-gray-900 ">Calificación requerida:</label>
                            <select id="calificacion_requerida" name="calificacion_requerida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " value="{{ old('calificacion_requerida') }}">
                                <option value="0" selected>NA</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                            @error('calificacion_requerida')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div>
                            <label for="evaluacion_adquirida" class="block mb-2 text-sm font-medium text-gray-900 ">¿Requiere evaluación adquirida?</label>
                            <select id="evaluacion_adquirida" name="evaluacion_adquirida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option value="No" selected>No</option>
                                <option value="Si">Sí</option>
                            </select>
                        </div>
                        <input type="text" id="age1" name="status" value="Disponible" hidden="true">
                        <div class="">
                            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Palabras clave (Separadas por una coma)
                            </label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " name="tags"
                                placeholder="Ejemplo: Calidad, Capacitación de Perfil, etc." value="{{ old('tags') }}" />
            
                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="objetivo_general" class="block mb-2 text-sm font-medium text-gray-900 ">Objetivo general de la capacitación</label>
                            <textarea id="objetivo_general" name="objetivo_general" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Tu descripción aquí"></textarea>
                        </div>
                    </div>

                    <div class="flex-col gap-6 my-6">
                            <div class="border-4 p-4 m-2">
                            <label for="video" class="block font-semibold text-gray-700">Subir video</label>
                            <input id="video" type="file" name="video" class="mt-1">
                            </div>
            
                            <div class="border-4 p-4 m-2">
                            <label for="pdf" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                            <input type="file" name="pdf" id="pdf" ">
                            </div>
            
                            <div class="border-4 p-4 m-2">
                            <label for="pdf2" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                            <input type="file" name="pdf2" id="pdf">
                            </div>
            
                            <div class="border-4 p-4 m-2">
                            <label for="pdf3" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                            <input type="file" name="pdf3" id="pdf">
                            </div>
            
                            <div class="border-4 p-4 m-2">
                            <label for="pdf4" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                            <input type="file" name="pdf4" id="pdf">
                            </div>
                    </div>            
                            

                        
                <div class="">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 ">Cuestionario</h2>
                <p class="">Agregar preguntas y sus opciones de respuesta,</p>
                <p class="mb-4">así como las opciones correctas</p>
                <input type="hidden" name="id_evaluacion" value="x">
                <div class="">
                    <label for="pregunta1" class="block mb-2 text-sm font-medium text-gray-900 ¿">
                        Pregunta #1:
                    </label>
                    <input type="text" name="pregunta1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4" >
                    <div class="flex-col items-center w-1/2">
                        <div class="">
                        <label for="pregunta1_opcion1" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta1_opcion1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                        <label for="pregunta1_opcion1" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta1_opcion2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" >
                        </div>
                    </div>

                    <label for="pregunta2" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Pregunta #2:
                    </label>
                    <input type="text" name="pregunta2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta2_opcion1" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta2_opcion1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                        <label for="pregunta2_opcion2" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta2_opcion2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                        </div>
                    </div>

                    <label for="pregunta3" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Pregunta #3:
                    </label>
                    <input type="text" name="pregunta3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta3_opcion1" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta3_opcion1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                        <label for="pregunta3_opcion2" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta3_opcion2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                        </div>
                    </div>

                    <label for="pregunta4" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Pregunta #4:
                    </label>
                    <input type="text" name="pregunta4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta4_opcion1" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta4_opcion1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4" >
                        <label for="pregunta4_opcion2" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta4_opcion2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4" >
                        </div>
                    </div>

                    <label for="pregunta5" class="block mb-2 text-sm font-medium text-gray-900 ">
                        Pregunta #5:
                    </label>
                    <input type="text" name="pregunta5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta5_opcion1" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta5_opcion1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  mb-4" >
                        <label for="pregunta5_opcion2" class="block mb-2 text-sm font-medium text-gray-900 ">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta5_opcion2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 mb-4" >
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="mb-4 text-xl font-bold text-gray-900  text-center">Respuestas</h2>
                    <p class="text-center mb-4">Agregar la opción correcta de cada pregunta</p>
                    <div class="flex flex-col gap-4">
                        <div class="flex flex-col text-center">
                            <p>Respuesta #1:</p>
                            <div class="flex flex-row items-center justify-center gap-3">
                            <label for="p1r1" class="inline-block text-lg mb-2">Opción 1</label> 
                            <input type="radio" name="pregunta1_respuesta" value="1" id="p1r1">
                            <label for="p1r2" class="inline-block text-lg mb-2">Opción 2</label> 
                            <input type="radio" name="pregunta1_respuesta" value="2" id="p1r2">
                            </div>
                        </div>
                        
                        <div class="flex flex-col text-center">
                            <p>Respuesta #2:</p>
                            <div class="flex flex-row items-center justify-center gap-3">
                            <label for="p2r1" class="inline-block text-lg mb-2">Opción 1</label> 
                            <input type="radio" name="pregunta2_respuesta" value="1" id="p2r1">
                            <label for="p2r2" class="inline-block text-lg mb-2">Opción 2</label> 
                            <input type="radio" name="pregunta2_respuesta" value="2" id="p2r2">
                            </div>
                        </div>
                        
                        <div class="flex flex-col text-center" >
                            <p>Respuesta #3:</p>
                            <div class="flex flex-row items-center justify-center gap-3">
                            <label for="p3r1" class="inline-block text-lg mb-2">Opción 1</label> 
                            <input type="radio" name="pregunta3_respuesta" value="1" id="p3r1">
                            <label for="p3r2" class="inline-block text-lg mb-2">Opción 2</label> 
                            <input type="radio" name="pregunta3_respuesta" value="2" id="p3r2">
                            </div>
                        </div>
                        
                        <div class="flex flex-col text-center">
                            <p>Respuesta #4:</p>
                            <div class="flex flex-row items-center justify-center gap-3">
                            <label for="p4r1" class="inline-block text-lg mb-2">Opción 1</label> 
                            <input type="radio" name="pregunta4_respuesta" value="1" id="p4r1">
                            <label for="p4r2" class="inline-block text-lg mb-2">Opción 2</label> 
                            <input type="radio" name="pregunta4_respuesta" value="2" id="p4r2">
                            </div>
                        </div>
                        
                        <div class="flex flex-col text-center">
                            <p>Respuesta #5:</p>
                            <div class="flex flex-row items-center justify-center gap-3">
                            <label for="p5r1" class="inline-block text-lg mb-2">Opción 1</label> 
                            <input type="radio" name="pregunta5_respuesta" value="1" id="p5r1">
                            <label for="p5r2" class="inline-block text-lg mb-2">Opción 2</label> 
                            <input type="radio" name="pregunta5_respuesta" value="2" id="p5r2">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 font-medium text-center text-white bg-laravel rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                        Crear curso
                    </button>
                </div>
                </form>
            </div>
        </section>
</x-layout>
