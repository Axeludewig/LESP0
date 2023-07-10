<tr class="bg-white border-b  hover:bg-gray-50">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
        <span class="font-semibold">{{$validacion->folio}}</span>
    </th>
    <td class="px-6 py-4">
        <span class="font-semibold">{{$validacion->nombre_usuario}}</span>
    </td>
    <td class="px-6 py-4">
        {{$validacion->nombre_curso}}
    </td>
    <td class="px-6 py-4">
        {{$validacion->tipo}}
    </td>
    <td class="px-6 py-4">
        {{$validacion->fecha_de_registro}}
    </td>
    <td class="px-6 py-4">
        {{$validacion->valor_curricular}}
    </td>
    <td class="px-6 py-4 text-right">

            <button data-modal-target="popup-modal{{ $validacion->id }}" data-modal-toggle="popup-modal{{ $validacion->id }}" class="rounded-lg px-4 py-2 border shadow bg-blue-500 text-white">
                <div class="flex">
                <i class="fa-solid fa-pen-to-square mt-1"></i>&nbsp;Editar
                </div>
            </button>
            <div id="popup-modal{{ $validacion->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-lg max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{ $validacion->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">EDITAR VALIDACIÓN</h3>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-white">Valores actuales</h3>
                                    <label for="1" class="text-white">Folio</label>
                                    <input readonly type="text" name="1" id="1" value="{{$validacion->folio}}">

                                    <label for="2" class="text-white">Nombre del participante</label>
                                    <input readonly type="text" name="2" id="2"value="{{$validacion->nombre_usuario}}"">

                                    <label for="3" class="text-white">Nombre del curso</label>
                                    <input readonly type="text" name="3" id="3" value="{{$validacion->nombre_curso}}"">

                                    <label for="4" class="text-white">Tipo</label>
                                    <input readonly type="text" name="4" id="4" value="{{$validacion->tipo}}"">

                                    <label for="5" class="text-white">Fecha de registro</label>
                                    <input readonly type="text" name="5" id="5" value="{{$validacion->fecha_de_registro}}"">

                                    <label for="6" class="text-white">Valor curricular</label>
                                    <input readonly type="text" name="6" id="6" value="{{$validacion->valor_curricular}}"">
                                </div>
                                <form action="/admin/editbitacora/{{$validacion->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="flex flex-col gap-2">
                                    <h3 class="text-white">Nuevos valores</h3>
                                    <label for="folio" class="text-white">Folio</label>

                                    <input hidden name="id_user" value="{{$validacion->id_user}}">
                                    <input hidden name="id_curso" value="{{$validacion->id_curso}}">

                                    <input  type="text" name="folio" id="folio" value="{{$validacion->folio}}">

                                    <label for="nombre_usuario" class="text-white">Nombre del participante</label>
                                    <input  type="text" name="nombre_usuario" id="nombre_usuario"value="{{$validacion->nombre_usuario}}"">

                                    <label for="nombre_curso" class="text-white">Nombre del curso</label>
                                    <input  type="text" name="nombre_curso" id="nombre_curso" value="{{$validacion->nombre_curso}}"">

                                    <label for="tipo" class="text-white">Tipo</label>
                                    <input  type="text" name="tipo" id="tipo" value="{{$validacion->tipo}}"">

                                    <label for="fecha_de_registro" class="text-white">Fecha de registro</label>
                                    <input  type="date" name="fecha_de_registro" id="fecha_de_registro" value="{{$validacion->fecha_de_registro}}"">

                                    <label for="valor_curricular" class="text-white">Valor curricular</label>
                                    <input  type="text" name="valor_curricular" id="valor_curricular" value="{{$validacion->valor_curricular}}"">
                                </div>
                            </div>
                            <button data-modal-hide="popup-modal{{ $validacion->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Sí, estoy seguro
                            </button>
                        </form>
                            <button data-modal-hide="popup-modal{{ $validacion->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

    </td>
    <td class="px-6 py-4 text-right">
        
            
                <button class="rounded-lg px-4 py-2 border shadow bg-red-500 text-white" data-modal-target="popup-modal2{{ $validacion->id }}" data-modal-toggle="popup-modal2{{ $validacion->id }}">
                    <div class="flex">
                    <i class="fa-solid fa-trash mt-1"></i>&nbsp;Eliminar
                    </div>
                </button>

                <div id="popup-modal2{{ $validacion->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-lg max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal2{{ $validacion->id }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                    ¿Eliminar la siguiente validación?
                                        <div class="flex flex-col gap-2">
                                            <h3 class="text-white">Valores</h3>
                                            <label for="1" class="text-white">Folio</label>
                                            <input readonly type="text" value="{{$validacion->folio}}">
        
                                            <label for="2" class="text-white">Nombre del participante</label>
                                            <input readonly type="text" value="{{$validacion->nombre_usuario}}"">
        
                                            <label for="3" class="text-white">Nombre del curso</label>
                                            <input readonly type="text"  value="{{$validacion->nombre_curso}}"">
        
                                            <label for="4" class="text-white">Tipo</label>
                                            <input readonly type="text" value="{{$validacion->tipo}}"">
        
                                            <label for="5" class="text-white">Fecha de registro</label>
                                            <input readonly type="text"  value="{{$validacion->fecha_de_registro}}"">
        
                                            <label for="6" class="text-white">Valor curricular</label>
                                            <input readonly type="text" value="{{$validacion->valor_curricular}}"">
                                        </div>
                                </h3>
                                <form action="/admin/deletebitacora/{{$validacion->id}}" method="DELETE">
                                    @csrf
                                    @method('DELETE')
                                    <button data-modal-hide="popup-modal2{{ $validacion->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Sí, estoy seguro
                                    </button>
                                </form>
                                <button data-modal-hide="popup-modal2{{ $validacion->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            
        </form>
    </td>
    
</tr>
