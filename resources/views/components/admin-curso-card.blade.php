@props(['listing'])

<x-card class="shadow-xl">
    <div class="">
        <div class="flex">
            <img class="hidden object-contain w-48 mr-6 md:block"
                src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/ss1.png') }}" alt="" />
            <div>
                <h3 class="text-2xl md:text-3xl">
                    <a href="/admin/details/{{ $listing->id }}">{{ $listing->nombre }}</a>
                </h3>
                @if ($listing->auditorio == 'Virtual')
                    <p class=" text-green-600 md:text-2xl">CURSO VIRTUAL</p>
                @endif
                @if ($listing->auditorio !== 'Virtual')
                    @if ($listing->tipo == 'Presencial')
                        <p class="  text-violet-600 md:text-2xl"><span class="font-semibold">Tipo:</span> CURSO PRESENCIAL
                        </p>
                    @endif
                    @if ($listing->tipo == 'Virtual')
                        <p class="  text-violet-600 md:text-2xl"><span class="font-semibold">Tipo:</span> CURSO VIRTUAL
                        </p>
                    @endif
                    @if ($listing->tipo == 'Actividad')
                        <p class="  text-violet-600 md:text-2xl"><span class="font-semibold">Tipo:</span> CURSO CON
                            ACTIVIDAD</p>
                    @endif
                @endif

                @php
                    date_default_timezone_set('America/Mexico_City');
                    
                    $inicio = \Carbon\Carbon::parse($listing->fecha_de_inicio)->format('l j F Y H:i:s');
                    
                    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                    $fecha = \Carbon\Carbon::parse($listing->fecha_de_inicio);
                    $mes = $meses[$fecha->format('n') - 1];
                    $lel = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                    
                    $fecha2 = \Carbon\Carbon::parse($listing->fecha_de_terminacion);
                    $mes = $meses[$fecha2->format('n') - 1];
                    $lel2 = $fecha2->format('d') . ' de ' . $mes . ' de ' . $fecha2->format('Y');
                    
                @endphp

                <div class="mt-3 md:text-xl font-bold mb-4">Inicia: {{ $lel }}</div>
                <div class="md:text-xl font-bold mb-4">Termina: {{ $lel2 }}</div>
                @php
                    $carta = DB::table('carta')
                        ->where('id_curso', $listing->id)
                        ->first();
                    
                @endphp

                @if ($carta !== null)
                    <div class="my-4">
                        <a href="/admin/generate_carta/{{ $listing->id }}" class="" target="_blank">
                            <button class="p-4 border-2 shadow rounded-lg bg-yellow-200">
                                <p class="text-xl font-semibold text-blue-600">
                                    <i class="fa-regular fa-hand-point-down"></i>&nbsp;Click para descargar la Carta
                                    Descriptiva&nbsp;
                                    <i class="fa-regular fa-hand-point-down"></i>
                                </p>
                            </button>
                        </a>
                    </div>
                @endif


                @if ($listing->tipo == 'Presencial')
                    <div class="my-4">
                        <a href="/admin/qr/{{ $listing->id }}" class="">
                            <button class="p-4 border-2 shadow rounded-lg bg-yellow-200">

                                <p class="text-xl font-semibold text-blue-600"><i
                                        class="fa-regular fa-hand-point-down"></i>&nbsp;Click para ver Código QR&nbsp;<i
                                        class="fa-regular fa-hand-point-down"></i></p>
                            </button>
                        </a>
                    </div>
                    <div class="my-4">
                        <a href="/admin/qrpublico/{{ $listing->id }}" class="">
                            <button class="p-4 border-2 shadow rounded-lg bg-yellow-200">

                                <p class="text-xl font-semibold text-blue-600"><i
                                        class="fa-regular fa-hand-point-down"></i>&nbsp;Click para ver Código QR
                                    público&nbsp;<i class="fa-regular fa-hand-point-down"></i></p>




                            </button>
                        </a>
                    </div>
                @endif

                @if ($listing->tipo == 'Virtual')
                    <div class="my-4">
                        <a href="/admin/qrenlinea/{{ $listing->id }}" class="">
                            <button class="p-4 border-2 shadow rounded-lg bg-yellow-200">

                                <p class="text-xl font-semibold text-blue-600"><i
                                        class="fa-regular fa-hand-point-down"></i>&nbsp;Click para ver Código QR&nbsp;<i
                                        class="fa-regular fa-hand-point-down"></i></p>




                            </button>
                        </a>
                    </div>
                @endif


                <div class="font-semibold md:text-xl">
                    @if ($listing->status == 'Disponible')
                        <p class="text-green-600 animate-pulse">Status: {{ $listing->status }}</p>
                        <div class="py-2">
                            <form action="/listings/{{ $listing->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-4">
                                    <select name="status" class="p-2">
                                        <option value="En proceso">En proceso</option>
                                    </select>
                                    <button class=" border-2 p-2 px-4 rounded bg-laravel text-white font-normal"
                                        type="submit">Cambiar</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    @if ($listing->status == 'En proceso')
                        <p class="text-yellow-600 animate-pulse">Status: {{ $listing->status }}</p>
                        <div class="py-2">
                            <form action="/listings/{{ $listing->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-4">
                                    <select name="status" class="p-2">
                                        <option value="Disponible">Disponible</option>
                                    </select>
                                    <button class=" border-2 p-2 px-4 rounded bg-laravel text-white font-normal"
                                        type="submit">Cambiar</button>
                                </div>
                            </form>
                        </div>
                    @endif
                    @if ($listing->status == 'Finalizado')
                        <p class="text-red-600 animate-pulse">Status: {{ $listing->status }}</p>
                        <div class="py-2">
                            <form action="/listings/{{ $listing->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="flex gap-4">
                                    <select name="status" class="p-2">
                                        <option value="Disponible">Disponible</option>
                                        <option value="En proceso">En proceso</option>
                                    </select>
                                    <button class=" border-2 p-2 px-4 rounded bg-laravel text-white font-normal"
                                        type="submit" class="">Cambiar</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
                <div>

                </div>
                <div class="m-4">
                    @php
                        $participantes = DB::table('participantes')
                            ->where('id_curso', $listing->id)
                            ->whereNotNull('rfc_participante')
                            ->get();
                        $cuenta = $participantes->count();
                    @endphp
                </div>


                <div class="m-4">
                    <div>
                        <div class="flex -space-x-4 max-w-full">
                            @if ($participantes->count() < 4 && $participantes !== null)
                                @foreach ($participantes as $participante)
                                    @php
                                        $user = DB::table('users')
                                            ->where('id', $participante->id_user)
                                            ->first();
                                        if ($user) {
                                            $pfp = $user->profile_pic;
                                        }
                                    @endphp
                                    @if ($pfp !== null)
                                        <img class="w-10 h-10 md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800"
                                            src="{{ asset('storage/' . $pfp) }}"
                                            alt="Foto de perfil de {{ $user->nombre_completo }}">
                                    @else
                                        <img class="w-10 h-10  md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800"
                                            src="/prueba_pics_nombre/{{ $participante->id }}" alt="">
                                    @endif
                                @endforeach
                            @elseif($participantes !== null)
                                @php $count = 0; @endphp

                                @foreach ($participantes as $participante)
                                    @php
                                        $user = DB::table('users')
                                            ->where('id', $participante->id_user)
                                            ->first();
                                        if ($user) {
                                            $pfp = $user->profile_pic;
                                        }
                                        
                                    @endphp

                                    @if ($pfp !== null && $count !== 3)
                                        <img class="w-10 h-10 md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800"
                                            src="{{ asset('storage/' . $pfp) }}"
                                            alt="Foto de perfil de {{ $user->nombre_completo }}">
                                        @php $count++; @endphp
                                    @endif

                                    @if ($pfp == null && $count !== 3)
                                        <img class="w-10 h-10  md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800"
                                            src="/prueba_pics_submit/{{ $user->id }}"
                                            alt="Foto de perfil de {{ $user->nombre_completo }}">
                                        @php $count++; @endphp
                                    @endif
                                @endforeach
                                @if ($count = 4)
                                    <a class="flex items-center justify-center w-10 h-10  md:w-24 md:h-24 text-lg font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800"
                                        href="#">+{{ $cuenta - 3 }}</a>
                                @endif


                            @endif

                        </div>
                        <span class="font-semibold cursor-pointer"
                            onclick="toggleList({{ $listing->id }})">Participantes internos:
                            {{ $cuenta }}</span>

                        @if ($cuenta > 0)
                            <button
                                class="m-2 py-2 px-4 rounded bg-laravel text-white hover:bg-black show-participants bg-laravel"
                                onclick="toggleList({{ $listing->id }})">
                                Mostrar <i class="fa-solid fa-plus"></i>
                            </button>

                            <!--
        <div>
        <a href="/admin/limpiarparticipantes">
        <button class="m-2 py-2 px-4 rounded bg-laravel text-white hover:bg-black show-participants bg-laravel">
            Vaciar lista de participantes
        </button>
        </a>
        </div>
        -->
                        @endif
                        <div class="max-h-[125px] overflow-y-auto hidden p-2"
                            id="participantesList{{ $listing->id }}">
                            <ul>
                                @php $num = 1; @endphp
                                @foreach ($participantes as $participante)
                                    <li>{{ $num . ' - ' }}{{ $participante->nombre_participante }}</li>
                                    @php $num++ @endphp
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @php
                        $externos = DB::table('participantes')
                            ->where('id_curso', $listing->id)
                            ->whereNull('rfc_participante')
                            ->get();
                    @endphp
                    @if ($externos)
                        <span class="font-semibold cursor-pointer">Participantes externos: {{ count($externos) }}
                        </span>
                    @endif

                    <script>
                        function toggleList(id) {
                            var participantesList = document.getElementById("participantesList" + id);
                            if (participantesList.style.display !== "block") {
                                participantesList.style.display = "block";
                            } else {
                                participantesList.style.display = "none";
                            }
                        }
                    </script>


                </div>

                <div class="text-lg mt-4">
                    @if ($listing->auditorio !== 'Virtual')
                        <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
                    @endif
                    @if ($listing->auditorio == 'Virtual')
                        <i class="fa-solid fa-signal"></i> {{ $listing->auditorio }}
                    @endif
                </div>

                @if (auth()->user()->es_admin == '1' &&
                        $listing->status == 'En proceso' &&
                        ($listing->tipo == 'Actividad') | ($listing->tipo == 'Virtual'))
                    <form method="POST" action="/finalizar/{{ $listing->id }}" enctype="multipart/form-data">
                        @csrf
                        {{ csrf_field() }}
                        <div class=" mb-4 text-lg mt-4 flex place-content-center">


                            <button data-modal-target="popup-modal{{ $listing->id }}"
                                data-modal-toggle="popup-modal{{ $listing->id }}" type="button"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                Finalizar Curso <i class="fa-solid fa-heart-circle-check"></i>
                            </button>
                        </div>
                        <div id="popup-modal{{ $listing->id }}" tabindex="-"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal{{ $listing->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás
                                            seguro que deseas finalizar el curso?</h3>
                                        <button data-modal-hide="popup-modal{{ $listing->id }}" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Sí, estoy seguro
                                        </button>
                                        <button data-modal-hide="popup-modal{{ $listing->id }}" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif

                @if (auth()->user()->es_admin == '1' &&
                        $listing->status == 'En proceso' &&
                        $listing->tipo !== 'Actividad' &&
                        $listing->tipo !== 'Virtual')
                    <form method="POST" action="/listingsfinal/{{ $listing->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                        @endphp

                        <input type="hidden" name="id_curso" value="{{ $listing->id }}">

                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre_curso"
                            hidden="true" value="{{ $listing->nombre }}" />

                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="id_curso"
                            hidden="true" value="{{ $listing->id }}" />

                        <input type="text" name="valor_curricular" hidden="true"
                            value="{{ $valor_curricular }}" />

                        <input type="text" name="status" hidden="true" value="Verificado" />

                        <input type="text" name="tipo" hidden="true" value="Asistente" />

                        @php $currentYear = now()->format('Y'); @endphp
                        <input type="text" name="folio" hidden="true"
                            value="B2A{{ $currentYear }}C{{ $listing->numero_consecutivo }}F" />

                        <input type="text" hidden name="fecha_de_registro"
                            value="{{ $listing->fecha_de_terminacion }}" />

                        <input type="hidden" name="_method" value="PUT">
                        <div class=" mb-4 text-lg mt-4 flex place-content-center">
                            <label for="status" class="inline-block text-lg mb-2">
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="status"
                                value="Finalizado" hidden="true" />
                            <button data-modal-target="popup-modal3" data-modal-toggle="popup-modal3" type="button"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                Finalizar Curso <i class="fa-solid fa-heart-circle-check"></i>
                            </button>
                        </div>
                        <div id="popup-modal3" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal3">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás
                                            seguro que deseas finalizar el curso? Los participantes podrán descargar
                                            constancias. No hay vuelta atrás para esta acción.</h3>
                                        <button data-modal-hide="popup-modal3" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Sí, estoy seguro
                                        </button>
                                        <button data-modal-hide="popup-modal3" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @elseif (auth()->user()->es_admin == '1' && $listing->status == 'Disponible')
                    <div class="flex justify-center">
                        <a href="/admin/editcurso/{{ $listing->id }}">
                            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">Editar
                                curso</button>
                        </a>
                    </div>
                    <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{ csrf_field() }}
                        {{ method_field('put') }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="mt-4 mb-4 text-lg mt-4 flex place-content-center">
                            <label for="status" class="inline-block text-lg mb-2">
                            </label>
                            <input type="password" class="border border-gray-200 rounded p-2 w-full" name="status"
                                value="En proceso" hidden="true" />
                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                                class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                Iniciar Curso <i class="fa-solid fa-heart-circle-bolt"></i>
                            </button>
                        </div>


                        <div id="popup-modal" tabindex="-1"
                            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-6 text-center">
                                        <svg aria-hidden="true"
                                            class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás
                                            seguro que deseas iniciar el curso? Nadie más podrá registrarse.</h3>
                                        <button data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Sí, estoy seguro
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                            cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                @endif

                <form method="POST" action="/listings/{{ $listing->id }}">
                    <div class="text-lg mt-4 flex place-content-center">
                        @csrf
                        @method('DELETE')
                        <button data-modal-target="popup-modal{{ $listing->id }}"
                            data-modal-toggle="popup-modal{{ $listing->id }}" type="button"
                            class="text-red-500"><i class="fa-solid fa-trash"></i> Eliminar</button>
                    </div>

                    <div id="popup-modal{{ $listing->id }}" tabindex="-1"
                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-hide="popup-modal{{ $listing->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true"
                                        class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro
                                        que deseas eliminar el curso?</h3>
                                    <button data-modal-hide="popup-modal{{ $listing->id }}" type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Sí, estoy seguro
                                    </button>
                                    <button data-modal-hide="popup-modal{{ $listing->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                        cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-card>
