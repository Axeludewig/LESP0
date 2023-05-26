@props(['listing'])

<x-card class="">
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div class="overflow-hidden">
            <h3 class="text-2xl md:text-3xl truncate mb-3 font-extrabold">
                <a href="/listings/{{ $listing->id }}">{{ $listing->nombre }}</a>
            </h3>
            @if($listing->auditorio == 'Virtual')
                <p class=" animate-pulse text-green-600 md:text-2xl">CURSO VIRTUAL</p>
                @endif
                @if($listing->auditorio !== 'Virtual')
                    @if($listing->tipo == 'Presencial')
                    <p class=" animate-pulse text-violet-600 md:text-2xl">CURSO PRESENCIAL</p>
                    @endif
                    @if($listing->tipo == 'Actividad')
                    <p class=" animate-pulse text-violet-600 md:text-2xl">CURSO CON ACTIVIDAD</p>
                    @endif
                @endif
            <div class="mt-3 text-xl font-semibold mb-4">Inicia: {{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl font-semibold mb-4">Termina: {{ $listing->fecha_de_terminacion }}</div>

            <x-listing-tags :tagsCsv="$listing->tags" />

            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
            </div>
            <!--
            <form method="POST" action="/validaciones" enctype="multipart/form-data">
                @csrf

                @php
                    $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                @endphp
                
                <input type="hidden" name="id_curso" value="{{ $listing->id}}">
                
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre_curso"
                    hidden="true" value="{{ $listing->nombre }}" />

                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="id_curso" hidden="true"
                    value="{{ $listing->id }}" />

                <input type="text" name="valor_curricular" hidden="true" value="{{ $valor_curricular }}" />

                <input type="text" name="status" hidden="true" value="Verificado" />

                <input type="text" name="tipo" hidden="true" value="Asistente" />

                @php $currentYear = now()->format('Y'); @endphp
                <input type="text" name="folio" hidden="true"
                    value="B2A{{$currentYear}}C{{ $listing->numero_consecutivo }}F" />

                <button type="submit"
                    class="mt-3 w-5/6 bg-laravel text-white rounded py-2 px-4 hover:bg-black  flex place-content-center justify-center content-center">Generar
                    Validaciones &nbsp; <i class="mt-1 content-center fa-regular fa-circle-check"></i>
                </button>
            </form> -->
            @if($listing->tipo == 'Actividad')
                <div class="p-8 truncate mb-3">
                    <p class="whitespace-normal">
                        No se pueden enviar las constancias de actividad. Éstas se obtienen al ser aprobado por el ponente.
                    </p>
                </div>
            @endif

            @if($listing->tipo == 'Virtual')
                <div class="p-8 truncate mb-3">
                    <p class="whitespace-normal">
                        No se pueden enviar las constancias de curso virtual. Éstas se obtienen al aprobar la evaluación en línea.
                    </p>
                </div>
            @endif
        

            @if ($listing->tipo !== 'Actividad' && $listing->tipo !== 'Virtual')
            <form action="/emailall" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id_curso" value="{{$listing->id}}">

                <button type="submit"
                    class="mt-3 w-[200px] bg-laravel text-white rounded py-2 px-2 hover:bg-black  flex place-content-center justify-center content-center">Enviar Constancias &nbsp; <i class="content-center fa-regular fa-circle-check my-auto"></i>
                </button>
            </form>
            @endif
        </div>
    </div>
</x-card>
