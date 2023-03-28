<nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src="{{ asset('images/logolesp.png') }}" alt=""
            class="logo" /></a>

    <ul class="flex place-content-evenly space-x-3 md:space-x-12 mr-6 md:text-lg">


        @auth

            @if (auth()->user()->es_admin == '1')
                {{-- 1 PARA ADMIN, 0 PARA USUARIO --}}
                {{-- DENTRO DE ESTE IF ESTÁ LA LÓGICA DEL ADMIN --}}
                <li>
                    <span class="text-sm font-bold uppercase">
                        <i class="fa-sharp fa-solid fa-lock"></i> ADMIN
                    </span>
                </li>
                <li>
                    <a href="/admin/paneldecontrol" class="hover:text-laravel"><i class="fa-sharp fa-solid fa-key"></i>
                        Control</a>
                </li>

                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Salir
                        </button>
                    </form>
                </li>
            @else
                {{-- DENTRO DE ESTE ELSE ESTÁ LA LÓGICA DEL USUARIO --}}
                <li>
                    <span class="text-sm md:text-2xl">
                        <i class="fa-sharp fa-solid fa-lock"></i> Bienvenido/a, {{ auth()->user()->nombre }}
                    </span>
                </li>
                <li>
                    <a href="/users/perfil" class="md:text-2xl hover:text-laravel"><i class="fa-solid fa-gear"></i> Mi
                        perfil</a>
                </li>

                <li>
                <form class="inline" method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="md:text-2xl">
                        <i class="fa-solid fa-door-closed "></i> Cerrar Sesión
                    </button>
                </form>
                </li>
            @endif
        @else
            {{-- DENTRO DE ESTE ELSE ESTÁ LA LÓGICA DEL USUARIO NO AUTENTICADO --}}
            <li class="">
                <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Registro</a>
            </li>
            <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar
                    Sesión</a>
            </li>

        @endauth


    </ul>
</nav>