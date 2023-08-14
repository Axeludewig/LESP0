<div class="p-4 shadow border-2 rounded-lg m-4 text-center">
    <div class="m-4">
        <p><span class="font-semibold">Nombre del curso: </span>{{$eval->infoCurso->nombre}}</p>
        <p><span class="font-semibold">Fecha de terminación: </span>{{$eval->infoCurso->fecha_de_terminacion}}</p>
        <p><span class="font-semibold">Fecha de evaluación: </span>{{$eval->fecha_evaluacion}}</p>
        <p><span class="font-semibold">Status: </span>{{$eval->status}}</p>
        @if($eval->status == 'Pendiente')
    </div>
    <div class="shadow border rounded-lg p-4 m-4s  bg-laravel text-white">

        <a href="/users/evaluar/{{$eval->id}}">
            <h1 class="font-semibold text-xl">Evaluar participantes</h1>
        </a>
     
    
    </div>
    @endif
</div>