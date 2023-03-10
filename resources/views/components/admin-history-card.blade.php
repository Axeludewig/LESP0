@props(['listing'])

<x-card>
  <div class="flex">
    <div>
      <h3 class="text-2xl">
        <p>{{$listing->nombre_curso}}</p>
      </h3>
      <div class="mt-3 text-xl font-bold mb-4">Fecha de la sesión: {{$listing->fecha_sesion}}</div>
      <div class="text-xl font-bold mb-4">Hora de la sesión: {{$listing->hora_sesion}}</div>
      <div class="text-xl font-bold mb-4">Status: {{$listing->status}}</div>
      <form method="POST" action="/admin/sesiones/{{$listing->id}}">
        @csrf
        @method('DELETE')
        <div class="text-lg mt-4">
        
        <label for="status" class="inline-block text-lg mb-2">
        </label>
        <button type="submit" class="text-red-500 border-4 p-2 border-red-500 hover:ring">Eliminar esta sesión. <i class="fa-solid fa-location-pin-lock"></i></button>
        </div>
      </form>
    </div>
  </div>
</x-card>