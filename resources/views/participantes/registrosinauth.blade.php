@props(['curso'])
<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">REGISTRO</h2>
            <p class="mb-4">Registra tu participación</p>
        </header>

        <div class="flex-col mb-4 text-xl">
            <h2><span class="font-semibold">Datos de la capacitación:</span></h2>
            <p><span class="font-semibold">Curso:</span> {{ $curso->nombre }}</p>
            <p><span class="font-semibold">Fecha:</span> {{ $curso->fecha_de_inicio }}</p>
        </div>

        <form method="POST" action="/participantes" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_curso" value="{{ $curso->id }}">
            <input type="hidden" name="nombre_curso" value="{{ $curso->nombre }}">
            <input type="hidden" name="rfc_participante" value="N/A">

            <div class="mb-6">
                <label for="nombre_participante" class="font-semibold inline-block text-lg mb-2"> Nombre completo
                </label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="nombre_participante" placeholder="Aquí ingresa tu nombre completo"
                    value="{{ old('nombre_participante') }}" />

                @error('nombre_participante')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email_participante" class="font-semibold inline-block text-lg mb-2"> Correo electrónico
                </label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="email_participante" placeholder="Aquí ingresa tu email"
                    value="{{ old('email_participante') }}" />

                @error('email_participante')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <input type="text" hidden="true" name="ubicacion" value="{{ $curso->auditorio }}">


            <input type="text" hidden="true" name="fecha_de_inicio" value="{{ $curso->fecha_de_inicio }}">
            <input type="text" hidden="true" name="fecha_de_terminacion" value="{{ $curso->fecha_de_terminacion }}">
            @php
                $valor_curricular = $curso->horas_teoricas + $curso->horas_practicas;
            @endphp
            <input type="text" hidden="true" name="valor_curricular" value="{{ $valor_curricular }}">
            <input type="text" hidden="true" name="tipo" value="Asistente">
            <input type="text" hidden="true" name="img" value="n/a">


            <div class="mb-6">
                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-mich4 hover:text-black">
                    Registrar
                </button>
            </div>

            <div class="mt-8">
                <p>
                    ¿Ya tienes una cuenta?
                    <a href="/login" class="text-laravel">Iniciar Sesión</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
