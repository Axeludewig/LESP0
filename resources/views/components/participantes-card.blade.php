@props(['listing'])

<x-card>
  <div class="flex">
    <img class="hidden object-contain w-48 mr-6 md:block"
      src="{{$listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <b>{{$listing->nombre_curso}}</b>
      </h3>
      <h3 class="text-2xl">
        <b>Participante:</b> {{$listing->nombre_participante}}
      </h3>
      <h3 class="text-2xl">
        <b>RFC:</b> {{$listing->rfc_participante}}
      </h3>
      <h3 class="text-2xl">
        <b>Ubicación:</b> {{$listing->ubicacion}}
      </h3>
      <h3 class="text-2xl">
        <b>Fecha de inicio:</b> {{$listing->fecha_de_inicio}}
      </h3>
      <h3 class="text-2xl">
        <b>Fecha de terminación:</b> {{$listing->fecha_de_terminacion}}
      </h3>
      <h3 class="text-2xl">
        <b>Valor curricular:</b> {{$listing->valor_curricular}}
      </h3>
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$listing->ubicacion}}
      </div>
    </div>
  </div>
</x-card>