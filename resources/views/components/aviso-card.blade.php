<div>
    <tr class="border">
        <td class="border">{{$aviso->id}}</td>
            @php
                $realautor = DB::table('users')->where('id', $aviso->autor)->first();
                $nombre = $realautor->nombre_completo;    
            @endphp
            <td class="border">{{$nombre}}</td>
            <td class="overflow-hidden">
                <div class="overflow-hidden max-h-[250px] max-w-[150px] md:max-w-[1250px] md:max-h-[350px]">
                    <div class="md:mx-48">
                        {!! $aviso->content !!}
                    </div>
                </div>
            </td>
        <div class="flex justify-center items-center text-center">
            <td class="border">
                <div class="flex justify-center items-center gap-6 p-4">
                    <div class="">
                        <form action="/posts/destroy/{{$aviso->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button data-modal-target="popup-modal{{ $aviso->id }}" data-modal-toggle="popup-modal{{ $aviso->id }}" type="button" >
                            <i class="fa-solid fa-trash text-red-500"></i>
                            </button>
                            <div id="popup-modal{{ $aviso->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{ $aviso->id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas eliminar este aviso? &nbsp; <span class="font-bold">AVISO ID: {{$aviso->id}}</span></h3>
                                            <button data-modal-hide="popup-modal{{ $aviso->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Sí, estoy seguro
                                            </button>
                                            <button data-modal-hide="popup-modal{{ $aviso->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>  
                    <div>
                        <a href="/posts/edit/{{$aviso->id}}">
                            <i class="fa-solid fa-pen-to-square text-blue-500"></i>
                        </a>
                    </div>
                </div>
            </td>
        </div>
        
    </tr>
</div>

<style>
    .overflow-hidden {
        overflow: hidden;
    }
</style>
