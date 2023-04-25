@props(['id_eval'])
<x-layout>
    
    @php
        $trucalif = DB::table('calificaciones')->where('id_evaluacion', $id_eval)->where('id_user', auth()->user()->id)->get();
    @endphp

    <a href="/users/showallevals" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    
        <div
            class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center">
            <h3 class="text-3xl ">
                <p>Evaluaciones en línea</p>
            </h3>
        </div>

        <div>

            <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')]">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                    <a href="/users/showallevals" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-black bg-green-100 rounded-full dark:bg-mich4">
                        <span class="text-xs bg-mich4 rounded-full text-black px-4 py-1.5 mr-3">Volver</span> <span class="text-sm font-medium">Ir a evaluaciones en línea.</span> 
                        <svg aria-hidden="true" class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    </a>
                    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Ya no tienes más oportunidades.</h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Has agotado tus oportunidades para esta evaluación en línea. <br> A continuación se muestran tus calificaciones. <br> <br>
                        @foreach ($trucalif as $calif)
                            <span class="font-semibold">Oportunidad: </span>{{$calif->oportunidad}}
                            <span class="font-semibold">Calificación: </span>{{$calif->calificacion}}<br>
                        @endforeach
                    </p>
                   
                </div>
                <div class="bg-gradient-to-b from-laravel to-transparent dark:from-laravel w-full h-full absolute top-0 left-0 z-0"></div>
            </section>
            
        </div>
</x-layout>