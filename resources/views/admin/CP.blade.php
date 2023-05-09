<x-layout>
    @if (auth()->user()->es_admin == '1')
        <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Home </a>
        <div class="m-4 flex bg-mich5 border border-gray-200 rounded p-6 place-content-center">
            <h3 class="text-2xl text-white">
                <p>Panel de Control del Administrador</p>
            </h3>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mx-6 mb-80">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/admin/paneldecursos">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Cursos <i class="fa-solid fa-landmark"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Presenciales, en línea, sesiones.</p>
                <a href="/admin/paneldecursos" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Cursos
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/admin/showallusers">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Usuarios <i class="fa-solid fa-user-doctor"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Buscar, agregar, editar, eliminar.</p>
                <a href="/admin/showallusers" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Usuarios
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <!--
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/admin/paneldecursos"> Administrar cursos <i class="fa-sharp fa-solid fa-hammer"></i></a>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl">
                <a href="/admin/cursosenlinea"> Cursos en línea <i class="fa-solid fa-signal p-2"></i></a>
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
    -->
</x-layout>
