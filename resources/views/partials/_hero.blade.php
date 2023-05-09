<section class="relative h-80 bg-gradient-to-b from-laravel to-mich4 flex flex-col justify-center align-center text-center space-y-4 mb-4">

  <!--
  <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
    style="background-image: url('images/mich2.png')"></div>
  -->

  <div class="z-10">
    <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl" id="title">Laboratorio Estatal de Salud Pública</h1>
    <p class="mb-8 text-lg font-medium text-gray-200 lg:text-2xl sm:px-16 lg:px-48"> LESP MICH - Sistema de Enseñanza e Investigación</p>
    <!-- <h1 class="text-6xl font-bold uppercase text-black" id="title">
      LESP<span class="">MICH</span>
    </h1>
    <p class="text-2xl text-black font-bold my-4">
      Laboratorio Estatal de Salud Pública <br>
      Sistema de Enseñanza e Investigación
    </p> -->
    <div>
      @auth
      @else
      @endauth
    </div>
  </div>
</section>
