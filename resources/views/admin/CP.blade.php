<x-layout>
    @if (auth()->user()->es_admin == '1')
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Home </a>
        <div class="m-4 flex bg-mich5 border border-gray-200 rounded p-6 place-content-center">
            <h3 class="text-2xl text-white">
                <p>Panel de Control del Administrador</p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/admin/paneldecursos"> Administrar cursos <i class="fa-sharp fa-solid fa-hammer"></i></a>
            </h3>
        </div>

        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/admin/showallusers"> Administrar usuarios <i class="fa-sharp fa-solid fa-users-gear"></i></a>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/admin/qrs"> QRs de registro <i class="fa-solid fa-qrcode"></i></a>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/admin/sesiones"> Sesiones <i class="fa-solid fa-house-medical"></i></a>
            </h3>
        </div>

        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/usuarios"> Importar usuarios <i class="fa-solid fa-cloud-arrow-up"></i></a>
            </h3>
        </div>
    @else
        <div class="m-4 flex bg-mich5 border border-gray-200 rounded p-6 place-content-center">
            <h3 class="text-2xl text-white">
                <p>No tienes autorización para entrar en esta página.</p>
            </h3>
        </div>
    @endif

</x-layout>
