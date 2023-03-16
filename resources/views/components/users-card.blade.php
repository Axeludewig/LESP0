@props(['listing'])

<x-card>
    <div class="flex place-content-center">
        <h3 class="text-2xl">
            <b>{{ $listing->apellido_paterno }} {{ $listing->apellido_materno }} {{ $listing->nombre }}</b>
        </h3>
    </div>
    <form method="POST" action="/users/{{ $listing->id }}">
        <div class="text-lg mt-4 flex place-content-center">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Eliminar</button>
        </div>
    </form>
    <form method="POST" action="/users/{{ $listing->id }}">
        <div class="text-lg mt-4 flex place-content-center">
            @csrf
            @method('DELETE')
            <button class="text-red-500"><i class="fa-solid fa-trash"></i> Editar</button>
        </div>
    </form>
</x-card>
