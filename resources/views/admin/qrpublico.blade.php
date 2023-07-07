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
            <p>Códigos QR para registro público (sin sesión de usuario)</p>
        </h3>
    </div>

  

        @unless(count($qrCode) == 0)
        <div class="mt-6 flex flex-col items-center justify-center gap-4 mx-6">
            <div class="max-w-sm p-6 bg-white border-gray-200 rounded-lg hover:scale-105 shadow-xl w-full flex-col items-center">
                <div class="flex items-center justify-center w-full">
                    <div>
                        <h3 class="text-2xl text-center w-full">
                            {{ $qrCode['name'] }}
                            <div class="flex justify-center">
                                <img src="data:image/png;base64,{{ base64_encode($qrCode['image']) }}" width="150px" height="150px" />
                            </div>
                        </h3>
                        <form method="GET" action="/admin/descargarqr" enctype="multipart/form-data">
                            @csrf
                            <input type="text" hidden="true" name="id_curso" value="{{ $qrCode['id_curso'] }}">
                            <input type="text" hidden="true" name="nombre_curso" value="{{ $qrCode['name'] }}">
                            <div class="flex justify-center">
                            <button type="submit"
                                class="w-[125px] bg-laravel text-white rounded py-2 px-4 hover:bg-mich4 hover:text-black flex place-content-center justify-center">
                                Descargar
                            </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        @else
        <p class="text-center mb-80 font-semibold p-4">No hay códigos.</p>
        @endunless

    </div>

    <div class="mt-6 p-4">
    </div>
</x-layout>
