<x-layout>
    <a href="/admin/paneldecursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    @include('partials._user_search')
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl ">
            <p>Todos los cursos</p>
        </h3>
    </div>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 ">

        @unless(count($listings) == 0)



            @foreach ($listings as $listing)
                <x-admin-curso-card :listing="$listing" />
            @endforeach
        @else
            <p>No hay ningún registro.</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
        {{ $listings->links() }}
    </div>
</x-layout>
