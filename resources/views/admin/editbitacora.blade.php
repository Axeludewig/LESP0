<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl ">
            <p>Bitácora</p>
        </h3>
      </div>
      @include('partials._bitacora_edit_search')

        @unless(count($validaciones) == 0)
    
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-48">
            
            <table class="w-full  text-left text-gray-500 ">
                <thead class="text-sm text-gray-700 uppercase bg-gray-50">
                    <tr class="font-bold">
                        <th scope="col" class="px-6 py-3">
                            Folio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre del participante
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre de la capacitación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo de participación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de la capacitación
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Valor Curricular en horas
                        </th>
                        <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($validaciones as $validacion)
                <x-admin-validacion-card :validacion="$validacion" />
                @endforeach
            </tbody>
        </table>

        </div>

    
        @else

        <div class="flex flex-col justify-center text-center text-2xl items-center">
          <p>No se encontró ninguna validación. </p>
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

        <div class="mt-6 p-4">
            {{$validaciones->links()}}
          </div>
    
</x-layout>