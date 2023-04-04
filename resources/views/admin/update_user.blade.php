@props(['user'])
<x-layout>
    <a href="/admin/showallusers" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl ">
            <p>Editar la información de {{ $user->nombre }}&nbsp;{{ $user->apellido_paterno }}&nbsp;{{ $user->apellido_materno }}</p>
        </h3>
      </div>
    <x-card>
        <form method="POST" action="/admin/update_user/STORE/{{ $user->id }}">
            @csrf
            @method('PUT')
            <div class="mt-4 flex flex-col place-content-center items-center gap-5">
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">RFC: &nbsp;</h2>
                    <input value="{{ $user->rfc }}" class="border border-solid border-slate-700 rounded" name="rfc">
                </div>                
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Apellido paterno: &nbsp;</h2>
                    <input value="{{ $user->apellido_paterno }}" class="border border-solid border-slate-700 rounded" name="apellido_paterno">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Apellido materno: &nbsp;</h2>
                    <input value="{{ $user->apellido_materno }}" class="border border-solid border-slate-700 rounded" name="apellido_materno">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Nombre: &nbsp;</h2>
                    <input value="{{ $user->nombre }}" class="border border-solid border-slate-700 rounded" name="nombre">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Email: &nbsp;</h2>
                    <input value="{{ $user->email }}" class="border border-solid border-slate-700 rounded" name="email">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Proyecto: &nbsp;</h2>
                    <input value="{{ $user->proyecto }}" class="border border-solid border-slate-700 rounded" name="proyecto">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Puesto: &nbsp;</h2>
                    <input value="{{ $user->puesto }}" class="border border-solid border-slate-700 rounded" name="puesto">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Descripción del puesto: &nbsp;</h2>
                    <input value="{{ $user->descripcion_puesto }}" class="border border-solid border-slate-700 rounded" name="descripcion_puesto">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">CURP: &nbsp;</h2>
                    <input value="{{ $user->curp }}" class="border border-solid border-slate-700 rounded" name="curp">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Turno: &nbsp;</h2>
                    <input value="{{ $user->turno }}" class="border border-solid border-slate-700 rounded" name="turno">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Coordinación: &nbsp;</h2>
                    <input value="{{ $user->coordinacion }}" class="border border-solid border-slate-700 rounded" name="coordinacion">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Area: &nbsp;</h2>
                    <input value="{{ $user->area }}" class="border border-solid border-slate-700 rounded" name="area">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Función: &nbsp;</h2>
                    <input value="{{ $user->funcion }}" class="border border-solid border-slate-700 rounded" name="funcion">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Tipo: &nbsp;</h2>
                    <input value="{{ $user->tipo }}" class="border border-solid border-slate-700 rounded" name="tipo">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Status: &nbsp;</h2>
                    <input value="{{ $user->status }}" class="border border-solid border-slate-700 rounded" name="status">
                </div>
                <div class="flex flex-row">
                    <h2 class="font-semibold text-slate-800">Observaciones: &nbsp;</h2>
                    <input value="{{ $user->observaciones }}" class="border border-solid border-slate-700 rounded" name="observaciones">
                </div>
                <button type="submit" class="text-red-500 border border-solid border-red-500 pl-6 pr-6 pt-2 pb-2 hover:ring mt-6"><i class="fa-solid fa-trash"></i> Editar</button>
                
                </div>
                
        </form>
    </x-card>
    <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl ">
            <p>Editar la contraseña de {{ $user->nombre }}&nbsp;{{ $user->apellido_paterno }}&nbsp;{{ $user->apellido_materno }}</p>
        </h3>
      </div>
    <x-card>
        <div class="mt-4">
            <form method="POST" action="/admin/password/STORE/{{$user->id}}">
                <div class="flex flex-col place-content-center items-center gap-5">
                @csrf
                @method('PUT')
                <label for="new_password" class="font-semibold">Password Nuevo&nbsp;</label>
                <input type="password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>

                <label for="new_password_confirmation" class="font-semibold">Confirmar Password Nuevo&nbsp;</label>
                <input type="password" name="new_password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                
                <!-- BOTÓN DE CONFIRMACIÓN!! -->
                <button type="submit" class="text-red-500 border font-bold border-solid border-red-500 pl-6 pr-6 pt-2 pb-2 mt-6 hover:ring"><i class="fa-solid fa-key"></i> Cambiar contraseña</button>
            </form>
        </div>
    </x-card>
</x-layout>