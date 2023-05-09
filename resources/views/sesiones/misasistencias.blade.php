<x-layout>
    <a href="/users/cursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
      @if (!Auth::check())
        @include('partials._hero')
      @endif
    
      @include('partials._user_search')
      <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl ">
            <p>Mis asistencias</p>
        </h3>
      </div>
    
      
    
        @unless(count($listings) == 0)
    
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 ">
    
        @foreach($listings as $listing)
        <x-asistencias-card :listing="$listing" />
        @endforeach
    
    
        @else<p class="text-center mb-80 font-semibold p-4">No hay ningún registro</p>
        @endunless
    
      </div>
    
      <div class="mt-6 p-4">
      </div>
    </x-layout>