<x-layout>
  @if (!Auth::check())
    @include('partials._hero')
  @endif
    <div>
      <div class="shadow border rounded p-6 text-center bg-laravel text-white text-xl mb-4">
        <h1 class="text-2xl md:text-3xl">Últimos avisos</h1>
    </div>
    
    @php
        $posts = DB::table('posts')->orderBy('id', 'desc')->take(10)->get();
    @endphp
    
    
    <div x-data="{ activeSlide: 0 }" class="carousel">
      <div class="carousel-inner">
        @foreach($posts as $key => $post)
            <div x-show="activeSlide === {{ $key }}" 
            x-transition:enter="transition ease-out duration-500" 
            x-transition:enter-start="transform translate-x-full opacity-0" 
            x-transition:enter-end="transform translate-x-0 opacity-100" 
            x-transition:leave="transition ease-in duration-500" 
            x-transition:leave-start="transform translate-x-0 opacity-100" 
            x-transition:leave-end="transform translate-x-full opacity-0" 
            class="carousel-item{{ $key === 0 ? ' active' : '' }}">
          <x-post-card :post="$post" />
          </div>
        @endforeach
    </div>

    <div class="flex justify-center items-center pt-4">
        @foreach($posts as $key => $post)
            <button x-on:click="activeSlide = {{ $key }}" :class="{ 'bg-blue-500': activeSlide === {{ $key }}, 'bg-gray-300': activeSlide !== {{ $key }} }" class="w-4 h-4 rounded-full mx-1"></button>
        @endforeach
    </div>
    

        <div class="flex gap-6 items-center justify-center text-center pt-4">
            <div>
                <button x-on:click="activeSlide = (activeSlide === 0) ? {{ count($posts) - 1 }} : activeSlide - 1" class="carousel-prev text-3xl"><i class="fa-solid fa-circle-chevron-left"></i></button>
            </div>
            <div>
                <button x-on:click="activeSlide = (activeSlide === {{ count($posts) - 1 }}) ? 0 : activeSlide + 1" class="carousel-next text-3xl"><i class="fa-solid fa-circle-chevron-right"></i></button>
            </div>
        </div>
    </div>
    
    <script>
      window.Alpine = require('alpinejs');

      Alpine.start();
  </script>
  
    
  
 
  <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
    <h3 class="text-2xl md:text-3xl">
        <p>Cursos disponibles</p>
    </h3>
  </div>
  @include('partials._search')
  <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

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
