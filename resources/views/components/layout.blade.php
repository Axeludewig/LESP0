<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        mich1: '#691649',
                        mich2: '#166936',
                        mich3: '#a22270',
                        mich4: '#A5D9B9',
                        mich5: '#6C095A',
                        laravel: '#6C095A',
                    },
                },
            },
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: Montserrat;
        }

        #title {
            font-family: Lato;
        }

        a {
            font-family: Poppins;
        }

        h5 {
            font-family: Poppins;
        }
    </style>

    <title>LESP MICH | Sistema de Enseñanza</title>
</head>

<body class="mb-48" style="margin: 0; padding: 0;">

    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded  w-full">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="/" class="flex items-center">
                <img src="{{ asset('images/logolesp.png') }}" class="h-16 mr-3 sm:h-9 md:h-28" alt="LESP Logo" />
                <span class="self-center text-xl md:text-4xl font-semibold whitespace-nowrap hover:scale-110">LESP
                    Michoacán</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 "
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">
                    @auth

                        @if (auth()->user()->es_admin == '1')
                            {{-- 1 PARA ADMIN, 0 PARA USUARIO --}}
                            {{-- DENTRO DE ESTE IF ESTÁ LA LÓGICA DEL ADMIN --}}
                            <li>
                                <span
                                    class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                    <i class="fa-sharp fa-solid fa-lock"></i> ADMIN
                                </span>
                            </li>
                            <li>
                                <a href="/bitacora" class="md:text-2xl hover:text-laravel">
                                    <span
                                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                        <i class="fa-solid fa-rectangle-list"></i> Bitácora</span></a>
                            </li>
                            <li>
                                <a href="/admin/paneldecontrol" class="hover:text-laravel">
                                    <span
                                        class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                        <i class="fa-sharp fa-solid fa-key"></i>
                                        Control</span></a>
                            </li>
                            <li class="">
                                <span
                                    class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 hover:scale-125">
                                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                                        Registro</span></a>
                            </li>
                            <li>
                                <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">
                                        <span
                                            class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0  hover:scale-125">
                                            <i class="fa-solid fa-door-closed"></i> Salir</span>
                                    </button>
                                </form>
                            </li>
                        @else
                            {{-- DENTRO DE ESTE ELSE ESTÁ LA LÓGICA DEL USUARIO --}}

                            <li>
                                <span
                                    class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0  hover:text-laravel">
                                    <i class="fa-sharp fa-solid fa-lock"></i> Bienvenido/a, {{ auth()->user()->nombre }}
                                </span>
                            </li>
                            <li>
                                <a href="/bitacora" class="md:text-2xl hover:text-laravel">
                                    <span
                                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                        <i class="fa-solid fa-rectangle-list"></i> Bitácora</span></a>
                            </li>
                            <li>
                                <a href="/users/perfil" class="md:text-2xl hover:text-laravel">
                                    <span
                                        class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                        <i class="fa-solid fa-gear"></i> Mi
                                        perfil</span></a>
                            </li>

                            <li>
                                <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="md:text-2xl">
                                        <span
                                            class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                            <i class="fa-solid fa-door-closed "></i> Cerrar Sesión</span>
                                    </button>
                                </form>
                            </li>
                        @endif
                    @else
                        {{-- DENTRO DE ESTE ELSE ESTÁ LA LÓGICA DEL USUARIO NO AUTENTICADO 
                <li class="">
                    <span class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0  hover:scale-125">
                    <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Registro</span></a>
                </li> --}}
                        <li>
                            <a href="/bitacora" class="md:text-2xl hover:text-laravel">
                                <span
                                    class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-laravel md:p-0 hover:scale-125">
                                    <i class="fa-solid fa-rectangle-list"></i> Bitácora</span></a>
                        </li>
                        <li>
                            <span
                                class=" md:text-2xl block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0   hover:scale-125">
                                <a href="/login" class="hover:text-laravel">
                                    <i class="fa-solid fa-arrow-right-to-bracket hover:text-laravel"></i> Iniciar
                                    Sesión</span></a>
                        </li>


                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <main>
        {{ $slot }}
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <x-flash-message />
    <footer
        class="bottom-0 left-0 w-full flex flex-col items-center justify-start font-bold bg-mich4 text-black  opacity-90 md:justify-center h-[150px] p-24 mt-96 md:mt-[700px]">
        <p class="ml-2">&copy; <?php echo date('Y'); ?>, Laboratorio Estatal de Salud Pública de Michoacán. Todos los
            derechos
            reservados.</p>
        <a href="/privacidad" class="underline hover:scale-105 hover:text-blue-800">AVISO DE PRIVACIDAD</a>

    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>
