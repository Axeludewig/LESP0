<x-layout>
    <style>
        #exam-questions {
          display: none;
        }
        </style>
        <div class="flex items-center justify-center">
          <video id="myVideo" controls>
            <source src="{{asset('/videos/lesp.mp4')}}" type="video/mp4">
          </video>
        </div>
        <div class="flex items-center justify-center text-center mt-4">
          <div id="exam-section" class="disabled">
            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Sección de preguntas:</h2>
            <p class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Por favor mire el video completo para desbloquear esta sección.</p>
          </div>
        </div>
      <div id="exam-questionsa ">
          <form id="exam-form" action="/users/eval/{{auth()->user()->id}}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="apellido_materno" value="{{auth()->user()->apellido_materno}}">
            <input type="hidden" name="apellido_paterno" value="{{auth()->user()->apellido_paterno}}">
            @php $currentDate = date('Y-m-d'); @endphp
            <input type="hidden" name="nombre_user" value="{{auth()->user()->nombre}}">
            <input type="hidden" name="fecha_de_terminacion" value="{{$currentDate}}">
            <input type="hidden" name="valor_curricular" value="4">
            <input type="hidden" name="nombre" value="Registro y evaluación de la capacitación manejo adecuado de Residuos Peligrosos Biológicos e Infecciosos (RPBI) de acuerdo a la &quot;NOM-087-ECOL-SSA1-2002&quot;">
            <div class="flex flex-col gap-4 items-center mx-4">
              <h3 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Preguntas de la evaluación</h3><br>
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">1.- ¿La norma oficial Mexicana NOM-087-ECOL-SSA1-2002 regula lo concerniente a los Residuos Peligros Biológico Infeccioso de manera obligatorio en todo el territorio Nacional?</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q1" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Verdadero</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q1" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Falso</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">2.- ¿Los residuos como la sangre, los cultivos, los patológicos, los no anatómicos y los punzocortantes son los cinco tipos de RPBI?</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q2" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Verdadero</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q2" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Falso</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">3.- ¿Cuando un tejido patológico se encuentra en formol es una excepción para considerarse RPBI?</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q3" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Verdadero</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q3" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Falso</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">4.- ¿La orina y el excremento son RPBI?</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q4" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Verdadero</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q4" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Falso</label>
          
              <p class="ml-2 text-lg font-semibold text-gray-900 dark:text-gray-300">5.- ¿Los establecimientos que generan de de 20 a 100 kilogramos al mes de RPBI son generadores NIVEL 3?</p>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Verdadero</label>
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> Falso</label>
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