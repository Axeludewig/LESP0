@props(['listing'])

<x-card>
  <div class="flex">
    <div>
      <h3 class="text-2xl">
        <p>{{$listing->nombre_curso}}</p>
      </h3>
      <div class="mt-3 text-xl font-bold mb-4">Fecha de la sesión: {{$listing->fecha_sesion}}</div>
      <div class="text-xl font-bold mb-4">Hora de la sesión: {{$listing->hora_sesion}}</div>
    </div>
  </div>
</x-card>