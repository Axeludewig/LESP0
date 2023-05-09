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

        <div class="flex flex-col md:flex-row items-center justify-center gap-3">
        @if ($eval->pdf != null)
        <a target="_blank" href="{{asset('storage/' . $eval->pdf)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar material de apoyo</a>
        @endif
        @if ($eval->pdf2 != null)
        <a target="_blank" href="{{asset('storage/' . $eval->pdf2)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar material de apoyo</a>
        @endif
        @if ($eval->pdf3 != null)
        <a target="_blank" href="{{asset('storage/' . $eval->pdf3)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar material de apoyo</a>
        @endif
        @if ($eval->pdf4 != null)
        <a target="_blank" href="{{asset('storage/' . $eval->pdf4)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Descargar material de apoyo</a>
        @endif
        </div>

        <div class="flex items-center justify-center w-full h-auto max-w-full">
          <video id="myVideo" class="w-full h-auto max-w-full md:max-w-[1550px] border border-gray-200 rounded-2xl dark:border-gray-700 shadow-2xl" controls autoplay>
            <source src="{{asset('storage/' . $eval->video)}}" type="video/mp4">
          </video>
        </div>
        
        <div class="flex items-center justify-center text-center mt-4 mb-72">
          
          <div id="exam-section" class="disabled">
            <h2 class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Sección de preguntas:</h2>
            <p class="ml-2 text-xl font-semibold text-gray-900 dark:text-gray-300">Por favor mire el video completo para desbloquear esta sección.</p>
          </div>
        </div>
      <div id="exam-questions">
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

            <div class="flex justify-center max-w-full text-center mt-6">
              <div id="accordion-collapse" data-accordion="collapse">
                <h2 id="accordion-collapse-heading-1">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium  text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                    <span>{{$cuestionario->pregunta1}}</span>
                    <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q1" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta1_opcion1}}</label>
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q1" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta1_opcion2}}</label>
                  </div>
                </div>
                <h2 id="accordion-collapse-heading-2">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                    <span>{{$cuestionario->pregunta2}}</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                  <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q2" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta2_opcion1}}</label>
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q2" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta2_opcion2}}</label>

                  </div>
                </div>
                <h2 id="accordion-collapse-heading-3">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                    <span>{{$cuestionario->pregunta3}}</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                  <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q3" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta3_opcion1}}</label>
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q3" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta3_opcion2}}</label>
                    
                  </div>
                </div>
                <h2 id="accordion-collapse-heading-4">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
                    <span>{{$cuestionario->pregunta4}}</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                  <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q4" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta4_opcion1}}</label>
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q4" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta4_opcion2}}</label>
                  </div>
                </div>
                <h2 id="accordion-collapse-heading-5">
                  <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-5" aria-expanded="false" aria-controls="accordion-collapse-body-5">
                    <span>{{$cuestionario->pregunta5}}</span>
                    <svg data-accordion-icon class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </button>
                </h2>
                <div id="accordion-collapse-body-5" class="hidden" aria-labelledby="accordion-collapse-heading-5">
                  <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                    <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta5_opcion1}}</label>
                            <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta5_opcion2}}</label>
                </div>
              </div>
            </div>
            </div>
           
            <div class="flex flex-col gap-4 items-center mx-4"> <!--
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
              <label class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><input type="radio" name="q5" value="2" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> {{$cuestionario->pregunta5_opcion2}}</label> -->
              <input type="radio" name="q1" value="0" class="hidden" checked>
              <input type="radio" name="q2" value="0" class="hidden" checked>
              <input type="radio" name="q3" value="0" class="hidden" checked>
              <input type="radio" name="q4" value="0" class="hidden" checked>
              <input type="radio" name="q5" value="0" class="hidden" checked>
              <br><br>
              <button  data-modal-target="popup-modal3" data-modal-toggle="popup-modal3" type="button" class="text-white bg-laravel hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 rounded-full px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 md:w-48 text-xl font-semibold" id="submit-button">Enviar</button>
               
    </div>
<div id="popup-modal3" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative w-full max-w-md max-h-full">
<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal3">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Close modal</span>
    </button>
    <div class="p-6 text-center">
      <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas enviar las respuestas?</h3>
        <button data-modal-hide="popup-modal3" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Sí, estoy seguro
        </button>
        <button data-modal-hide="popup-modal3" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
    </div>
</div>
</div>
</div>
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