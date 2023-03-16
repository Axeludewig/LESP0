@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                {{ $listing->nombre }}
            </h3>
            <div class="text-xl font-bold mb-4">Terminado: {{ $listing->fecha_de_terminacion }}</div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> Horas teóricas:

                {{ $listing->horas_teoricas }}
            </div>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> Horas prácticas:

                {{ $listing->horas_practicas }}
            </div>
        </div>
    </div>
</x-card>
