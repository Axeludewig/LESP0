<x-layout>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    @include('partials._search')

    <div
        class="m-4 ml-20 mr-20 flex bg-mich5 text-white border border-gray-200 rounded p-6 place-content-center hover:bg-mich4 hover:text-black">
        <h3 class="text-2xl">
            <p>Validación de constancia.</p>
        </h3>
    </div>

    <div class="flex place-content-center">

        @unless(count($listings) == 0)

            @foreach ($listings as $listing)
                <x-validaciones-card :listing="$listing" />
            @endforeach
        @else
            <p>No tienes cursos en proceso.</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
    </div>
</x-layout>
