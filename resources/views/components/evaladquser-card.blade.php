<div class="p-4 shadow border-2 rounded-lg m-4 text-center">
    <div class="m-4">
        <p><span class="font-semibold">Nombre del curso: </span>{{$eval->infoCurso->nombre}}</p>
        <p><span class="font-semibold">Fecha de terminación: </span>{{$eval->infoCurso->fecha_de_terminacion}}</p>
        <p><span class="font-semibold">Fecha de evaluación: </span>{{$eval->fecha_evaluacion}}</p>
        <p><span class="font-semibold">Status: </span>{{$eval->status}}</p>
        @if($eval->status == 'Pendiente')
    </div>
    <div class="shadow border rounded-lg p-4 m-4s">
        <h1 class="font-semibold text-xl">Evaluar participantes</h1>
    @foreach ($eval->participantes as $participante)
    <div class="flex justify-center gap-12 items-center m-2">
        <p>{{$participante->nombre_participante}}</p><a href="/evaluar/{{$participante->id_user}}/{{$eval->id}}"><button class="bg-laravel text-white px-4 py-2 rounded-lg shadow">Evaluar</button></a>
    </div>
    @endforeach
    </div>
    @endif
</div>