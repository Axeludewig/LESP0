@props(['listing'])

<x-card>
  <div class="flex">
    <img class="hidden object-contain w-48 mr-6 md:block"
      src="{{$listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/listings/{{$listing->id}}">{{$listing->nombre}}</a>
      </h3>
      <div class="mt-3 text-xl font-bold mb-4">Inicia: {{$listing->fecha_de_inicio}}</div>
      <div class="text-xl font-bold mb-4">Termina: {{$listing->fecha_de_terminacion}}</div>
      <x-listing-tags :tagsCsv="$listing->tags" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$listing->ubicacion}}
      </div>
    </div>
  </div>
</x-card>