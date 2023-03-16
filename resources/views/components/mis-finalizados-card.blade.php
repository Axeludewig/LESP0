@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                {{ $listing->nombre }}
            </h3>
            <div class="mt-3 text-xl font-bold mb-4">Inicio: {{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl font-bold mb-4">Final: {{ $listing->fecha_de_terminacion }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
            </div>

            <div class="mt-4 ml-8 mb-4 text-lg mt-4 flex space-evenly w-1/2">
                <form method="POST" action="/validaciones/generar" enctype="multipart/form-data">
                    @csrf
                    @php
                        $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                    @endphp
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre_curso"
                        hidden="true" value="{{ $listing->nombre }}" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre_usuario"
                        hidden="true"
                        value="{{ auth()->user()->nombre }} {{ auth()->user()->apellido_paterno }} {{ auth()->user()->apellido_materno }}" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="valor_curricular"
                        hidden="true" value="{{ $valor_curricular }}" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="status"
                        hidden="true" value="Verificado" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tipo"
                        hidden="true" value="Asistente" />
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="folio"
                        hidden="true" value="B2A2023{{ $listing->numero_consecutivo }}F" />
                    <button type="submit"
                        class="w-5/6 bg-laravel text-white rounded py-2 px-4 hover:bg-black  flex place-content-center">Generar
                        Validación <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                    </button>
                </form>

                <form method="GET" action="/pdf" enctype="multipart/form-data">
                    @csrf
                    @php
                        $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                    @endphp
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
                        class="w-5/6 bg-laravel text-white rounded py-2 px-4 hover:bg-black flex place-content-center">
                        Generar Constancia <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                    </button>
                </form>

                <form method="GET" action="/emailme" enctype="multipart/form-data">
                    @csrf
                    @php
                        $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                    @endphp
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
                        class="w-5/6 bg-laravel text-white rounded py-2 px-4 hover:bg-black flex place-content-center">
                        Enviar constancia por correo <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-card>
