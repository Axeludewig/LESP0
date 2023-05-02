@props(['listing'])

<div class="max-w-sm p-6 bg-white border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full flex-col items-center">
        <div class="flex items-center justify-center w-full">
            <div>
                <h3 class="text-2xl text-center w-full">
                    {{ $listing['name'] }}
                    <div class="flex justify-center">
                        <img src="data:image/png;base64,{{ base64_encode($listing['image']) }}" width="150px" height="150px" />
                    </div>
                </h3>
                <form method="GET" action="/admin/descargarqr" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden="true" name="id_curso" value="{{ $listing['id_curso'] }}">
                    <input type="text" hidden="true" name="nombre_curso" value="{{ $listing['name'] }}">
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
