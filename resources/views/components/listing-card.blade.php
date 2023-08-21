@props(['listing'])

<x-card class="">
    <div class="flex">
        @if ($listing->img !== null)
            <img class="hidden object-contain w-24 md:w-48 mr-6 md:block"
                src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/SS1.png') }}" alt="" />
        @endif
        @if ($listing->img == null)
            <img class="hidden object-contain w-24 md:w-48 mr-6 md:block" src="/images/SS1.png" alt="" />
        @endif
        <div class="overflow-hidden">
            <h3 class="text-xl md:text-3xl truncate mb-3">
                <span class="font-bold">{{ $listing->nombre }}</span>
            </h3>
            <div class="font-semibold md:text-xl">
                @if ($listing->status == 'Disponible')
                    <p class="text-green-600">Status: {{ $listing->status }}</p>
                @endif
                @if ($listing->status == 'En proceso')
                    <p class="text-yellow-600 ">Status: {{ $listing->status }}</p>
                @endif
                @if ($listing->status == 'Finalizado')
                    <p class="text-red-600 ">Status: {{ $listing->status }}</p>
                @endif
            </div>
            @if ($listing->img !== null)
                <img class="object-contain mr-6 p-4 sm:hidden"
                    src="{{ $listing->img ? asset('storage/' . $listing->img) : 'images/no-image.png' }}"
                    alt="" />
            @endif
            @if ($listing->img == null)
                <img class="object-contain mr-6 p-4 sm:hidden" src="/images/SS1.png" alt="" />
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
            <div class="mt-3 text-xl"><span class="font-bold">Inicia: </span>{{ $lel }}</div>
            <div class="text-xl mb-4"><span class="font-bold">Termina: </span>{{ $lel2 }}</div>
            @php
                $carta = DB::table('carta')
                    ->where('id_curso', $listing->id)
                    ->first();
            @endphp

            @if ($carta !== null)
                <div class="my-4">
                    <a href="{{ asset($carta->carta) }}" target="_blank" class="">
                        <button class="p-4 border-2 shadow rounded-lg bg-yellow-200">

                            <p class="text-xl font-semibold text-blue-600"><i
                                    class="fa-regular fa-hand-point-down"></i>&nbsp;Click para ver Carta
                                Descriptiva&nbsp;<i class="fa-regular fa-hand-point-down"></i></p>

                        </button>
                    </a>
                </div>
            @endif
            <div class="my-2 text-lg ">
                <span class="font-semibold"> Modalidad:</span> {{ $listing->modalidad }}
            </div>
            <div class="text-lg mt-2">
                @if ($listing->auditorio == 'Virtual')
                    <p class="  my-2"><span class="font-semibold">Tipo:</span> CURSO VIRTUAL</p>
                @endif
                @if ($listing->auditorio !== 'Virtual')
                    @if ($listing->tipo == 'Presencial')
                        <p class="   my-2"><span class="font-semibold">Tipo:</span> CURSO PRESENCIAL</p>
                    @endif
                    @if ($listing->tipo == 'Virtual')
                        <p class="   my-2"><span class="font-semibold">Tipo:</span> CURSO VIRTUAL</p>
                    @endif
                    @if ($listing->tipo == 'Actividad')
                        <p class="    my-2"><span class="font-semibold">Tipo:</span> CURSO CON ACTIVIDAD</p>
                    @endif
                    <span class="font-bold"> Lugar:</span>
                    {{ $listing->auditorio }} <i class="fa-solid fa-location-dot"></i>
                    <div class="m-2">
                        @php
                            $participantes = DB::table('participantes')
                                ->where('id_curso', $listing->id)
                                ->get();
                            $cuenta = $participantes->count();
                        @endphp
                    </div>


                    <div class="m-4">
                        <div class="mt-4">
                            <span class="font-semibold">Participantes: {{ $cuenta }}</span>
                        </div>
                        <div>
                            <div class="flex -space-x-4 max-w-full">
                                @if ($participantes->count() < 4)
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
                                @else
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
                                                src="/prueba_pics_submit/{{ $user->id }}" alt="">
                                            @php $count++; @endphp
                                        @endif
                                    @endforeach
                                    @if ($count = 4)
                                        <a class="flex items-center justify-center w-10 h-10  md:w-24 md:h-24 text-lg font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800"
                                            href="#">+{{ $cuenta - 3 }}</a>
                                    @endif


                                @endif

                            </div>

                        </div>
                    </div>

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
                @endif

            </div>

            <div class="p-2 border-2 border-black rounded-lg shadow-xl">
                <p><span class="font-bold">Responsable del evento:</span> {{ $listing->nombre_del_responsable }}</p>
                <p><span class="font-bold">Personal al que va dirigido:</span> {{ $listing->dirigido }}</p>
                <div class="flex gap-4">
                    <p><span class="font-bold">Horas teóricas:</span> {{ $listing->horas_teoricas }}</p>
                    <p><span class="font-bold">Horas prácticas:</span> {{ $listing->horas_practicas }}</p>
                </div>
                <p><span class="font-bold">Objetivo general:</span> {{ $listing->objetivo_general }}</p>
            </div>


        </div>
    </div>
    @if (!Auth::check() && $listing->tipo == 'Presencial')
        <div class="flex place-content-center mt-6">
            <form method="POST" action="/registro/{{ $listing->id }}">
                @csrf
                <a href="/registro/{{ $listing->id }}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px]">Registro</a>
            </form>
        </div>
    @endif
    @if (auth()->check() && $listing->tipo == 'Presencial' && auth()->user()->es_admin == '0')
        @php
            $registrado = DB::table('participantes')
                ->where('id_curso', $listing->id)
                ->where('id_user', auth()->user()->id)
                ->first();
        @endphp

        @if (!$registrado)
            <form method="POST" action="/listings">
                <div class="text-lg mt-4 flex place-content-center">
                    @csrf
                    <button data-modal-target="popup-modal{{ $listing->id }}"
                        data-modal-toggle="popup-modal{{ $listing->id }}" type="button"
                        class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px]">
                        <div class="flex items-center justify-center"><i
                                class="fa-regular fa-hand-point-down"></i>&nbsp;Click para Registro&nbsp;<i
                                class="fa-regular fa-hand-point-down"></i></div>
                    </button>
                </div>
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                <input type="hidden" name="id_curso" value="{{ $listing->id }}">
                <input type="hidden" name="nombre_curso" value="{{ $listing->nombre }}">
                <input type="hidden" name="rfc_participante" value="{{ auth()->user()->rfc }}">
                @php
                    $nombre_completo = auth()->user()->nombre . ' ' . auth()->user()->apellido_paterno . ' ' . auth()->user()->apellido_materno;
                @endphp
                <input type="hidden" name="nombre_participante" value="{{ $nombre_completo }}">
                <input type="hidden" name="email_participante" value="{{ auth()->user()->email }}">
                <input type="hidden" name="ubicacion" value="{{ $listing->auditorio }}">
                <input type="hidden" name="fecha_de_inicio" value="{{ $listing->fecha_de_inicio }}">
                <input type="hidden" name="fecha_de_terminacion" value="{{ $listing->fecha_de_terminacion }}">
                @php
                    $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                @endphp
                <input type="hidden" name="valor_curricular" value="{{ $valor_curricular }}">
                <input type="hidden" name="tipo" value="Asistente">
                <input type="hidden" name="img" value="n/a">
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
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col text-center items-center justify-center dark:text-white">
                                        <p>Confirma tu registro.</p>
                                        <p>CURSO: {{ $listing->nombre }}</p>
                                    </div>
                                </h3>
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
        @if ($registrado)
            <div class="flex place-content-center mt-6">
                <button
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">
                    <p class="">Estás registrado.</p>
                </button>
            </div>
        @endif
    @endif
    @if (auth()->check() && $listing->tipo == 'Actividad' && auth()->user()->es_admin == '0')
        @php
            $validado = DB::table('validaciones')
                ->where('id_curso', $listing->id)
                ->where('id_user', auth()->user()->id)
                ->first();
        @endphp
        @if ($validado == null)
            <div class="flex place-content-center mt-6">
                @csrf
                <a href="/users/actividades/{{ $listing->id }}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2  w-[215px]">
                    <div class="flex items-center justify-center"><i
                            class="fa-regular fa-hand-point-down"></i>&nbsp;Click para ir a la actividad&nbsp;<i
                            class="fa-regular fa-hand-point-down"></i></div>
                </a>
            </div>
        @endif
        @if ($validado !== null)
            <div class="flex place-content-center mt-6">
                <button
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">Has
                    aprobado este curso.</a>
            </div>
        @endif
    @endif
    @if (auth()->check() && $listing->tipo == 'Virtual' && auth()->user()->es_admin == '0')
        @php
            $validado = DB::table('validaciones')
                ->where('id_curso', $listing->id)
                ->where('id_user', auth()->user()->id)
                ->first();
        @endphp
        @if ($validado !== null)
            <div class="flex place-content-center mt-6">
                <button
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">Has
                    aprobado este curso.</a>
            </div>
        @endif
        @if ($validado == null)
            <div class="flex place-content-center mt-6">
                <a href="/users/xevalz/{{ $listing->id }}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">
                    <div class="flex items-center justify-center"><i
                            class="fa-regular fa-hand-point-down"></i>&nbsp;Click para ir a la evaluación&nbsp;<i
                            class="fa-regular fa-hand-point-down"></i></div>
                </a>
            </div>
        @endif
    @endif
</x-card>
