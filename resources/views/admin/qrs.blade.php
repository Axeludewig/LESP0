<x-layout>
    <a href="/admin/paneldecursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    @include('partials._qr_search')
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl ">
            <p>Códigos QR para registro a capacitaciones</p>
        </h3>
    </div>

  

        @unless(count($qrCodes) == 0)
        <div class="mt-6 flex flex-col items-center justify-center gap-4 mx-6">
            @foreach ($qrCodes as $qrCode)
                <x-QRcurso-card :listing="$qrCode" />
            @endforeach
        @else
        <p class="text-center mb-80 font-semibold p-4">No hay códigos.</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
    </div>
</x-layout>
