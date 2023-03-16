<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="hidden object-contain w-48 mr-6 md:block"
                    src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
                    alt="" /><br>
                <h3 class="text-5xl mb-2">
                    <span class="font-bold">{{ $listing->nombre }}</span>
                </h3>
                <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>

                <x-listing-tags :tagsCsv="$listing->tags" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
                </div>
                <div class="text-lg my-4">
                    <i class="fa-solid fa-calendar-xmark"></i><span class="font-semibold"> Inicio:</span>
                    {{ $listing->fecha_de_inicio }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    @if (auth()->check()) {
                        <h3 class="text-3xl font-bold mb-4">Descripción del curso</h3>
                        <div class="text-lg space-y-6">
                            {{ $listing->descripcion }}




                            <form method="POST" action="/listings" enctype="multipart/form-data">
                                <div class="mb-6">

                                    @csrf
                                    <div class="mb-6">
                                        <label for="nombre_curso" class="inline-block text-lg mb-2">
                                            <span class="font-bold">Nombre de la capacitación:</span>
                                            {{ $listing->nombre }}
                                        </label>
                                        <input type="text" hidden="true" contenteditable="false"
                                            class="border border-gray-200 rounded p-2 w-full" name="nombre_curso"
                                            rows="10" value="{{ $listing->nombre }}"
                                            placeholder="{{ $listing->nombre }}">
                                        </input>

                                        @error('nombre_curso')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <input type="text" hidden="true" name="email_participante"
                                        value="{{ auth()->user()->email }}" />

                                    <div class="mb-6">
                                        <label for="rfc_participante" class="inline-block text-lg mb-2">
                                            <span class="font-bold">RFC del participante:</span>
                                            {{ auth()->user()->rfc }}
                                        </label>
                                        <input type="text" hidden="true" contenteditable="false"
                                            class="border border-gray-200 rounded p-2 w-full" name="rfc_participante"
                                            rows="10" value="{{ auth()->user()->rfc }}"
                                            placeholder="{{ auth()->user()->rfc }}">
                                        </input>

                                        @error('rfc_participante')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-6">
                                        <label for="nombre_participante" class="inline-block text-lg mb-2">
                                            <span class="font-bold">Nombre del participante:</span>
                                            {{ auth()->user()->nombre }} {{ auth()->user()->apellido_paterno }}
                                            {{ auth()->user()->apellido_materno }}
                                        </label>
                                        <input type="text" hidden="true" contenteditable="false"
                                            class="border border-gray-200 rounded p-2 w-full" name="nombre_participante"
                                            rows="10"
                                            value="{{ auth()->user()->nombre }} {{ auth()->user()->apellido_paterno }} {{ auth()->user()->apellido_materno }}"
                                            placeholder="{{ auth()->user()->nombre }}">
                                        </input>

                                        @error('nombre_participante')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-3 text-xl mb-4"><span class="font-bold">Inicia:</span>
                                        {{ $listing->fecha_de_inicio }}
                                        <input type="hidden" id="fecha_de_inicio" name="fecha_de_inicio"
                                            value="{{ $listing->fecha_de_inicio }}"
                                            class="border border-gray-200 rounded p-2 w-full">
                                    </div>

                                    <div class="text-xl mb-4"><span class="font-bold">Termina:</span>
                                        {{ $listing->fecha_de_terminacion }}
                                        <input type="hidden" id="fecha_de_terminacion" name="fecha_de_terminacion"
                                            value="{{ $listing->fecha_de_terminacion }}"
                                            class="border border-gray-200 rounded p-2 w-full">
                                    </div>

                                    <div class="text-lg mt-4">
                                        <span class="font-bold"> Auditorio:</span>
                                        {{ $listing->auditorio }} <i class="fa-solid fa-location-dot"></i>
                                        <input type="hidden" id="ubicacion" name="ubicacion"
                                            value="{{ $listing->auditorio }}"
                                            class="border border-gray-200 rounded p-2 w-full">
                                    </div>

                                    <h2 class="text-lg">
                                        <p><span class="font-bold">Modalidad a realizar:</span>
                                            {{ $listing->modalidad }}
                                        </p>


                                        <p><span class="font-bold">Tipo de capacitación:</span> {{ $listing->tipo }}
                                        </p>


                                        <p><span class="font-bold">Responsable del evento:</span>
                                            {{ $listing->nombre_del_responsable }}</p>

                                        <p><span class="font-bold">Personal al que va dirigido:</span>
                                            {{ $listing->dirigido }}</p>


                                        <p><span class="font-bold">Horas teóricas:</span>
                                            {{ $listing->horas_teoricas }}
                                        </p>


                                        <p><span class="font-bold">Horas prácticas:</span>
                                            {{ $listing->horas_practicas }}
                                        </p>
                                        <p><span class="font-bold">Categoría:</span> {{ $listing->categoria }}</p>
                                        <p><span class="font-bold">Objetivo general:</span>
                                            {{ $listing->objetivo_general }}</p>
                                        <p><span class="font-bold">Forma de evaluación:</span>
                                            {{ $listing->forma_de_evaluacion }}</p>
                                        <p><span class="font-bold">Porcentaje de asistencia requerido para acreditar
                                                curso
                                                del 70 al
                                                100%:</span> {{ $listing->porcentaje_asistencia }}
                                        </p>
                                        <p><span class="font-bold">Calificación requerida para acreditar curso
                                                (cuestionario
                                                cuando aplique) del
                                                80% al 100%: </span>
                                            {{ $listing->calificacion_requerida }}</p>
                                        <p><span class="font-bold">Requiere evaluación de la capacitación adquidida
                                                (antes
                                                de los 30 días
                                                hábiles) Sí/No :</span> {{ $listing->evaluacion_adquirida }}</p>
                                    </h2>




                                    <div class="mb-6">
                                        <label for="img" class="inline-block text-lg mb-2">
                                        </label>
                                        <input type="text" hidden="true" contenteditable="false"
                                            class="border border-gray-200 rounded p-2 w-full" name="img"
                                            rows="10" value="{{ $listing->img }}"
                                            placeholder="{{ $listing->img }}">
                                        </input>

                                        @error('img')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @php
                                        $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                                    @endphp

                                    <input type="text" hidden="true" contenteditable="false"
                                        class="border border-gray-200 rounded p-2 w-full" name="valor_curricular"
                                        rows="10" value="{{ $valor_curricular }}" </input>

                                    <input type="text" hidden="true" contenteditable="false"
                                        class="border border-gray-200 rounded p-2 w-full" name="tipo"
                                        rows="10" value="Asistente" </input>

                                    @if (auth()->user()->es_admin == '0')
                                        <button type="submit"
                                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                            Registrarse
                                        </button>

                                        <a href="/" class="text-black ml-4"> Volver </a>
                                    @else
                                        <a href="/"
                                            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                            Volver
                                        </a href>
                                </div>
                    @endif
                </div>
                </form>
                } @endif

                @if (auth()->check()) {
                    @if (auth()->user()->es_admin == '1')
                        <div class="flex flex-col items-center justify-center place-content-center text-center mt-6">
                            <form method="GET" action="/cursos/export" enctype="multipart/form-data">
                                @csrf


                                <button type="submit"
                                    class="w-full bg-laravel text-white rounded py-2 px-4 hover:bg-black flex place-content-center">
                                    Generar Carta Descriptiva &nbsp; <i class="fa-sharp fa-solid fa-pen-to-square"></i>
                                </button>
                            </form>
                    @endif
                    }
                @endif

                @if (auth()->check()) {
                    @if (auth()->user()->es_admin == '1' && $listing->status == 'En proceso')
                        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mt-4 mb-4 text-lg mt-4 flex place-content-center">
                                <label for="status" class="inline-block text-lg mb-2">
                                </label>
                                <input type="password" class="border border-gray-200 rounded p-2 w-full"
                                    name="status" value="Finalizado" hidden="true" />
                                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                    Finalizar Curso <i class="fa-solid fa-heart-circle-check"></i>
                                </button>
                            </div>
                        </form>
                    @elseif (auth()->user()->es_admin == '1' && $listing->status == 'Disponible')
                        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="mt-4 mb-4 text-lg mt-4 flex place-content-center">
                                <label for="status" class="inline-block text-lg mb-2">
                                </label>
                                <input type="password" class="border border-gray-200 rounded p-2 w-full"
                                    name="status" value="En proceso" hidden="true" />
                                <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                    Iniciar Curso <i class="fa-solid fa-heart-circle-bolt"></i>
                                </button>
                            </div>
                        </form>
                    @endif
                    }
                @endif
                @if (!Auth::check())
                    <div class="flex place-content-center mt-6 mb-6">
                        <form method="POST" action="/registro/{{ $listing->id }}">
                            @csrf
                            <a href="/registro/{{ $listing->id }}"
                                class="hover:ring p-4 bg-mich5 text-white rounded-xl hover:bg-mich4 hover:text-black border-2 border-violet-600 hover:border-gray-500 ">Registrarse</a>
                        </form>
                    </div>
                @endif

            </div>
    </div>
    </div>
    </x-card>
    </div>
</x-layout>
