@props(['reprobados'])

<x-layout>
    <a href="/admin/paneldecursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl ">
            <p>Calificaciones</p>
        </h3>
    </div>
    @include('partials._calificaciones_search')
        @unless(count($reprobados) == 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-72">
            
            <table class="w-full  text-left text-gray-500 dark:text-gray-400">
                <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="font-bold">
                        <th scope="col" class="px-6 py-3">
                            Nombre del participante
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre del curso
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Calificación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Oportunidad
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha del intento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Eliminar</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
        @foreach($reprobados as $reprobado)
            <x-reprobado-card :reprobado="$reprobado" />
        @endforeach
    </tbody>
</table>

</div>
    
        @else
      </div>
        <div class="flex flex-col justify-center text-center text-2xl items-center mb-72">
          <p>No se encontró ninguna calificación. </p>
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
</x-layout>