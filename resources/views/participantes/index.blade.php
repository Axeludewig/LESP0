<x-layout>
    <a href="/users/perfil" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    @include('partials._search')

    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl ">
            <p>Mis cursos en proceso.</p>
        </h3>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($listings) == 0)

            @foreach ($listings as $listing)
                <x-participantes-card :listing="$listing" />
            @endforeach
        @else
            <p>No tienes cursos en proceso.</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
    </div>
</x-layout>
