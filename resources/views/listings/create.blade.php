<x-layout>
    <a href="/admin/paneldecursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Crear curso</h2>
            <p class="mb-4">Formulario para la creación de cursos</p>
        </header>

        <form method="POST" action="/cursos/crear" enctype="multipart/form-data">
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
                <label for="modalidad" class="inline-block text-lg mb-2">Modalidad a realizar:</label>
                <select id="modalidad" name="modalidad" class="border border-gray-200 rounded p-2 w-full"
                    name="modalidad">
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
                <label for="tipo" class="inline-block text-lg mb-2">Tipo de capacitación:</label>
                <select id="tipo" name="tipo" class="border border-gray-200 rounded p-2 w-full">
                    <option value="presencial">Presencial</option>
                    <option value="virtual">Virtual</option>
                    <option value="mixto">Mixto</option>
                </select>
                @error('tipo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nombre_del_responsable" class="inline-block text-lg mb-2">Nombre del responsable del evento
                    de capacitación:</label>
                <input type="text" id="nombre_del_responsable" name="nombre_del_responsable"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('nombre_del_responsable')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="coordinacion" class="inline-block text-lg mb-2">Coordinación responsable de la
                    capacitación:</label>
                <select id="coordinacion" name="coordinacion" class="border border-gray-200 rounded p-2 w-full">
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
                <input type="text" id="dirigido" name="dirigido" class="border border-gray-200 rounded p-2 w-full">
                @error('dirigido')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="numero_de_asistentes" class="inline-block text-lg mb-2">N° de Asistentes esperados:</label>
                <input type="number" id="numero_de_asistentes" name="numero_de_asistentes"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('numero_de_asistentes')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="horas_teoricas" class="inline-block text-lg mb-2">Horas teóricas:</label>
                <input type="number" id="horas_teoricas" name="horas_teoricas"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('horas_teoricas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="horas_practicas" class="inline-block text-lg mb-2">Horas prácticas:</label>
                <input type="number" id="horas_practicas" name="horas_practicas"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('horas_practicas')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="categoria" class="inline-block text-lg mb-2">Categoría:</label>
                <select id="categoria" name="categoria" class="border border-gray-200 rounded p-2 w-full">
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
                <label for="auditorio" class="inline-block text-lg mb-2">Auditorio:</label>
                @error('auditorio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <input type="radio" id="sala_usos_multiples" name="auditorio" value="Sala de usos múltiples">
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
                    class="border border-gray-200 rounded p-2 w-full">
                @error('fecha_de_inicio')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="fecha_de_terminacion" class="inline-block text-lg mb-2">Fecha de término:</label>
                <input type="date" id="fecha_de_terminacion" name="fecha_de_terminacion"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('fecha_de_terminacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="objetivo_general" class="inline-block text-lg mb-2">Objetivo general de la
                    capacitación:</label>
                <textarea id="objetivo_general" name="objetivo_general" class="border border-gray-200 rounded p-2 w-full"></textarea>
                @error('objetivo_general')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="forma_de_evaluacion" class="inline-block text-lg mb-2">Forma de evaluación del
                    curso:<br>(Descripción opcional)</label>
                <textarea id="forma_de_evaluacion" name="forma_de_evaluacion" class="border border-gray-200 rounded p-2 w-full"></textarea>
                @error('forma_de_evaluacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="porcentaje_asistencia" class="inline-block text-lg mb-2">Porcentaje de asistencia
                    requerido para acreditar curso:</label>
                <input type="text" id="porcentaje_asistencia" name="porcentaje_asistencia"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('porcentaje_asistencia')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="calificacion_requerida" class="inline-block text-lg mb-2">Calificación requerida para
                    acreditar curso (cuestionario cuando aplique) del 80% al 100%:</label>
                <input type="text" id="calificacion_requerida" name="calificacion_requerida"
                    class="border border-gray-200 rounded p-2 w-full">
                @error('calificacion_requerida')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="evaluacion_adquirida" class="inline-block text-lg mb-2">Requiere evaluación de la
                    capacitación adquirida (antes de los 30 días hábiles):</label><br><br>
                <input type="radio" id="si" name="evaluacion_adquirida" value="Sí">
                <label for="si" class="inline-block text-lg mb-2">Sí</label><br><br>
                <input type="radio" id="no" name="evaluacion_adquirida" value="No">
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
    </x-card>
</x-layout>
