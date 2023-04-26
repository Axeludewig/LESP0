@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div class="overflow-hidden">
            <h3 class="text-2xl truncate">
                <a href="/listings/{{ $listing->id }}"><span class="font-bold">{{ $listing->nombre }}</span></a>
            </h3>
            <img class="object-contain mr-6 sm:hidden"
                src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
                alt="" />
            <div class="mt-3 text-xl mb-4"><span class="font-bold">Inicia: </span>{{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl mb-4"><span class="font-bold">Termina: </span>{{ $listing->fecha_de_terminacion }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                @if($listing->auditorio == 'Virtual')
                <p class="text-center animate-pulse text-green-600 text-2xl">CURSO VIRTUAL</p>
                @endif
                @if($listing->auditorio !== 'Virtual')
                <p class="text-center animate-pulse text-violet-600 text-2xl">CURSO PRESENCIAL</p>
                <span class="font-bold"> Auditorio:</span>
                {{ $listing->auditorio }} <i class="fa-solid fa-location-dot"></i>
                @endif
            </div>
            <h2 class="text-lg">
                <p><span class="font-bold">Modalidad a realizar:</span> {{ $listing->modalidad }}</p>
                <p><span class="font-bold">Tipo de capacitación:</span> {{ $listing->tipo }}</p>
                <p><span class="font-bold">Responsable del evento:</span> {{ $listing->nombre_del_responsable }}</p>
                <p><span class="font-bold">Personal al que va dirigido:</span> {{ $listing->dirigido }}</p>
                <p><span class="font-bold">Horas teóricas:</span> {{ $listing->horas_teoricas }}</p>
                <p><span class="font-bold">Horas prácticas:</span> {{ $listing->horas_practicas }}</p>
                <p><span class="font-bold">Objetivo general:</span> {{ $listing->objetivo_general }}</p>
                
            </h2>

        </div>
    </div>
    @if (!Auth::check() && $listing->tipo=='Presencial')
        <div class="flex place-content-center mt-6">
            <form method="POST" action="/registro/{{ $listing->id }}">
                @csrf
                <a href="/registro/{{ $listing->id }}"
                    class="hover:ring p-4 bg-mich5 text-white rounded-xl hover:bg-mich4 hover:text-black border-2 border-violet-600 hover:border-gray-500">Registrarse</a>
            </form>
        </div>
    @endif
    @if (auth()->check() && $listing->tipo == 'Presencial' && auth()->user()->es_admin=='0')
        <div class="flex place-content-center mt-6">
                @csrf
                <a href="/listings/{{ $listing->id }}"
                    class="hover:ring p-4 bg-mich5 text-white rounded-xl hover:bg-mich4 hover:text-black border-2 border-violet-600 hover:border-gray-500">Registrarse</a>
        </div>
    @endif
    @if (auth()->check() && $listing->tipo == 'Virtual' && auth()->user()->es_admin=='0')
        <div class="flex place-content-center mt-6">
                <a href="/users/xevalz/{{$listing->id}}"
                    class="hover:ring p-4 bg-mich5 text-white rounded-xl hover:bg-mich4 hover:text-black border-2 border-violet-600 hover:border-gray-500">Ir a evaluación</a>
        </div>
    @endif
</x-card>
