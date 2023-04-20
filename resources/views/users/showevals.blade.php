@props(['evaluaciones'])

<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
    class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
    <h3 class="text-3xl ">
        <p class="font-semibold">Permisos para evaluaciones en línea</p>
    </h3>
</div>

    @foreach($evaluaciones as $evals)
    <div class="flex flex-col justify-center text-center text-2xl items-center">
        <p>Nombre de la capacitación: {{$evals->nombre}}</p>
        <a href="/users/xeval/{{$evals->id}}" class="m-3 p-3 border-2 border-laravel hover:ring hover:outline-none">Ir a la evaluación.</a>
    </div>
    @endforeach
</x-layout>