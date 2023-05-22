<x-layout>
    <div class="flex justify-center md:mr-80">
        <a href="/admin/paneldecursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
        </a>
        </div>
    <div class="flex items-center justify-center">
        <div class="border-2 p-4 md:w-1/2 rounded-xl shadow-xl mb-48">
            <x-card class="p-10 max-w-lg mx-auto mt-24 mb-12 rounded-xl">
                <a href="/admin/create_presencial" class="w-full p-0 m-0">
                    <div class="text-center font-semibold border-2 p-6 hover:scale-105 rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        Crear un curso presencial
                    </div>
                </a>
            </x-card>
            
            <x-card class="p-10 max-w-lg mx-auto mt-12 mb-12 rounded-xl">
                <a href="/admin/create_enlinea" class="w-full p-0 m-0">
                    <div class="text-center font-semibold border-2 p-6 hover:scale-105 rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        Crear un curso en línea
                    </div>
                </a>
            </x-card>

            <x-card class="p-10 max-w-lg mx-auto mt-12 mb-24 rounded-xl">
                <a href="/admin/create_actividad" class="w-full p-0 m-0">
                    <div class="text-center font-semibold border-2 p-6 hover:scale-105 rounded-xl hover:ring bg-white shadow-xl hover:text-xl hover:text-blue-600">
                        Crear una actividad
                    </div>
                </a>
            </x-card>
        </div>
    </div>

    <!--
    <x-card class="p-10 max-w-lg mx-auto mt-24 ">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Crear curso</h2>
            <p class="mb-4">Tipo de capacitación:</p>
        </header>
        <select id="course-type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-6">
            <option value="">Elegir una opción</option>
            <option value="physical">Curso presencial</option>
            <option value="virtual">Curso en línea</option>
          </select>
          
          <form method="POST" enctype="multipart/form-data" action="/admin/cursoenlinea" id="virtual-form" style="display:none;">
            @csrf
            @method('POST')
            <div class="mb-6">
                <label for="nombre" class="inline-block text-lg mb-2">
                    Nombre de la capacitación:
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre"
                    value="{{ old('nombre') }}" />

                @error('nombre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="numero_consecutivo" class="inline-block text-lg mb-2">
                    Número consecutivo de la capacitación:
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="numero_consecutivo"
                    value="{{ old('numero_consecutivo') }}" />

                @error('numero_consecutivo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="modalidad" class="inline-block text-lg mb-2">Modalidad a realizar:</label>
                <select id="modalidad" name="modalidad" class="border border-gray-200 rounded p-2 w-full"
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

            <div class="mb-6">
                <label for="tipo" class="hidden text-lg mb-2">Tipo de capacitación:</label>
                <input type="hidden" name="tipo" value="Virtual" id="tipo">
                @error('tipo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                @php
                    $allusers = DB::table('users')->orderBy('nombre')->get();
                @endphp
                <label for="nombre_del_responsable" class="inline-block text-lg mb-2">Nombre del responsable del evento de capacitación:</label>
                <select id="nombre_del_responsable" name="nombre_del_responsable" class="border border-gray-200 rounded p-2 w-full">
                    <option value="">Seleccionar responsable</option>
                    @foreach($allusers as $user)
                        <option value="{{ $user->id }}" {{ old('nombre_del_responsable') == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                    @endforeach
                </select>
                @error('nombre_del_responsable')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="coordinacion" class="inline-block text-lg mb-2">Coordinación responsable de la
                    capacitación:</label>
                <select id="coordinacion" name="coordinacion" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ old('coordinacion') }}">
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

            <div class="mb-6">
                <label for="dirigido" class="inline-block text-lg mb-2">Personal al que va dirigido:</label>
                <input type="text" id="dirigido" name="dirigido" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ old('dirigido') }}">
                @error('dirigido')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="numero_de_asistentes" class="inline-block text-lg mb-2">N° de Asistentes esperados:</label>
                <input type="number" id="numero_de_asistentes" name="numero_de_asistentes"
                    class="border border-gray-200 rounded p-2 w-full" value="{{ old('numero_de_asistentes') }}">
                @error('numero_de_asistentes')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="horas_teoricas" class="inline-block text-lg mb-2">Horas teóricas:</label>
                <input type="number" id="horas_teoricas" name="horas_teoricas"
                    class="border border-gray-200 rounded p-2 w-full" value="{{ old('horas_teoricas') }}">
                @error('horas_teoricas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="horas_practicas" class="inline-block text-lg mb-2">Horas prácticas:</label>
                <input type="number" id="horas_practicas" name="horas_practicas"
                    class="border border-gray-200 rounded p-2 w-full" value="{{ old('horas_practicas') }}">
                @error('horas_practicas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="categoria" class="inline-block text-lg mb-2">Categoría:</label>
                <select id="categoria" name="categoria" class="border border-gray-200 rounded p-2 w-full"
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

            <div class="mb-2">
                <label for="auditorio" class="hidden text-lg mb-2">Auditorio:</label>
                <input type="hidden" name="auditorio" value="Virtual">
                @error('auditorio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="fecha_de_inicio" class="inline-block text-lg mb-2">Fecha de inicio:</label>
                <input type="date" id="fecha_de_inicio" name="fecha_de_inicio"
                    class="border border-gray-200 rounded p-2 w-full" value="{{ date('Y-m-d') }}">
                @error('fecha_de_inicio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> 

            <div class="mb-6">
                <label for="fecha_de_terminacion" class="inline-block text-lg mb-2">Fecha de término:</label>
                <input type="date" id="fecha_de_terminacion" name="fecha_de_terminacion"
                    class="border border-gray-200 rounded p-2 w-full" value="{{ date('Y-m-d') }}">
                @error('fecha_de_terminacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="objetivo_general" class="inline-block text-lg mb-2">Objetivo general de la
                    capacitación:</label>
                <textarea id="objetivo_general" name="objetivo_general" class="border border-gray-200 rounded p-2 w-full"
                    value="{{ old('objetivo_general') }}"></textarea>
                @error('objetivo_general')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="hidden" id="forma_de_evaluacion" name="forma_de_evaluacion" class="border hidden border-gray-200 rounded p-2 w-full" value="Virtual">
                <input type="hidden" id="porcentaje_asistencia" name="porcentaje_asistencia"
                        class="border border-gray-200 rounded p-2 w-full" value="100">
                <input type="hidden" id="calificacion_requerida" name="calificacion_requerida"
                        class="border border-gray-200 rounded p-2 w-full" value="80">
                <input type="hidden" id="si" name="evaluacion_adquirida" value="No">
                <input type="text" id="age1" name="status" value="Disponible" hidden="true">
                <input type="hidden" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        value="n/a" />
            </div>

            <div class="mt-4 flex flex-col justify-center items-center gap-4">
                <div class="border-4 p-4 m-1">
                <label for="video" class="block font-semibold text-gray-700">Subir video</label>
                <input id="video" type="file" name="video" class="mt-1">
                </div>

                <div class="border-4 p-4 m-1">
                <label for="pdf" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                <input type="file" name="pdf" id="pdf" ">
                </div>

                <div class="border-4 p-4 m-1">
                <label for="pdf2" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                <input type="file" name="pdf2" id="pdf">
                </div>

                <div class="border-4 p-4 m-1">
                <label for="pdf3" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                <input type="file" name="pdf3" id="pdf">
                </div>

                <div class="border-4 p-4 m-1">
                <label for="pdf4" class="block font-semibold text-gray-700">PDF de apoyo:</label>
                <input type="file" name="pdf4" id="pdf">
                </div>
            </div>
            

            <div class="mt-6 flex flex-col justify-center items-center">
                <h2 class="text-2xl font-bold uppercase mb-1">Cuestionario</h2>
                <p class="">Agregar preguntas y sus opciones de respuesta</p>
                <p class="mb-4">Así como las opciones correctas</p>
                <input type="hidden" name="id_evaluacion" value="x">
                <div class="">
                    <label for="pregunta1" class="inline-block text-lg mb-2">
                        Pregunta #1:
                    </label>
                    <input type="text" name="pregunta1" class="border border-gray-200 rounded p-2 w-full mb-6" >
                    <div class="flex-col items-center w-1/2">
                        <div class="">
                        <label for="pregunta1_opcion1">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta1_opcion1" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        <label for="pregunta1_opcion1">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta1_opcion2" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        </div>
                    </div>

                    <label for="pregunta2" class="inline-block text-lg mb-2">
                        Pregunta #2:
                    </label>
                    <input type="text" name="pregunta2" class="border border-gray-200 rounded p-2 w-full mb-6" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta2_opcion1">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta2_opcion1" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        <label for="pregunta2_opcion2">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta2_opcion2" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        </div>
                    </div>

                    <label for="pregunta3" class="inline-block text-lg mb-2">
                        Pregunta #3:
                    </label>
                    <input type="text" name="pregunta3" class="border border-gray-200 rounded p-2 w-full mb-6" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta3_opcion1">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta3_opcion1" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        <label for="pregunta3_opcion2">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta3_opcion2" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        </div>
                    </div>

                    <label for="pregunta4" class="inline-block text-lg mb-2">
                        Pregunta #4:
                    </label>
                    <input type="text" name="pregunta4" class="border border-gray-200 rounded p-2 w-full mb-6" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta4_opcion1">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta4_opcion1" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        <label for="pregunta4_opcion2">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta4_opcion2" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        </div>
                    </div>

                    <label for="pregunta5" class="inline-block text-lg mb-2">
                        Pregunta #5:
                    </label>
                    <input type="text" name="pregunta5" class="border border-gray-200 rounded p-2 w-full mb-6" >
                    <div class="flex-col items-center w-3/4">
                        <div class="">
                        <label for="pregunta5_opcion1">Opción de respuesta #1:</label>                    
                        <input type="text" name="pregunta5_opcion1" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        <label for="pregunta5_opcion2">Opción de respuesta #2:</label>
                        <input type="text" name="pregunta5_opcion2" class="border border-gray-200 rounded p-2 w-full mb-6" >
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold uppercase mb-1 text-center">Respuestas</h2>
                    <p class="text-center mb-4">Agregar la opción correcta de cada pregunta</p>
                </div>
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
            
            <div class="mt-6 mb-6 flex justify-center">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Crear Curso
                </button>


                <a href="/admin/paneldecursos" class="text-black ml-4"> Volver </a>
            </div>
          </form>
          
            <form method="POST" action="/cursos/crear" enctype="multipart/form-data" id="physical-form" style="display:none;">
                @csrf
                <div class="mb-6">
                    <label for="nombre" class="inline-block text-lg mb-2">
                        Nombre de la capacitación:
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre"
                        value="{{ old('nombre') }}" />
    
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="numero_consecutivo" class="inline-block text-lg mb-2">
                        Número consecutivo de la capacitación:
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="numero_consecutivo"
                        value="{{ old('numero_consecutivo') }}" />
    
                    @error('numero_consecutivo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="modalidad" class="inline-block text-lg mb-2">Modalidad a realizar:</label>
                    <select id="modalidad" name="modalidad" class="border border-gray-200 rounded p-2 w-full"
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
    
                <div class="mb-6">
                    <label for="tipo" class="hidden text-lg mb-2">Tipo de capacitación:</label>
                    <input type="hidden" name="tipo" value="Presencial" id="tipo">
                    @error('tipo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    @php
                        $allusers = DB::table('users')->orderBy('nombre')->get();
                    @endphp
                    <label for="nombre_del_responsable" class="inline-block text-lg mb-2">Nombre del responsable del evento de capacitación:</label>
                    <select id="nombre_del_responsable" name="nombre_del_responsable" class="border border-gray-200 rounded p-2 w-full">
                        <option value="">Seleccionar responsable</option>
                        @foreach($allusers as $user)
                            <option value="{{ $user->id }}" {{ old('nombre_del_responsable') == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                        @endforeach
                    </select>
                    @error('nombre_del_responsable')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="coordinacion" class="inline-block text-lg mb-2">Coordinación responsable de la
                        capacitación:</label>
                    <select id="coordinacion" name="coordinacion" class="border border-gray-200 rounded p-2 w-full"
                        value="{{ old('coordinacion') }}">
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
    
                <div class="mb-6">
                    <label for="dirigido" class="inline-block text-lg mb-2">Personal al que va dirigido:</label>
                    <input type="text" id="dirigido" name="dirigido" class="border border-gray-200 rounded p-2 w-full"
                        value="{{ old('dirigido') }}">
                    @error('dirigido')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="numero_de_asistentes" class="inline-block text-lg mb-2">N° de Asistentes esperados:</label>
                    <input type="number" id="numero_de_asistentes" name="numero_de_asistentes"
                        class="border border-gray-200 rounded p-2 w-full" value="{{ old('numero_de_asistentes') }}">
                    @error('numero_de_asistentes')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="horas_teoricas" class="inline-block text-lg mb-2">Horas teóricas:</label>
                    <input type="number" id="horas_teoricas" name="horas_teoricas"
                        class="border border-gray-200 rounded p-2 w-full" value="{{ old('horas_teoricas') }}">
                    @error('horas_teoricas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="horas_practicas" class="inline-block text-lg mb-2">Horas prácticas:</label>
                    <input type="number" id="horas_practicas" name="horas_practicas"
                        class="border border-gray-200 rounded p-2 w-full" value="{{ old('horas_practicas') }}">
                    @error('horas_practicas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="categoria" class="inline-block text-lg mb-2">Categoría:</label>
                    <select id="categoria" name="categoria" class="border border-gray-200 rounded p-2 w-full"
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
    
                <div class="mb-2">
                    <label for="auditorio" class="inline-block text-lg mb-2 ">Auditorio:</label>
                    @error('auditorio')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-2">
                    <input type="radio" id="sala_usos_multiples" name="auditorio" value="Sala de usos múltiples" checked>
                    <label for="sala_usos_multiples" class="inline-block text-lg mb-2">Sala de usos múltiples</label>
                </div>
    
                <div class="mb-2">
                    <input type="radio" id="sala_juntas" name="auditorio" value="Sala de juntas de la dirección">
                    <label for="sala_juntas" class="inline-block text-lg mb-2">Sala de juntas de la dirección</label>
                </div>
    
                <div class="mb-2">
                    <input type="radio" id="laboratorio_propio" name="auditorio" value="En el propio laboratorio">
                    <label for="laboratorio_propio" class="inline-block text-lg mb-2">En el propio laboratorio</label>
                </div>
    
                <div class="mb-2">
                    <input type="radio" id="otro" name="auditorio" value="Otro">
                    <label for="otro" class="inline-block text-lg mb-2">Otro</label>
                </div>
    
                <div class="mb-6">
                    <label for="fecha_de_inicio" class="inline-block text-lg mb-2">Fecha de inicio:</label>
                    <input type="date" id="fecha_de_inicio" name="fecha_de_inicio"
                        class="border border-gray-200 rounded p-2 w-full" value="{{ date('Y-m-d') }}">
                    @error('fecha_de_inicio')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div> 
    
                <div class="mb-6">
                    <label for="fecha_de_terminacion" class="inline-block text-lg mb-2">Fecha de término:</label>
                    <input type="date" id="fecha_de_terminacion" name="fecha_de_terminacion"
                        class="border border-gray-200 rounded p-2 w-full" value="{{ date('Y-m-d') }}">
                    @error('fecha_de_terminacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="objetivo_general" class="inline-block text-lg mb-2">Objetivo general de la
                        capacitación:</label>
                    <textarea id="objetivo_general" name="objetivo_general" class="border border-gray-200 rounded p-2 w-full"
                        value="{{ old('objetivo_general') }}"></textarea>
                    @error('objetivo_general')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="forma_de_evaluacion" class="inline-block text-lg mb-2">Forma de evaluación del
                        curso:<br>(Descripción opcional)</label>
                    <textarea id="forma_de_evaluacion" name="forma_de_evaluacion" class="border border-gray-200 rounded p-2 w-full"
                        value="{{ old('forma_de_evaluacion')}}"></textarea>
                    @error('forma_de_evaluacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="porcentaje_asistencia" class="inline-block text-lg mb-2">Porcentaje de asistencia
                        requerido para acreditar curso:</label>
                        <select id="porcentaje_asistencia" name="porcentaje_asistencia" class="border border-gray-200 rounded p-2 w-full" value="{{ old('porcentaje_asistencia') }}">
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
                        </select>>
                    @error('porcentaje_asistencia')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="calificacion_requerida" class="inline-block text-lg mb-2">Calificación requerida para acreditar curso (cuestionario cuando aplique):</label>
                    <select id="calificacion_requerida" name="calificacion_requerida" class="border border-gray-200 rounded p-2 w-full" value="{{ old('calificacion_requerida') }}">
                        <option value="0" selected>NA</option>
                        <option value="80">80%</option>
                        <option value="90">90%</option>
                        <option value="100">100%</option>
                    </select>
                    @error('calificacion_requerida')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="evaluacion_adquirida" class="inline-block text-lg mb-2">Requiere evaluación de la capacitación adquirida (antes de los 30 días hábiles):</label><br><br>
                    <input type="radio" id="si" name="evaluacion_adquirida" value="Sí">
                    <label for="si" class="inline-block text-lg mb-2">Sí</label><br><br>
                    <input type="radio" id="no" name="evaluacion_adquirida" value="No" checked>
                    <label for="no" class="inline-block text-lg mb-2">No</label><br><br>
                    @error('evaluacion_adquirida')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <input type="text" id="age1" name="status" value="Disponible" hidden="true">
                </div>
    
                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags / Palabras clave (Separadas por una coma)
                    </label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                        placeholder="Ejemplo: Calidad, Capacitación de Perfil, etc." value="{{ old('tags') }}" />
    
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="img" class="inline-block text-lg mb-2">
                        Imágen de portada
                    </label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="img" />
    
                    @error('img')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Crear Curso
                    </button>
    
                    <a href="/admin/paneldecursos" class="text-black ml-4"> Volver </a>
                </div>
            </form>

          <script>
            const courseType = document.getElementById('course-type');
            const virtualForm = document.getElementById('virtual-form');
            const physicalForm = document.getElementById('physical-form');
          
            courseType.addEventListener('change', function() {
              if (courseType.value === 'virtual') {
                virtualForm.style.display = 'block';
                physicalForm.style.display = 'none';
              } else if (courseType.value === 'physical') {
                virtualForm.style.display = 'none';
                physicalForm.style.display = 'block';
              }
            });
          </script>

        
    </x-card> -->

    
    

</x-layout>
