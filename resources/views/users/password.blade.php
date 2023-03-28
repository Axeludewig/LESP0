<x-layout>
    <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl ">
            <p>Cambiar contraseña</p>
        </h3>
      </div>
        <form method="POST" action="/users/password/STORE/{{auth()->user()->id}}">
            <div class="flex flex-col place-content-center items-center gap-5">
            @csrf
            @method('PUT')
            <label for="current_password" class="font-semibold">Password Actual&nbsp;</label>
            <input type="password" name="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>

            <label for="new_password" class="font-semibold">Password Nuevo&nbsp;</label>
            <input type="password" name="new_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>

            <label for="new_password_confirmation" class="font-semibold">Confirmar Password Nuevo&nbsp;</label>
            <input type="password" name="new_password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
            
            <!-- BOTÓN DE CONFIRMACIÓN!! -->
            <button type="submit" class="text-red-500 border font-bold border-solid border-red-500 pl-6 pr-6 pt-2 pb-2 mt-6 hover:ring"><i class="fa-solid fa-key"></i> Cambiar contraseña</button>
        </form>
    </div>
</x-layout>