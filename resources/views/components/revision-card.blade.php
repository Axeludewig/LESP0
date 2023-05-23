@props(['actividad'])

<x-card>
    <h3 class="font-semibold text-center text-xl md:text-3xl truncate mb-3">
        {{$actividad->nombre}}
    </h3>
    <div class="font-semibold text-xl text-center">
        @if($actividad->status == 'Disponible')
            <p class="text-green-600 animate-pulse">Status: {{$actividad->status}}</p>
        @endif
        @if($actividad->status == 'En proceso')
            <p class="text-yellow-600 animate-pulse">Status: {{$actividad->status}}</p>
        @endif
        @if($actividad->status == 'Finalizado')
            <p class="text-red-600 animate-pulse">Status: {{$actividad->status}}</p>
        @endif                    
    </div>
    <div>
        <h3 class="font-semibold text-center text-xl md:text-2xl truncate mt-3">
            Descripción:
        </h3>
        <p class="text-xl text-center m-6">
            {{$actividad->descripcion}}
        </p>
    </div>
    <div class="flex flex-col items-center justify-center text-center">
        <form action="/users/single_revision">
            @csrf
            <input type="hidden" name="id_curso" value="{{$actividad->id_curso}}"/>
            <button class="p-4 border-2 bg-laravel text-white rounded-full px-8">
                Ver entregas
            </button>
        </form>
    </div>
</x-card>
