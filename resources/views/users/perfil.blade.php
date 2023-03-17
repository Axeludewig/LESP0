<x-layout>
    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-3xl ">
            <p>Mi Perfil</p>
        </h3>
    </div>

    <div>
        <!-- DIV PARA LA FOTO Y LA INFORMACIÓN DEL PERFIL -->
        <form action="/profilepic/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-center justify-center">
                <div class="w-64 h-64 border-2 border-gray-400 bg-gray-100 rounded-full overflow-hidden">
                    <img id="picture-box"
                        src="{{ auth()->user()->profile_pic ? asset('storage/' . auth()->user()->profile_pic) : asset('/images/no-image.png') }}"
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
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Nombre:</span><br> {{ auth()->user()->nombre }}
                    {{ auth()->user()->apellido_paterno }}
                    {{ auth()->user()->apellido_materno }}</p>
            </h3>
        </div>
        <div
            class="m-6 flex flex-wrap break-all bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Correo:</span><br> {{ auth()->user()->email }}</p>
            </h3>
        </div>
        <div
            class="m-6 break-words flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Descripción del puesto:</span>
                    <br>{{ auth()->user()->descripcion_puesto }}
                </p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Turno:</span><br> {{ auth()->user()->turno }}</p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Coordinación:</span><br> {{ auth()->user()->coordinacion }}</p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Área:</span><br> {{ auth()->user()->area }}</p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Función:</span><br> {{ auth()->user()->funcion }}</p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Status actual:</span><br> {{ auth()->user()->status }}</p>
            </h3>
        </div>
        <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
            <h3 class="text-2xl text-center">
                <p><span class="font-semibold">Perfil del puesto:</span><br></p>
            </h3>
        </div>

        <div class="flex place-content-center text-xl">
            <button type="submit"
                class="bg-red-600 font-semibold text-white rounded py-2 px-4 hover:bg-white hover:text-black hover:ring">
                Editar información
            </button>
        </div>
    </div>
    <!-- DIV PARA ACCIONES DEL USUARIO -->


    <div
        class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-3xl ">
            <p>Cursos</p>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/listings/manage"> Mis Cursos <i class="fa-sharp fa-solid fa-list"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/sesiones/show"> Sesiones <i class="fa-sharp fa-solid fa-forward"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/sesiones/misasistencias"> Mis Asistencias <i class="fa-sharp fa-solid fa-marker"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/cursos/misfinalizados"> Cursos Finalizados <i class="fa-sharp fa-solid fa-medal"></i></a>
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center hover:bg-gray-200">
        <h3 class="text-2xl">
            <a href="/users/expediente"> Expediente <i class="fa-regular fa-file"></i></a>
        </h3>
    </div>


</x-layout>
