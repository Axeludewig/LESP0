@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden object-contain w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{ $listing->id }}"><span class="font-bold">{{ $listing->nombre }}</span></a>
            </h3>
            <img class="object-contain mr-6 sm:hidden"
                src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
                alt="" />
            <div class="mt-3 text-xl mb-4"><span class="font-bold">Inicia: </span>{{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl mb-4"><span class="font-bold">Termina: </span>{{ $listing->fecha_de_terminacion }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <span class="font-bold"> Auditorio:</span>
                {{ $listing->auditorio }} <i class="fa-solid fa-location-dot"></i>
            </div>
            <h2 class="text-lg">
                <p><span class="font-bold">Modalidad a realizar:</span> {{ $listing->modalidad }}</p>
                <p><span class="font-bold">Tipo de capacitación:</span> {{ $listing->tipo }}</p>
                <p><span class="font-bold">Responsable del evento:</span> {{ $listing->nombre_del_responsable }}</p>
                <p><span class="font-bold">Personal al que va dirigido:</span> {{ $listing->dirigido }}</p>
                <p><span class="font-bold">Horas teóricas:</span> {{ $listing->horas_teoricas }}</p>
                <p><span class="font-bold">Horas prácticas:</span> {{ $listing->horas_practicas }}</p>
                <p><span class="font-bold">Categoría:</span> {{ $listing->categoria }}</p>
                <p><span class="font-bold">Objetivo general:</span> {{ $listing->objetivo_general }}</p>
                <p><span class="font-bold">Forma de evaluación:</span> {{ $listing->forma_de_evaluacion }}</p>
                <p><span class="font-bold">Porcentaje de asistencia requerido para acreditar curso del 70 al
                        100%:</span> {{ $listing->porcentaje_asistencia }}
                </p>
                <p><span class="font-bold">Calificación requerida para acreditar curso (cuestionario cuando aplique) del
                        80% al 100%: </span>
                    {{ $listing->calificacion_requerida }}</p>
                <p><span class="font-bold">Requiere evaluación de la capacitación adquidida (antes de los 30 días
                        hábiles) Sí/No :</span> {{ $listing->evaluacion_adquirida }}</p>
            </h2>

        </div>
    </div>
</x-card>
