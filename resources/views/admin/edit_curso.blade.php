<x-layout>
    <a href="/admin/showallcursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    @php
        $fields = ['nombre', 'modalidad', 'tipo', 'coordinacion', 'dirigido', 'numero_de_asistentes', 'horas_teoricas', 'horas_practicas', 'categoria', 'auditorio', 'fecha_de_inicio', 'fecha_de_terminacion', 'objetivo_general', 'forma_de_evaluacion', 'porcentaje_asistencia', 'calificacion_requerida', 'evaluacion_adquirida'];
        
        $temas = DB::table('temas')
            ->where('id_curso', $curso->id)
            ->get();
        
        $fields2 = ['fechayhora', 'contenido_tematico', 'objetivos', 'tecnica', 'horas_teoricas', 'horas_practicas', 'referencia'];
        
    @endphp

    <div class="flex flex-col justify-center items-center">
        <form method="POST" action="/admin/editcurso/{{ $curso->id }}">
            @csrf
            <div class="flex flex-col justify-center items-center">
                <h1 class="font-semibold text-xl">Editar Curso</h1>
                <div class="grid grid-cols-3 gap-4 rounded-lg shadow border p-4 m-4">
                    @foreach ($fields as $field)
                        <div class="col-span-1 flex gap-4 justify-center items-center">
                            @php
                                $fieldName = $field;
                                $fieldValue = $curso->$fieldName;
                                
                                // Handling datetime fields
                                if ($field === 'fecha_de_inicio' || $field === 'fecha_de_terminacion') {
                                    $dateTime = new DateTime($fieldValue);
                                    $formattedDateTime = $dateTime->format('Y-m-d\TH:i'); // Adjust format as needed
                                    $fieldValue = $formattedDateTime;
                                }
                                
                                echo '<label for="' . $field . '">' . ucwords(str_replace('_', ' ', $field)) . '</label>';
                                echo '<input type="' . ($field === 'fecha_de_inicio' || $field === 'fecha_de_terminacion' ? 'datetime-local' : 'text') . '" id="' . $field . '" name="' . $field . '" value="' . $fieldValue . '" ><br>';
                            @endphp
                        </div>
                    @endforeach
                </div>
                <div class="shadow rounded-lg border p-8 m-6">
                    <h1>Temas del curso:</h1>
                </div>
                @foreach ($temas as $tema)
                    {{ $tema->numero }}
                    <div class="border rounded-lg shadow p-4 m-2">
                        @foreach ($fields2 as $field)
                            <div class="flex gap-6 justify-center items-center p-2">
                                @php
                                    $fieldName = $field;
                                    $fieldValue = $tema->$fieldName;
                                    
                                    if ($field === 'fechayhora') {
                                        $dateTime = new DateTime($fieldValue);
                                        $formattedDateTime = $dateTime->format('Y-m-d\TH:i'); // Adjust format as needed
                                        $fieldValue = $formattedDateTime;
                                    }
                                    
                                    echo '<label for="' . $field . '">' . ucwords(str_replace('_', ' ', $field)) . '</label>';
                                    echo '<input type="' . ($field === 'fechayhora' ? 'datetime-local' : 'text') . '" id="' . $field . '" name="tema[' . $tema->id . '][' . $field . ']" value="' . $fieldValue . '" ><br>';
                                    
                                @endphp
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="flex justify-center">
                    <button type="submit" class="text-white bg-laravel p-4 m-4 rounded-lg shadow ">
                        Guardar cambios
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layout>
