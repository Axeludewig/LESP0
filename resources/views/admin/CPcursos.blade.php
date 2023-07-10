<x-layout>
    <a href="/admin/paneldecontrol" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
        <h3 class="text-2xl ">
            <p>Panel de Control de Cursos</p>
        </h3>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center gap-4 mx-6">
        
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg   hover:scale-105 shadow-xl w-full">
            <a href="/admin/showallcursos">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Todos los cursos</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">Eliminar, modificar, consultar.</p>
            <a href="/admin/showallcursos" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                Cursos
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg    hover:scale-105 shadow-xl w-full">
            <a href="/admin/create">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Crear</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">Agregar un evento.</p>
            <a href="/admin/create" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300  ">
                Agregar
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        
        <!--
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg   hover:scale-105 shadow-xl w-full">
            <a href="/admin/sesiones">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Sesiones</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">Para cursos de múltiples sesiones.</p>
            <a href="/admin/sesiones" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                Validaciones
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        
    -->
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  hover:scale-105 shadow-xl w-full">
            <a href="/admin/cursosfinalizados">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Validaciones</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">Generar validaciones y constancias.</p>
            <a href="/admin/cursosfinalizados" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                Validaciones
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <!--
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/listings/create">Crear Nuevo Curso <i class="fa-sharp fa-solid fa-plus"></i></a>
        </h3>
    </div>
  
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/">Cursos Disponibles <i class="fa-sharp fa-solid fa-magnifying-glass"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/admin/cursosenproceso">Finalizar Curso <i class="fa-sharp fa-solid fa-check"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/admin/showallcursos">Eliminar Curso <i class="fa-sharp fa-solid fa-minus"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/admin/cursosfinalizados">Cursos Finalizados <i
                    class="fa-sharp fa-solid fa-flag-checkered"></i></a>
        </h3>
    </div>
-->
    </div>
    <div class="mt-6 flex flex-col md:flex-row items-center justify-center gap-4 mx-6 mb-40">
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg   hover:scale-105 shadow-xl w-full">
            <a href="/admin/cursosfinalizados">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 e">Calificaciones</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 ">Reprobados de cursos virtuales.</p>
            <a href="/admin/reprobados" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                Validaciones
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
        <!--
        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  hover:scale-105 shadow-xl w-full">
                <a href="/admin/cursosfinalizados">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Qrs</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 ">Códigos QR de registro.</p>
                <a href="/admin/qrs" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    QRs
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
        </div>-->

        <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  hover:scale-105 shadow-xl w-full">
                <a href="/admin/editbitacora">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Editar bitácora</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 ">Editar datos en la bitácora.</p>
                <a href="/admin/editbitacora" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    Editar
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
        </div>
    </div>
</x-layout>
