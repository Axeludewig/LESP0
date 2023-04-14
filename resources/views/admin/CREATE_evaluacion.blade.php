<x-layout>
    <a href="/admin/paneldecursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Crear curso</h2>
            <p class="mb-4">Formulario para la creación de cursos</p>
        </header>

        <form method="POST" action="/admin/cursoenlinea" enctype="multipart/form-data">
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

            <div class="mt-4 flex flex-col justify-center items-center">
                <label for="video" class="block font-medium text-gray-700">Subir video</label>
                <input id="video" type="file" name="video" class="mt-1">
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
                        <input type="radio" name="pregunta1_respuesta" value="opcion1" id="p1r1">
                        <label for="p1r2" class="inline-block text-lg mb-2">Opción 2</label> 
                        <input type="radio" name="pregunta1_respuesta" value="opcion2" id="p1r2">
                        </div>
                    </div>
                    
                    <div class="flex flex-col text-center">
                        <p>Respuesta #2:</p>
                        <div class="flex flex-row items-center justify-center gap-3">
                        <label for="p2r1" class="inline-block text-lg mb-2">Opción 1</label> 
                        <input type="radio" name="pregunta2_respuesta" value="opcion1" id="p2r1">
                        <label for="p2r2" class="inline-block text-lg mb-2">Opción 2</label> 
                        <input type="radio" name="pregunta2_respuesta" value="opcion2" id="p2r2">
                        </div>
                    </div>
                    
                    <div class="flex flex-col text-center" >
                        <p>Respuesta #3:</p>
                        <div class="flex flex-row items-center justify-center gap-3">
                        <label for="p3r1" class="inline-block text-lg mb-2">Opción 1</label> 
                        <input type="radio" name="pregunta3_respuesta" value="opcion1" id="p3r1">
                        <label for="p3r2" class="inline-block text-lg mb-2">Opción 2</label> 
                        <input type="radio" name="pregunta3_respuesta" value="opcion2" id="p3r2">
                        </div>
                    </div>
                    
                    <div class="flex flex-col text-center">
                        <p>Respuesta #4:</p>
                        <div class="flex flex-row items-center justify-center gap-3">
                        <label for="p4r1" class="inline-block text-lg mb-2">Opción 1</label> 
                        <input type="radio" name="pregunta4_respuesta" value="opcion1" id="p4r1">
                        <label for="p4r2" class="inline-block text-lg mb-2">Opción 2</label> 
                        <input type="radio" name="pregunta4_respuesta" value="opcion2" id="p4r2">
                        </div>
                    </div>
                    
                    <div class="flex flex-col text-center">
                        <p>Respuesta #5:</p>
                        <div class="flex flex-row items-center justify-center gap-3">
                        <label for="p5r1" class="inline-block text-lg mb-2">Opción 1</label> 
                        <input type="radio" name="pregunta5_respuesta" value="opcion1" id="p5r1">
                        <label for="p5r2" class="inline-block text-lg mb-2">Opción 2</label> 
                        <input type="radio" name="pregunta5_respuesta" value="opcion2" id="p5r2">
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
    </x-card>
</x-layout>
