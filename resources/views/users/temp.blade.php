<div class="mt-12 md:hidden md:grid-cols-2 md:grid-rows-2 gap-14 font-sans px-14 w-screen hidden">
    <div class="md:m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
    
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Nombre:</span><br> {{ auth()->user()->nombre }}
                {{ auth()->user()->apellido_paterno }}
                {{ auth()->user()->apellido_materno }}</p>
        </h3>
    </div>
    <div
        class="md:m-6 flex flex-wrap break-all bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Correo electrónico:</span><br> {{ auth()->user()->email }}</p>
        </h3>
    </div>
    <div
        class="md:m-6 break-words flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Descripción del puesto:</span>
                <br>{{ auth()->user()->descripcion_puesto }}
            </p>
        </h3>
    </div>
    <div class="md:m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Turno:</span><br> {{ auth()->user()->turno }}</p>
        </h3>
    </div>
    <div class="md:m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Coordinación:</span><br> {{ auth()->user()->coordinacion }}</p>
        </h3>
    </div>
    <div class="md:m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Área:</span><br> {{ auth()->user()->area }}</p>
        </h3>
    </div>
    <div class="md:m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Función:</span><br> {{ auth()->user()->funcion }}</p>
        </h3>
    </div>
    <div class="md:m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200 w-full">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Status actual:</span><br> {{ auth()->user()->status }}</p>
        </h3>
    </div>
</div>