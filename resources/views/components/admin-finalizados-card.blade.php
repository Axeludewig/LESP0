@props(['listing'])

<x-card class="">
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->nombre }}</a>
            </h3>
            <div class="mt-3 text-xl font-bold mb-4">Inicia: {{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl font-bold mb-4">Termina: {{ $listing->fecha_de_terminacion }}</div>

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

            <form action="/emailall" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="nombre_curso" value="{{$listing->nombre}}">

                <button type="submit"
                    class="mt-3 w-5/6 bg-laravel text-white rounded py-2 px-2 hover:bg-black  flex place-content-center justify-center content-center">Enviar Constancias &nbsp; <i class="mt-1 content-center fa-regular fa-circle-check"></i>
                </button>
            </form>
        </div>
    </div>
</x-card>
