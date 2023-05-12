<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24 mb-48">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">REGISTRO</h2>
            <p class="mb-4">Crea una cuenta</p>
        </header>

        <form method="POST" action="/users">
            @csrf
            <div class="mb-6">
                <label for="rfc" class="inline-block text-lg mb-2"> RFC </label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="rfc" placeholder="Aquí ingresa tu RFC" value="{{ old('rfc') }}" />

                @error('rfc')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="apellido_paterno" class="inline-block text-lg mb-2">Apellido paterno</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="apellido_paterno"
                    placeholder="Aquí ingresa tu apellido PATERNO" value="{{ old('apellido_paterno') }}" />

                @error('apellido_paterno')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="apellido_materno" class="inline-block text-lg mb-2">Apellido materno</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="apellido_materno"
                    placeholder="Aquí ingresa tu apellido MATERNO" value="{{ old('apellido_materno') }}" />

                @error('apellido_materno')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="nombre" class="inline-block text-lg mb-2">Nombre</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="nombre"
                    placeholder="Aquí ingresa tu NOMBRE" value="{{ old('nombre') }}" />

                @error('nombre')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Correo electrónico</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="email" value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="proyecto" class="inline-block text-lg mb-2">Proyecto</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="proyecto" value="{{ old('proyecto') }}" />

                @error('proyecto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="puesto" class="inline-block text-lg mb-2">Puesto</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="puesto" value="{{ old('puesto') }}" />

                @error('puesto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="descripcion_puesto" class="inline-block text-lg mb-2">Descripcion del puesto</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="descripcion_puesto"
                    value="{{ old('descripcion_puesto') }}" />

                @error('descripcion_puesto')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="turno" class="inline-block text-lg mb-2">Turno</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="turno"
                    value="{{ old('turno') }}" />

                @error('turno')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="coordinacion" class="inline-block text-lg mb-2">Coordinación</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="coordinacion"
                    value="{{ old('coordinacion') }}" />

                @error('coordinacion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="area" class="inline-block text-lg mb-2">Área</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="area"
                    value="{{ old('area') }}" />

                @error('area')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="funcion" class="inline-block text-lg mb-2">Función</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="funcion"
                    value="{{ old('funcion') }}" />

                @error('funcion')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tipo" class="inline-block text-lg mb-2">Tipo</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="tipo"
                    value="{{ old('tipo') }}" />

                @error('tipo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="inline-block text-lg mb-2">Status</label>
                <input type="status"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"name="status"
                    value="{{ old('status') }}" />

                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="observaciones" class="inline-block text-lg mb-2">Observaciones</label>
                <input type="text"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="observaciones" value="{{ old('observaciones') }}" />

                @error('observaciones')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Contraseña
                </label>
                <input type="password"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="password" value="{{ old('password') }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password2" class="inline-block text-lg mb-2">
                    Confirmar Contraseña
                </label>
                <input type="password"
                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-full hover:ring"
                    name="password_confirmation" value="{{ old('password_confirmation') }}" />

                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="es_admin" class="inline-block text-lg mb-2">
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="es_admin"
                    value="0" hidden="true" />

                @error('es_admin')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button type="submit"
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-mich4 hover:text-black">
                    Registrar
                </button>
            </div>
<!--            <div class="mt-8">
                <p>
                    ¿Ya tienes una cuenta?
                    <a href="/login" class="text-laravel">Iniciar Sesión</a>
                </p>
            </div>-->
        </form>
    </x-card>
</x-layout>
