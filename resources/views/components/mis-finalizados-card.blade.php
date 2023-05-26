@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/SS1.png') }}"   
            alt="" />
        <div class="overflow-hidden">
            <h3 class="text-2xl">
                {{ $listing->nombre }}
            </h3>
            <div class="mt-3 text-xl font-bold mb-4">Inicio: {{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl font-bold mb-4">Final: {{ $listing->fecha_de_terminacion }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
            </div>

            <div class="mt-4 md:ml-16 mb-4 text-lg flex flex-col space-evenly ">


                <form action="/pdf_download/bitacora">
                    @php
                        $validacion = DB::table('validaciones')->where('id_curso', $listing->id)->where('id_user', auth()->user()->id)->first();
                    @endphp

                    @if ($validacion !== null)
                        <input type="hidden" name="folio" value="{{$validacion->folio}}">
                        <input type="hidden" name="nombre_participante" value="{{$validacion->nombre_usuario}}">
                        <input type="hidden" name="nombre_capacitacion" value="{{$validacion->nombre_curso}}">
                        <input type="hidden" name="tipo_participacion" value="{{$validacion->tipo}}">
                        <input type="hidden" name="fecha_capacitacion" value="{{$validacion->fecha_de_registro}}">
                        <input type="hidden" name="valor_curricular" value="{{$validacion->valor_curricular}}">
                        <button type="submit"
                        class="my-auto w-[270px] bg-laravel text-white rounded py-2 px-4 hover:bg-black  flex place-content-center justify-center content-center">Descargar
                        constancia <i
                            class="my-auto mx-2 justify-center place-self-center content-center fa-solid fa-file-arrow-down"></i>
                    </button>
                    @endif
                </form>

                @if ($validacion !== null)
                <form method="GET" action="/emailme" enctype="multipart/form-data">
                    @csrf
                    @php
                        $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                    @endphp
                    <input type="hidden" name="id_curso" value="{{$listing->id}}">
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre"
                        hidden="true" value="{{ $listing->nombre }}" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="fecha_de_terminacion"
                        hidden="true" value="{{ $listing->fecha_de_terminacion }}" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre_user"
                        hidden="true" value="{{ auth()->user()->nombre }}" />

                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="valor_curricular"
                        hidden="true" value="{{ $valor_curricular }}" />

                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="apellido_paterno"
                        hidden="true" value="{{ auth()->user()->apellido_paterno }}" />

                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="apellido_materno"
                        hidden="true" value="{{ auth()->user()->apellido_materno }}" />


                    <button type="submit"
                        class="my-4 w-[270px] bg-laravel text-white rounded py-2 px-4 hover:bg-black  flex place-content-center justify-center content-center">Enviar
                        por correo <i
                            class="my-auto mx-2 justify-center place-self-center content-center fa-solid fa-envelope"></i>
                    </button>
                </form>
                @endif
                @if ($validacion == null)
                    <div class="md:p-4 text-sm md:text-lg truncate mb-3">
                        <p class="whitespace-normal">
                            Este curso finalizó pero no se encontró una validación en la bitácora con tu información. Las constancias de cursos virtuales se obtienen aprobando la evaluación y las constancias de actividades se obtienen siendo aprobado por el ponente.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-card>
