<x-layout>
    @php
        $count = 1;
    @endphp
    <a href="/admin/evaladq" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>

    <div class="flex flex-col justify-center items-center text-center rounded-lg border shadow p-4">
        @foreach ($eval->participantes as $participante)
            @php
                $participante->evaluado = DB::table('evals_adquiridas')
                    ->where('id_evaluado', $participante->id_user)
                    ->where('id_evaladq', $eval->id)
                    ->first();
            @endphp

            @if ($participante->evaluado != null)
                @if ($participante->evaluado->validacion_ensenanza == 'N/A')
                    <div class="flex items-center justify-center gap-4">
                        <p>{{ $count }}.- {{ $participante->nombre_participante }} ya está evaluado.</p>
                        <a href="/admin/evaladq/{{ $participante->id_user }}/{{ $participante->evaluado->id }}">
                            <button class="bg-laravel text-white p-4 m-4 rounded-lg">
                                Revisar y firmar
                            </button>
                        </a>
                    </div>
                @else
                    <div class="flex items-center justify-center gap-4">
                        <p>{{ $count }}.- {{ $participante->nombre_participante }} ya está evaluado y firmado.
                        </p>
                        <a href="/generate_pdf/{{ $participante->evaluado->id }}">
                            <button class="bg-laravel text-white p-4 m-4 rounded-lg">
                                Ver evaluación en PDF
                            </button>
                        </a>
                    </div>
                @endif
            @endif

            @if ($participante->evaluado === null)
                <p>{{ $count }}.- {{ $participante->nombre_participante }} No está evaluado.</p>
            @endif

            @php
                $count++;
            @endphp
        @endforeach
    </div>
</x-layout>
