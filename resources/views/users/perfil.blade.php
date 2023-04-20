<x-layout>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
        <h3 class="text-3xl ">
            <p class="font-semibold">Perfil</p>
        </h3>
    </div>

    <div>
        <!-- DIV PARA LA FOTO Y LA INFORMACIÓN DEL PERFIL -->
        <form action="/profilepic/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center justify-center">
                <div class="w-64 h-64 border-2 border-gray-400 bg-gray-100 rounded-full overflow-hidden shadow-xl">
                    <img id="picture-box"
                        src="{{ auth()->user()->profile_pic ? asset('storage/' . auth()->user()->profile_pic) : asset('/images/Default_pfp.svg.png') }}"
                        alt="Profile Picture" class="w-full h-full object-cover ">
                </div>

                <div class="mt-4 text-center flex-col justify-center items-center">
                    <label for="profile_pic" class="block font-medium text-gray-700">Subir Foto de Perfil</label>
                    <input id="profile_pic" type="file" name="profile_pic" class="mt-1">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-mich5 text-white px-4 py-2 rounded font-medium">Guardar</button>
                </div>
            </div>
        </form>
        <div class="flex flex-col md:flex-row items-center justify-center gap-4 mx-6 mt-6 mb-6">
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/users/cursos">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Cursos <i class="fa-solid fa-landmark"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Finalizados, en proceso, expediente.</p>
                <a href="/users/cursos" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Cursos
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/users/showevals">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Evaluaciones en línea <i class="fa-solid fa-signal p-2"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ver las evaluaciones en línea.</p>
                <a href="/users/showevals" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Usuarios
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/users/info/{{auth()->user()->id}}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Información personal <i class="fa-solid fa-address-card p-2"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Dirección, teléfono, nacionalidad, etc.</p>
                <a href="/users/info/{{auth()->user()->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Usuarios
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/users/esco/{{auth()->user()->id}}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Escolaridad <i class="p-2 fa-solid fa-graduation-cap"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Posgrados, licenciatura, preparatoria.</p>
                <a href="/users/esco/{{auth()->user()->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Usuarios
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
            <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg  dark:bg-gray-800 dark:border-gray-700 hover:scale-105 shadow-xl w-full">
                <a href="/users/exp/{{auth()->user()->id}}">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Experiencia Profesional <i class="fa-solid fa-briefcase"></i></h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Últimos 4 puestos profesionales.</p>
                <a href="/users/exp/{{auth()->user()->id}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-laravel rounded-lg hover:bg-mich4  hover:text-black focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ir a Usuarios
                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
        <div class="flex flex-col items-center justify-center gap-4 mx-6 mt-6 mb-6">     
            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="hidden"></div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nombre:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->nombre }}  {{ auth()->user()->apellido_paterno }} {{ auth()->user()->apellido_materno }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Correo electrónico:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->email }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Descripción del puesto:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->descripcion_puesto }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Turno:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->turno }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Coordinación:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->coordinacion }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Área:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->area }}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Función:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->funcion }}</dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Status actual:</dt>
                    <dd class="text-lg font-semibold">{{ auth()->user()->status }}</dd>
                </div>
            </dl>
        </div>
<!--
        <div class="flex items-center place-content-center text-center align-center">
            <div class="justify-center w-1/2 md:grid md:grid-cols-2 md:grid-rows-2 gap-4 font-sans">
                <div class="mt-4 flex flex-col items-center  text-xl">
                    <a href="/users/cursos"
                    class="bg-red-600 font-semibold flex justify-center items-center  text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring hover:scale-125 w-5/6 md:w-56 md:h-20 ">
                    Mis Cursos &nbsp; <i class="fa-solid fa-landmark"></i>
                    </a>
                </div>
                <div class="mt-4 flex flex-col items-center  text-xl">
                    <a href="/users/showevals"
                    class="bg-red-600 font-semibold flex justify-center items-center  text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring hover:scale-125 w-5/6 md:w-56 md:h-20 ">
                    Evaluaciones en Línea&nbsp;<i class="fa-solid fa-signal p-2"></i>
                    </a>
                </div>
                <div class="mt-4 flex flex-col items-center text-center text-xl">
                    <a href="/users/info/{{auth()->user()->id}}"
                    class="bg-red-600 font-semibold text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring flex justify-center items-center hover:scale-125 w-5/6 md:w-56 md:h-20">
                    Información Personal&nbsp;<i class="fa-solid fa-address-card p-2"></i>
                    </a>
                </div>
                <div class="mt-4 flex flex-col items-center text-center justify-center text-xl">
                    <a href="/users/esco/{{auth()->user()->id}}"
                    class="bg-red-600 font-semibold text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring flex justify-center items-center hover:scale-125 w-5/6 md:w-56 md:h-20">
                    Escolaridad&nbsp;<i class="p-2 fa-solid fa-graduation-cap"></i>
                    </a>
                </div>
                <div class="mt-4 flex flex-col items-center text-center text-xl">
                    <a href="/users/exp/{{auth()->user()->id}}"
                    class="bg-red-600 font-semibold text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring flex justify-center items-center hover:scale-125 w-5/6 md:w-56 md:h-20">
                    Experiencia Profesional&nbsp;<i class="fa-solid fa-briefcase"></i>
                    </a>
                </div>
            </div>
        </div>
    -->

      <!--
        <div class="flex place-content-center text-xl text-center mt-6">
    <div class="md:m-6 flex flex-col items-center mt-4 place-content-center bg-gray-50 border border-gray-200 rounded p-6  hover:bg-gray-200 w-3/4">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Perfil del puesto:</span><br></p>
        </h3>
    </div>
        </div>
     -->
        <div class="border-2 p-8 w-full">
            <div>
                <form action="/users/email/{{auth()->user()->id}}" method="POST">
                    <div class="flex flex-col items-center mt-4 place-content-center text-xl text-center">
                        @csrf
                        @method('PUT')
                        <label for="email" class="ml-3 mr-3 font-semibold">Agregar o cambiar correo electrónico (email):</label>
                        <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-56 mt-2"></input>
                        
                        <button type="submit" class="bg-red-600 text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring hover:scale-125 w-5/6 md:w-56 mt-4">Actualizar correo</button>
                    </div>
                </form>
            </div>
            <div class="mt-4">
                <form>
                <div class="flex place-content-center text-xl text-center">
                    <a href="/users/password"
                        class="bg-red-600 text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring hover:scale-125 w-5/6 md:w-56">
                        Cambiar contraseña
                    </a>
                </div>
                </form>
            </div>
        </div>


    </div>
    <!-- DIV PARA ACCIONES DEL USUARIO -->


    


</x-layout>
