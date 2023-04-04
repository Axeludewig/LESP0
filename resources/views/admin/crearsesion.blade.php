<x-layout>
    <a href="/admin/sesiones" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Crear nueva sesión.</h2>
        <p class="mb-4">Crear una nueva sesión abierta</p>
      </header>
  
      <form method="POST" action="/admin/sesiones/store" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            @unless(count($listings) == 0)
            <p class="text-lg"> Elige un curso en proceso. </p><br>
  
            @foreach($listings as $listing)
            <input type="radio" id="age1" name="id_curso" value="{{$listing->id}}">
            <label for="id_curso">{{$listing->nombre}}</label><br>
            @endforeach
        
            @else
            <p>No hay ningún registro.</p>
            @endunless
        </div>

        <div class="mb-6">
            <label for="fecha_sesion" class="inline-block text-lg mb-2">Fecha de la sesión</label>
            <input type="date" class="border border-gray-200 rounded p-2 w-full" name="fecha_sesion" rows="10">{{old('fecha_sesion')}}

        @error('fecha_sesion')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        </div>

        <div class="mb-6">
            <label for="hora_sesion" class="inline-block text-lg mb-2">Hora de la sesión</label>
            <input type="time" class="border border-gray-200 rounded p-2 w-full" name="hora_sesion" rows="10">{{old('hora_sesion')}}

        @error('hora_sesion')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
        </div>
  
        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Crear Sesión
          </button>
  
          <a href="/admin/sesiones/" class="text-black ml-4"> Volver </a>
        </div>
      </form>
  
    </x-card>
</x-layout>