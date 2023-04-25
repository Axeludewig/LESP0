@props(['eval'])
@props(['cuestionario'])
<x-layout>
  <a href="/users/showallevals" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
  </a>
    <style>
        #exam-questions {
          display: none;
        }
        </style>
         <div
         class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
         <h3 class="text-3xl ">
             <p class="font-semibold">{{$eval->nombre}}</p>
         </h3>
     </div>

        <div class="flex items-center justify-center">
        <a target="_blank" href="{{asset('storage/' . $eval->pdf)}}" class="p-2 rounded border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold ">Descargar material de apoyo</a>
        </div>

        <div class="flex items-center justify-center">
          <video id="myVideo" controls>
            <source src="{{asset('storage/' . $eval->video)}}" type="video/mp4">
          </video>
        </div>
        
        <div class="flex items-center justify-center text-center mt-4">
          
          <div id="exam-section" class="disabled">
            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Sección de preguntas:</h2>
            <p class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Por favor mire el video completo para desbloquear esta sección.</p>
          </div>
        </div>
      <div id="exam-questions ">
          <form id="exam-form" action="/users/xeval/{{$eval->id}}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="eval_id" value="{{$eval->id}}">
            <input type="hidden" name="apellido_materno" value="{{auth()->user()->apellido_materno}}">
            <input type="hidden" name="apellido_paterno" value="{{auth()->user()->apellido_paterno}}">
            @php $currentDate = date('Y-m-d'); @endphp
            <input type="hidden" name="nombre_user" value="{{auth()->user()->nombre}}">
            <input type="hidden" name="fecha_de_terminacion" value="{{$currentDate}}">
            <input type="hidden" name="valor_curricular" value="4">
            <input type="hidden" name="nombre" value="{{$eval->nombre}}">
            <div class="flex flex-col gap-4 items-center mx-4">
              <h3 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Preguntas de la evaluación</h3><br>
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">{{$cuestionario->pregunta1}}</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q1" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta1_opcion1}}</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q1" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta1_opcion2}}</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">{{$cuestionario->pregunta2}}</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q2" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta2_opcion1}}</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q2" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta2_opcion2}}</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">{{$cuestionario->pregunta3}}</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q3" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta3_opcion1}}</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q3" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta3_opcion2}}</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">{{$cuestionario->pregunta4}}</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q4" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta4_opcion1}}</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q4" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta4_opcion2}}</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">{{$cuestionario->pregunta5}}</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta5_opcion1}}</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta5_opcion2}}</label>
              <input type="radio" name="q1" value="0" class="hidden" checked>
              <input type="radio" name="q2" value="0" class="hidden" checked>
              <input type="radio" name="q3" value="0" class="hidden" checked>
              <input type="radio" name="q4" value="0" class="hidden" checked>
              <input type="radio" name="q5" value="0" class="hidden" checked>
              <br><br>
              <button type="submit" class="text-white bg-laravel hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 md:w-48" id="submit-button">Enviar</button>
            </div>
          </form>

          <div id="results-container"> </div>
      </div>
      
      <script>
      const videoPlayer = document.getElementById("myVideo");
      const examSection = document.getElementById("exam-section");
      const examQuestions = document.getElementById("exam-questions");
      
      videoPlayer.addEventListener("ended", function() {
        if (videoPlayer.currentTime == videoPlayer.duration) {
          examSection.classList.remove("disabled");
          examQuestions.style.display = "block";
          examSection.querySelector("p").style.display = "none";
          console.log("Exam section enabled.");
        }
      });

      ///////////////////
   
      </script>
</x-layout>