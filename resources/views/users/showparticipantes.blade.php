<x-layout>
    <a href="/users/evaluar" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    @php
        $cuenta = count($eval->participantes);
    @endphp
    <div class="text-center">
        <p>PARTICIPANTES: {{ $cuenta }}</p>
    </div>
    @foreach ($eval->participantes as $participante)
        @php
            $evaluado = DB::table('evals_adquiridas')
                ->where('id_evaluado', $participante->id_user)
                ->where('id_evaladq', $eval->id)
                ->first();
            
        @endphp

        @if ($evaluado == null)
            <div class="flex justify-center gap-12 items-center m-2">
                <p>{{ $participante->nombre_participante }}</p><a
                    href="/evaluar/{{ $participante->id_user }}/{{ $eval->id }}"><button
                        class="bg-laravel text-white px-4 py-2 rounded-lg shadow">Evaluar</button></a>
            </div>
        @else
            <div class="flex justify-center gap-12 items-center m-2">
                <p>{{ $participante->nombre_participante }} ya fue evaluado. Resultado:
                    {{ $evaluado->interpretacion_resultado }}</p>
                @if ($evaluado->validacion_ensenanza == 'VALIDADO')
                    <a href="/generate_pdf/{{ $evaluado->id }}">
                        <button class="bg-laravel text-white p-4 m-4 rounded-lg">
                            Ver evaluación en PDF
                        </button>
                    </a>
                @endif
            </div>
        @endif
    @endforeach
</x-layout>
