@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}">{{ $listing->nombre }}</a>
            </h3>
            <div class="mt-3 text-xl font-bold mb-4">Inicia: {{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl font-bold mb-4">Termina: {{ $listing->fecha_de_terminacion }}</div>
                <div class="font-semibold text-xl">
                    @if($listing->status == 'Disponible')
                        <p class="text-green-600">Status: {{$listing->status}}</p>
                    @endif
                    @if($listing->status == 'En proceso')
                        <p class="text-yellow-600">Status: {{$listing->status}}</p>
                    @endif
                    @if($listing->status == 'Finalizado')
                        <p class="text-red-600">Status: {{$listing->status}}</p>
                    @endif                    
                </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
            </div>
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

            <form method="POST" action="/listings/{{ $listing->id }}">
                <div class="text-lg mt-4 flex place-content-center">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Eliminar</button>
                </div>
            </form>
        </div>

    </div>
</x-card>
