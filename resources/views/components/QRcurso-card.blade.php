@props(['listing'])

<div class="flex items-center justify-center">
    <x-card class="w-1/3">
        <div class="flex items-center justify-center">
            <div>
                <h3 class="text-2xl text-center">
                    {{ $listing['name'] }}
                    <div class="">
                        <img src="<?php echo $listing['image']; ?>" width="125px" height="125px" />
                    </div>
                </h3>
                <form method="GET" action="/admin/descargarqr" enctype="multipart/form-data">
                    @csrf
                    <input type="text" hidden="true" name="id_curso" value="{{ $listing['id_curso'] }}">
                    <input type="text" hidden="true" name="nombre_curso" value="{{ $listing['name'] }}">
                    <button type="submit"
                        class="w-5/6 bg-laravel text-white rounded py-2 px-4 hover:bg-mich4 hover:text-black flex place-content-center">
                        Descargar
                    </button>
                </form>
            </div>
        </div>
    </x-card>
</div>
