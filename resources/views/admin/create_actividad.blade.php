<x-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16  shadow-xl mb-48 mt-12 border-1 border-slate-300 rounded-xl">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Agregar actividad</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la capacitación</label>
                        <input type="text" name="nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Número consecutivo</label>
                        <input type="text" name="numero_consecutivo" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Modalidad a realizar</label>
                        <select name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$2999" required="">
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
                    <div>
                        <label for="forma_de_evaluacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Forma de evaluación:</label>
                        <select disabled id="forma_de_evaluacion" name="forma_de_evaluacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Actividad</option>
                        </select>
                        @error('forma_de_evaluacion')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    </div>
                    <div>
                        <label for="nombre_del_responsable" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del responsable</label>
                        @php
                        $allusers = DB::table('users')->orderBy('nombre')->get();
                        @endphp
                        <select id="nombre_del_responsable" name="nombre_del_responsable" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                        <label for="coordinacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Coordinación repsonsable</label>
                        <select name="coordinacion" id="coordinacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="" value="{{ old('coordinacion') }}"> 
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
                        <label for="dirigido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personal al que va dirigido</label>
                        <input type="text" id="dirigido" name="dirigido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('dirigido') }}">
                        @error('dirigido')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="numero_de_asistentes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. de asistentes esperados</label>
                        <input type="number" name="numero_de_asistentes" id="numero_de_asistentes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required="" value="{{ old('numero_de_asistentes') }}">
                        @error('numero_de_asistentes')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="horas_teoricas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horas teóricas:</label>
                        <input type="number" id="horas_teoricas" name="horas_teoricas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('horas_teoricas') }}">
                        @error('horas_teoricas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="horas_practicas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Horas prácticas:</label>
                        <input type="number" id="horas_practicas" name="horas_practicas"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('horas_practicas') }}">
                        @error('horas_practicas')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="">
                        <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría:</label>
                        <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
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
                    <div class="">
                        <label for="auditorio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Auditorio:</label>
                        <select name="auditorio"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Sala de usos múltiples</option>
                            <option>Sala de juntas de la dirección</option>
                            <option>En el propio laboratorio</option>
                            <option>Otro</option>
                        </select>
                        @error('auditorio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="fecha_de_inicio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de inicio:</label>
                        <input type="date" id="fecha_de_inicio" name="fecha_de_inicio"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ date('Y-m-d') }}">
                        @error('fecha_de_inicio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div class="">
                        <label for="fecha_de_terminacion"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de término:</label>
                        <input type="date" id="fecha_de_terminacion" name="fecha_de_terminacion"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ date('Y-m-d') }}">
                        @error('fecha_de_terminacion')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="objetivo_general" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Objetivo general de la capacitación:</label>
                        <input type="text" id="objetivo_general" name="objetivo_general" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        </select>
                    </div>
                    <div class="">
                        <label for="calificacion_requerida"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Calificación requerida:</label>
                        <select id="calificacion_requerida" name="calificacion_requerida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('calificacion_requerida') }}">
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
                        <label for="evaluacion_adquirida" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Requiere evaluación adquirida?</label>
                        <select id="evaluacion_adquirida" name="evaluacion_adquirida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Sí</option>
                            <option value="TV">No</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Palabras clave (Separadas por una coma)
                        </label>
                        <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="tags"
                            placeholder="Ejemplo: Calidad, Capacitación de Perfil, etc." value="{{ old('tags') }}" />
        
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="">
                        <label for="img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Imágen de portada
                        </label>
                        <input type="file" class="block  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="img" />
        
                        @error('img')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <textarea id="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-laravel rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Agregar actividad
                </button>
            </form>
        </div>
      </section>
</x-layout>