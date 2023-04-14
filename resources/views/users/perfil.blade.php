<x-layout>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
        <h3 class="text-3xl ">
            <p class="font-semibold">Mi Perfil</p>
        </h3>
    </div>

    <div>
        <!-- DIV PARA LA FOTO Y LA INFORMACIÓN DEL PERFIL -->
        <form action="/profilepic/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center justify-center">
                <div class="w-64 h-64 border-2 border-gray-400 bg-gray-100 rounded-full overflow-hidden">
                    <img id="picture-box"
                        src="{{ auth()->user()->profile_pic ? asset('storage/' . auth()->user()->profile_pic) : asset('/images/Default_pfp.svg.png') }}"
                        alt="Profile Picture" class="w-full h-full object-cover">
                </div>

                <div class="mt-4">
                    <label for="profile_pic" class="block font-medium text-gray-700">Subir Foto de Perfil</label>
                    <input id="profile_pic" type="file" name="profile_pic" class="mt-1">
                </div>
                <div class="mt-4">
                    <button type="submit" class="bg-mich5 text-white px-4 py-2 rounded font-medium">Guardar</button>
                </div>
            </div>
        </form>

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


        <div class="mt-12 md:grid md:grid-cols-2 md:grid-rows-2 gap-14 font-sans px-14 w-screen ">
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
        <div class="flex place-content-center text-xl text-center mt-6">
    <div class="md:m-6 flex flex-col items-center mt-4 place-content-center bg-gray-50 border border-gray-200 rounded p-6  hover:bg-gray-200 w-3/4">
        <h3 class="text-2xl text-center">
            <p><span class="font-semibold">Perfil del puesto:</span><br></p>
        </h3>
    </div>
        </div>
            <div>
                <form>
                <div class="flex place-content-center text-xl text-center mt-6">
                    <a href="/users/password"
                        class="bg-red-600 font-semibold text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring hover:scale-125 w-5/6 md:w-56">
                        Cambiar contraseña
                    </a>
                </div>
                </form>
            </div>

            <div>
                <form action="/users/email/{{auth()->user()->id}}" method="POST">
                    <div class="flex flex-col items-center mt-4 place-content-center text-xl text-center">
                    @csrf
                    @method('PUT')
                    <label for="email" class="ml-3 mr-3 font-semibold">Agregar o cambiar correo electrónico (email):</label>
            <input type="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-56 mt-2"></input>
                    
                        <button type="submit" class="bg-red-600 font-semibold text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring hover:scale-125 w-5/6 md:w-56 mt-4">Actualizar correo</button>
                    </div>
                </form>
            </div>
    </div>
    <!-- DIV PARA ACCIONES DEL USUARIO -->


    


</x-layout>
