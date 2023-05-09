<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif

  
  @include('partials._search')
  <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
    <h3 class="text-2xl md:text-3xl">
        <p>Cursos disponibles</p>
    </h3>
  </div>

  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 ">

    @unless(count($listings) == 0)

  

    @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach


    @else
  </div>
    <div class="flex flex-col justify-center text-center text-2xl items-center mb-64">
      <p>No se encontró ningún curso. </p>
      <div class="animate-bounce hover:text-laravel text-red-500 text-4xl m-6">Próximamente</div>
      <!--
      <div class="animate-pulse">
        <img class="object-contain mr-6"
        src="{{asset('/images/jojo.jpg')}}"
        alt="" />
      </div> -->
      <p>Se enlistarán aquí cuando el administrador actualize la base de datos.</p>
  </div>
    @endunless

</div>

  <div class="mt-6 p-4">
    {{$listings->links()}}
  </div>
</x-layout>
