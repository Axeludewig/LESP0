
<div class="shadow rounded-lg border">
    <div class="flex flex-col justify-center text-center items-center m-4">
        <div>
            <h1 class="text-2xl">{{$eval->nombre}}</h1>
        </div>
    </div>
    <div class="m-4">
        <div>
            <p><span class="font-semibold">Responsable:</span> {{$eval->nombre_del_responsable}}</p>
        </div>
        <div>
            <p><span class="font-semibold">Fecha de inicio: </span>{{$eval->fecha_de_inicio}}</p>
        <div>
            <p><span class="font-semibold">Fecha de terminación: </span>{{$eval->fecha_de_terminacion}}</p>
        </div>
        <div>
            <p><span class="font-semibold">Fecha de la evaluación: </span>{{$eval->newDate}}</p>
        </div>
        @if($eval->evalAdq === null)
        <form method="POST" action="/admin/evaladq">
            @csrf
            <label for="id_revisor">Asignar un evaluador</label>
            <select name="id_revisor">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->nombre_completo}}</option>
                @endforeach
            </select>

            <input hidden name="id_curso" value="{{$eval->id}}" />
            <input hidden name="id_curso" value="{{$eval->id}}" />
            <input hidden name="fecha_evaluacion" value="{{$eval->newDate}}" />
            <input hidden name="status" value="Pendiente" />
            <button type="button" class="bg-laravel text-white rounded-lg px-4 py-2 border" data-modal-target="popup-modal{{ $eval->id }}" data-modal-toggle="popup-modal{{ $eval->id }}">Asignar</button>
            <div id="popup-modal{{ $eval->id }}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{ $eval->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                <div>
                                    <p>¿Estás seguro que deseas asignar el  revisor?</p>
                                </div>
                                <div class="flex gap-4 text-center justify-center m-4">
                                    <button data-modal-hide="popup-modal{{ $eval->id }}" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Sí, estoy seguro
                                    </button>
                                    <button data-modal-hide="popup-modal{{ $eval->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endif
        @if($eval->evalAdq !== null)
        <div class="text-center">
            <h2>Ya se asignó un evaluador.</h2>
            @php
                $evaluador = DB::table('users')->where('id', $eval->evalAdq->id_revisor)->first();
            @endphp
            <p>Evaluador: {{$evaluador->nombre_completo}}</p>
            <p>Status: {{$eval->evalAdq->status}}</p>

        

            @php
                $hayevals = DB::table('evals_adquiridas')->where('id_evaladq', $eval->evalAdq->id)->first();
            @endphp

            @if ($hayevals !== null)
                <div class="p-4 shadow border rounded-lg my-4">
                    <p>Hay evaluaciones registradas.</p>
                    <a href="/admin/evaladq/{{$eval->evalAdq->id}}" ><button class="bg-laravel text-white p-4 m-4 rounded-lg">Revisar</button></a>
                </div>
            @endif

            @if (!$hayevals)
            <div class="p-4 shadow border rounded-lg my-4">
                <p>No hay evaluaciones registradas.</p>
                <a href="/admin/evaladq/{{$eval->evalAdq->id}}" ><button class="bg-laravel text-white p-4 m-4 rounded-lg">Revisar</button></a>
            </div>
            @endif
        </div>
        @endif

    </div>
</div>
</div>