<x-layout>

    <a href="/users/showallevals" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    
        <div
            class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
            <h3 class="text-3xl ">
                <p>Email incorrecto</p>
            </h3>
        </div>

        <div>

            <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')] h-screen">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative " >
                  
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Debes actualizar tu correo para usar la página.</h1>
                    
                    <div>
                        <form action="/users/email2/{{auth()->user()->id}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-6 mt-6">
                                <label for="email" class="inline-block text-lg mb-2 text-white">Correo electrónico: </label>
                                <input type="text"
                                    class="shadow appearance-none leading-tight focus:outline-none focus:ring focus:border-mich5 border border-gray-200 rounded p-2 w-1/2 hover:ring"
                                    name="email" value="{{ old('email') }}" />

                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="text-black bg-white font-semibold px-4 py-2 shadow border rounded-lg hover:scale-105 ">Actualizar</button>
                        </form>
                    </div>
                   
                </div>
                <div class="bg-gradient-to-b from-laravel to-transparent dark:from-laravel w-full h-full absolute top-0 left-0 z-0"></div>
            </section>
            
        </div>
</x-layout>