<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="images/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
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
    <script>
      $(document).ready(function() {
  // Set up event listener for "Add activity" button
  $('#add-activity-btn').click(function() {
    // Get the last activity fieldset (or the activities container if none exist)
    var lastActivityFieldset = $('#activities-container fieldset:last-child');
    if (lastActivityFieldset.length === 0) {
      lastActivityFieldset = $('#activities-container');
    }
    
    // Clone the last activity fieldset and clear its input values
    var newActivityFieldset = lastActivityFieldset.clone(true, true);
    newActivityFieldset.find('input, textarea').val('');
    
    // Add the new activity fieldset to the end of the activities container
    $('#activities-container').append(newActivityFieldset);
  });
});
  </script>
  <title>LESP MICH | Sistema de Enseñanza</title>
</head>

<body class="mb-48">
  <nav class="flex justify-between items-center mb-4">
    <a href="/"><img class="w-24" src="{{asset('images/logolesp.png')}}" alt="" class="logo" /></a>

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
            <a href="/admin/paneldecontrol" class="hover:text-laravel"><i class="fa-sharp fa-solid fa-key"></i> Control</a>
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
            <i class="fa-sharp fa-solid fa-lock"></i> Bienvenido/a, {{auth()->user()->nombre}}
            </span>
          </li>
          <li>
            <a href="/users/perfil" class="md:text-2xl hover:text-laravel"><i class="fa-solid fa-gear"></i> Mi perfil</a>
          </li>

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
            <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> Iniciar Sesión</a>
          </li>

      @endauth


    </ul>
  </nav>

  <main>
    {{$slot}}
  </main>
  <footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-mich4 text-black h-24 mt-24 opacity-90 md:justify-center">
    <p class="ml-2">&copy; 2023, Laboratorio Estatal de Salud Pública de Michoacán</p>

  </footer>

  <x-flash-message />
</body>

</html>