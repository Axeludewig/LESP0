<x-layout>
    <a href="/admin/showallcursos" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="m-4 mb-80">
        
    <x-card>
        <div class="flex justify-center">
            <img class="hidden object-contain w-48 mr-6 md:block"
                src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/SS1.png') }}"
                alt="" />
            <div>
                <h3 class="text-2xl">
                    <a href="/admin/details/{{ $listing->id }}">{{ $listing->nombre }}</a>
                </h3>
                <div class="mt-3 text-xl font-bold mb-4">Inicia: {{ $listing->fecha_de_inicio }}</div>
                <div class="text-xl font-bold mb-4">Termina: {{ $listing->fecha_de_terminacion }}</div>
                    <div class="font-semibold text-xl">
                        @if($listing->status == 'Disponible')
                            <div class="animate-pulse">
                            <p class="text-green-600">Status: {{$listing->status}}</p>
                            </div>
                        @endif
                        @if($listing->status == 'En proceso')
                            <p class="text-yellow-600 animate-pulse">Status: {{$listing->status}}</p>
                        @endif
                        @if($listing->status == 'Finalizado')
                            <p class="text-red-600 animate-pulse">Status: {{$listing->status}}</p>
                        @endif                    
                    </div>
    
                    <div class="m-4">
                        @php
                            $participantes = DB::table('participantes')->where('id_curso', $listing->id)->get();
                            $cuenta = $participantes->count();
                        @endphp
    
    
    <div class="m-4">
        <div>
            <span class="font-semibold cursor-pointer" onclick="toggleList({{ $listing->id }})">Participantes: {{ $cuenta }}</span>
            @if($cuenta > 0)
            <button class="m-2 py-2 px-4 rounded bg-laravel text-white hover:bg-black show-participants bg-laravel"  onclick="toggleList({{ $listing->id }})">
                Mostrar <i class="fa-solid fa-plus"></i>
            </button>
            @endif

            <button  data-modal-target="popup-modal1" data-modal-toggle="popup-modal1" type="button" class="m-2 py-2 px-4 rounded bg-laravel text-white hover:bg-black show-participants bg-laravel">
                Agregar <i class="fa-solid fa-plus"></i>
            </button>
            <div id="popup-modal1" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal1">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            @php
                            $allusers = DB::table('users')->orderBy('nombre')->get();
                            @endphp
                            <form action="/admin/adduser" method="POST" id="form">
                                @csrf
                            <select id="nombre_del_responsable" name="nombre_del_responsable" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="">Seleccionar usuario</option>
                                @foreach($allusers as $user)
                                  <option value="{{ $user->id }}" {{ old('nombre_del_responsable') == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                                @endforeach
                              </select>
                              <input type="hidden" name="id_curso" value="{{ $listing->id }}"/>
                              <button id="add-participant-btn" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 mb-6 mt-6">
                                Agregar usuario
                              </button>
                            
                              <!-- Element to display added users -->
                              <div id="added-users-container"></div>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400 mt-6">¿Estás seguro que deseas agregar el/los participante(s)?</h3>
                            <button data-modal-hide="popup-modal1" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2 mb-4" id="submitter">
                                Sí, estoy seguro
                            </button>
                            </form>


                            <button data-modal-hide="popup-modal1" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="max-h-[525px] w-[750px] overflow-y-auto hidden p-2 " id="participantesList{{ $listing->id }}">   
                <ul>
                    <div class="">
                    @php $num = 1; @endphp
                    @foreach ($participantes as $participante)
                        <li>{{$num . " - "}}{{ $participante->nombre_participante }} &nbsp; <form method="POST" action="/admin/destroyparticipante/{{$participante->id}}">
                            <div class="mb-2">
                                @csrf
                                @method('DELETE')
                                <button  data-modal-target="popup-modal2" data-modal-toggle="popup-modal2" type="button"  class="text-red-500"><i class="fa-solid fa-trash"></i> Eliminar</button>
                            </div>
            
                            <div id="popup-modal2" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal2">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas eliminar el participante?</h3>
                                            <button data-modal-hide="popup-modal2" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Sí, estoy seguro
                                            </button>
                                            <button data-modal-hide="popup-modal2" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form></li> 
                    @php $num++ @endphp
                    @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
    
    <script>
        function toggleList(id) {
            var participantesList = document.getElementById("participantesList" + id);
            if (participantesList.style.display !== "block") {
                participantesList.style.display = "block";
            } else {
                participantesList.style.display = "none";
            }
        }
    </script>
    
    
                    </div>
                <div class="text-lg mt-4">
                    @if($listing->auditorio !== 'Virtual')
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->auditorio }}
                    @endif
                    @if($listing->auditorio == 'Virtual')
                    <i class="fa-solid fa-signal"></i> {{ $listing->auditorio }}
                    @endif
                </div>
                @if (auth()->user()->es_admin == '1' && $listing->status == 'En proceso')
                <form method="POST" action="/listingsfinal/{{ $listing->id }}" enctype="multipart/form-data" >
                    @csrf
                                @method('PUT')
                                {{ csrf_field() }}
                                {{ method_field('put') }}
    
                                @php
                                    $valor_curricular = $listing->horas_teoricas + $listing->horas_practicas;
                                @endphp
                                
                                <input type="hidden" name="id_curso" value="{{ $listing->id}}">
                                
                                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="nombre_curso"
                                    hidden="true" value="{{ $listing->nombre }}" />
    
                                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="id_curso" hidden="true"
                                    value="{{ $listing->id }}" />
    
                                <input type="text" name="valor_curricular" hidden="true" value="{{ $valor_curricular }}" />
    
                                <input type="text" name="status" hidden="true" value="Verificado" />
    
                                <input type="text" name="tipo" hidden="true" value="Asistente" />

                                <input type="text" hidden name="fecha_de_registro" value="{{$listing->fecha_de_terminacion}}" />
    
                                @php $currentYear = now()->format('Y'); @endphp
                                <input type="text" name="folio" hidden="true"
                                    value="B2A{{$currentYear}}C{{ $listing->numero_consecutivo }}F" />

                                    
    
                                <input type="hidden" name="_method" value="PUT">
                                <div class=" mb-4 text-lg mt-4 flex place-content-center">
                                    <label for="status" class="inline-block text-lg mb-2">
                                    </label>
                                    <input type="password" class="border border-gray-200 rounded p-2 w-full"
                                        name="status" value="Finalizado" hidden="true" />
                                        <button  data-modal-target="popup-modal4" data-modal-toggle="popup-modal4" type="button"  class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                                            Finalizar Curso <i class="fa-solid fa-heart-circle-check"></i>
                                        </button>
                                </div>
                    <div id="popup-modal4" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal4">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas finalizar el curso? Los participantes podrán descargar constancias. No hay vuelta atrás para esta acción.</h3>
                                    <button data-modal-hide="popup-modal4" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Sí, estoy seguro
                                    </button>
                                    <button data-modal-hide="popup-modal4" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @elseif (auth()->user()->es_admin == '1' && $listing->status == 'Disponible')
                <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="mt-4 mb-4 text-lg flex place-content-center">
                        <label for="status" class="inline-block text-lg mb-2">
                        </label>
                        <input type="password" class="border border-gray-200 rounded p-2 w-full"
                            name="status" value="En proceso" hidden="true" />
                        <button  data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                            Iniciar Curso <i class="fa-solid fa-heart-circle-bolt"></i>
                        </button>
                    </div>
                
      
                    <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas iniciar el curso? Nadie más podrá registrarse.</h3>
                                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Sí, estoy seguro
                                    </button>
                                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
      
                </form>
            @endif
    
                <form method="POST" action="/listings/{{ $listing->id }}">
                    <div class="text-lg mt-4 flex place-content-center">
                        @csrf
                        @method('DELETE')
                        <button  data-modal-target="popup-modal5" data-modal-toggle="popup-modal5" type="button"  class="text-red-500"><i class="fa-solid fa-trash"></i> Eliminar</button>
                    </div>
    
                    <div id="popup-modal5" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal5">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Estás seguro que deseas eliminar el curso?</h3>
                                    <button data-modal-hide="popup-modal5" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Sí, estoy seguro
                                    </button>
                                    <button data-modal-hide="popup-modal5" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </x-card>
    </div>
    <script>
     $(document).ready(function() {
  $('#add-participant-btn').click(function(e) {
    e.preventDefault(); // Prevent the default form submission behavior

    var selectElement = $('#nombre_del_responsable');
    var selectedOption = selectElement.find('option:selected');

    if (!selectedOption.val()) return;

    var userId = selectedOption.val();
    var userName = selectedOption.text();

    var userElement = $('<div class="user-item"></div>');

    var userNameElement = $('<span></span>').text(userName);

    var removeButton = $('<button></button>')
      .text('Remove')
      .addClass('remove-button text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2')
      .click(function() {
        userElement.remove();
      });

    userElement.append(userNameElement);
    userElement.append('<br>');
    userElement.append(removeButton);

    // Append the user item to the container
    $('#added-users-container').append(userElement);

    // Create a hidden input field to hold the user's ID
    var hiddenInput = $('<input type="hidden">')
   .attr('name', 'nombre_del_responsable[]') // Update the name attribute
   .val(userId);


    // Append the hidden input field to the form
    $('form').append(hiddenInput);

    // Clear the select element
    selectElement.val('');
  });
});

$(document).ready(function() {
  $('#form').submit(function(e) {
    var addedUsersContainer = $('#added-users-container');
    if (addedUsersContainer.is(':empty')) {
      e.preventDefault(); // Prevent form submission

      toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

      // Display an alert or perform any other action
      toastr["warning"]("Agregar al menos un usuario a la lista.", "Error");


      // You can also focus on the added users container to highlight it
      addedUsersContainer.focus();
    }
  });
});


    </script>
</x-layout>