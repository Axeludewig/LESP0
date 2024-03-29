<x-layout>
    <a href="/users/cursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    @include('partials._search')

    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl ">
            <p> EXPEDIENTE </p>
        </h3>
    </div>

    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl"> @php
            $totalHours = 0;
        @endphp
            <p> Total de horas: @foreach ($listings as $listing)
                    @php
                        // Extract the number of hours from the listing's string value
//preg_match('/(\d+) horas/', $listing->valor_curricular, $matches);
                        //    $hours = $matches[1];
                        
                        // Add the extracted hours to the total
                        //  $totalHours += $hours;
                        $horas_teoricas = $listing->horas_teoricas;
                        $horas_practicas = $listing->horas_practicas;
                        $totalHours = $horas_teoricas + $horas_practicas;
                    @endphp
                @endforeach{{ $totalHours }}</p>
        </h3>
    </div>

    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl">
            Total de cursos terminados: {{ count($listings) }}
        </h3>
    </div>

    

        @unless(count($listings) == 0)
        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 mb-52">
            @foreach ($listings as $listing)
                <x-expediente-card :listing="$listing" />
            @endforeach
        @else
            <p class="text-center mb-40 font-semibold p-4">No hay cursos finalizados.</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
    </div>
</x-layout>
