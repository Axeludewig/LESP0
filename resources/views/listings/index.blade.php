<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif

  @include('partials._search')
  <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
    <h3 class="text-2xl ">
        <p>Cursos disponibles</p>
    </h3>
  </div>

  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

    @unless(count($listings) == 0)

  

    @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach


    @else
    <p>No hay ningún registro.</p>
    @endunless

  </div>

  <div class="mt-6 p-4">
    {{$listings->links()}}
  </div>
</x-layout>
