<x-layout>
  <section class=" dark:bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 -mt-32">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
          <img src="{{ asset('images/logolesp.png')}}" class="h-16 mr-3 sm:h-9 md:h-28" alt="LESP Logo" />

            LESP Mich    
        </a>
        <div class="w-full bg-white rounded-lg shadow-xl dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Iniciar sesión en su cuenta
                </h1>
                <form class="space-y-4 md:space-y-6" method="POST" action="/users/authenticate">
                  @csrf
                    <div>
                        <label for="rfc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tu RFC</label>
                        <input type="text" name="rfc" id="rfc" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  placeholder="Inicia sesión con tu RFC y contraseña" required=""  value="{{old('rfc')}}">
                        @error('rfc')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" value="{{old('password')}}">
                        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
                    </div>
                   
                    <button type="submit" class="w-full text-white bg-laravel hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Iniciar sesión</button>
                    
                </form>
            </div>
        </div>
    </div>
  </section>

</x-layout>