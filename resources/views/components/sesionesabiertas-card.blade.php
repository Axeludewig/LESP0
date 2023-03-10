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
      <form method="POST" action="/sesiones/asistencia">
        @csrf
        <div class="text-lg mt-4">
        
        <label for="id_sesion" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="id_sesion" value="{{$listing->id}}">
        
        <label for="nombre_curso" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="nombre_curso" value="{{$listing->nombre_curso}}">

        <label for="fecha_sesion" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="fecha_sesion" value="{{$listing->fecha_sesion}}">

        <label for="hora_sesion" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="hora_sesion" value="{{$listing->hora_sesion}}">

        <label for="nombre_participante" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="nombre_participante" value="{{auth()->user()->nombre}} {{auth()->user()->apellido_paterno}} {{auth()->user()->apellido_materno}}">

        <label for="rfc_participante" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="rfc_participante" value="{{auth()->user()->rfc}}">

        <label for="id_participante" class="inline-block text-lg mb-2">
        </label>
        <input type="hidden" name="id_participante" value="{{auth()->user()->id}}">


        <button type="submit" class="text-red-500 border-4 p-2 border-red-500 hover:ring">Registrar asistencia <i class="fa-solid fa-location-pin-lock"></i></button>
        </div>
      </form>
    </div>
  </div>
</x-card>