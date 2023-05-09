@props(['evaluaciones'])

<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
    class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
    <h3 class="text-3xl ">
        <p class="">Evaluaciones en línea</p>
    </h3>
</div>
    @if (count($evaluaciones) == 0)
    <p class="text-center mb-[420px] font-semibold p-4">No hay ningún registro.</p>
    @endif
    @foreach($evaluaciones as $evals)
    <div class="flex flex-col md:flex-row items-center justify-center gap-4 mx-6">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full md:my-4">
            <a href="/users/xevalz/{{$evals->id}}" alt="holo">
              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white truncate">{{$evals->nombre}}</h5>
            </a>
            
            <a href="/users/xevalz/{{$evals->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4 hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              Ir a Evaluación
              <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </div>
    </div>
    @endforeach
    <div class="mb-96"></div>
</x-layout>