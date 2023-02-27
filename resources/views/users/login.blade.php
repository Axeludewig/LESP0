<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Iniciar Sesión</h2>
      <p class="mb-4">Inicia sesión para acceder a tu perfil</p>
    </header>

    <form method="POST" action="/users/authenticate">
      @csrf

      <div class="mb-6">
        <label for="rfc" class="inline-block text-lg mb-2">RFC</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="rfc" placeholder="Inicia sesión con tu RFC y contraseña" value="{{old('rfc')}}" />

        @error('rfc')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
          Contraseña
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
          value="{{old('password')}}" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Iniciar Sesión
        </button>
      </div>

      <div class="mt-8">
        <p>
          ¿Aún no tienes una cuenta?
          <a href="/register" class="text-laravel">Registrarse</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>