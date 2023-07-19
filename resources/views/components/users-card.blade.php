@props(['listing'])

<x-card>
    <div class="flex place-content-center">
        <h3 class="text-2xl">
            <div class="flex justify-center items-center m-4">
            <div class="md:w-64 md:h-64 w-32 h-32 border-2 border-gray-400 bg-gray-100 rounded-full overflow-hidden shadow-xl">
                @if ($listing->profile_pic)
                    <img id="picture-box"
                        src="{{ $listing->profile_pic ? asset('storage/' . $listing->profile_pic) : asset('/images/Default_pfp.svg.png') }}"
                        alt="Profile Picture" class="w-full h-full object-cover ">
                    @else
                    <img src="/prueba_pics_submit/{{$listing->id}}" class="w-full h-full object-cover"/>
                    @endif
            </div>
            </div>
            <b>{{ $listing->apellido_paterno }} {{ $listing->apellido_materno }} {{ $listing->nombre }}</b>
        </h3>
    </div>
    <!--
    // LISTING ES USER!
    // vvv FORMULARIO PARA eliminar! USUARIO COMO ADMIN 
    -->
    
    <form method="POST" action="/users/{{ $listing->id }}">
        <div class="text-lg mt-4 flex place-content-center">
            @csrf
            @method('DELETE')
            <button  data-modal-target="popup-modal{{ $listing->id }}" data-modal-toggle="popup-modal{{ $listing->id }}" type="button" class="text-red-500"><i class="fa-solid fa-trash"></i> Eliminar</button>
        </div>
        <div id="popup-modal{{ $listing->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{ $listing->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas eliminar este usuario: {{ $listing->apellido_paterno }} {{ $listing->apellido_materno }} {{ $listing->nombre }}?</h3>
                        <button data-modal-hide="popup-modal{{ $listing->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Sí, estoy seguro
                        </button>
                        <button data-modal-hide="popup-modal{{ $listing->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--
    // LISTING ES USER!
    // vvv FORMULARIO PARA editar! USUARIO COMO ADMIN 
    -->
    <form method="POST" action="/admin/update_user/{{ $listing->id }}">
        <div class="text-lg mt-4 flex place-content-center">
            @csrf
            @method('GET')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Editar</button>
        </div>
        
    </form>
</x-card>
