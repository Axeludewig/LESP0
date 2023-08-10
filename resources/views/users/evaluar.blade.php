<x-layout>
    <a href="/users/cursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($evaluaciones) == 0)
        @foreach($evaluaciones as $eval)
            <x-evaladquser-card :eval="$eval" />
        @endforeach
    
    
        @else
      </div>
      <div class="flex flex-col justify-center text-center text-2xl items-center mb-64">
        <p>No se encontró ninguna evaluación adquirida. </p>
        <div class="animate-bounce hover:text-laravel text-red-500 text-4xl m-6">Próximamente</div>

        <p>Se enlistarán aquí cuando el administrador actualize la base de datos.</p>
    </div>
      @endunless
      <div class="mt-6 p-4">
        {{$evaluaciones->links()}}
      </div>
</x-layout>