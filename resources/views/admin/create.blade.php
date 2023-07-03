<x-layout>
    <div class="flex items-center justify-center mx-auto mt-12">
        <div class="border w-3/4 rounded shadow-xl p-6">
            <form method="POST" action="/cursos/crear" enctype="multipart/form-data" id="physical-form">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre de la capacitación</label>
                        <input type="text" name="nombre" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="" value="{{old('nombre')}}">
                   
                        <input type="hidden" name="numero_consecutivo" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="" value="1" required="">

                        <label for="modalidad" class="block mb-2 text-sm font-medium text-gray-900 mt-4">Modalidad a realizar</label>
                        <select name="modalidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" onchange="toggleDivs()"> 
                            <option ></option>
                            <option >Congreso</option>
                            <option >Seminario</option>
                            <option >Diplomado</option>  
                            <option >Curso</option>
                            <option >Sesión</option>
                            <option >Taller</option>
                            <option >Curso-taller</option>
                        </select>
                        </div>
                    </div>


                        <div class="hidden gap-4 mt-4" id="presencial" disabled hidden>
                            <div class="hidden">
                            <input hidden type="hidden" name="numero_consecutivo" id="brand" class="" placeholder="" value="1" required="" />
                            </div>

                            <div>
                                <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900">Tipo de capacitación</label>
                                <select name="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"> 
                                    <option ></option>
                                    <option >Presencial</option>
                                    <option >Virtual</option>
                                    <option >Mixto</option>  
                                    <option >Actividad</option>
                                </select>
                            </div>


                        <div>
                            <label for="nombre_del_responsable" class="block mb-2 text-sm font-medium text-gray-900 ">Nombre del responsable</label>
                            @php
                            $allusers = DB::table('users')->orderBy('nombre')->get();
                            @endphp
                            <select id="nombre_del_responsable" name="nombre_del_responsable" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                                <option value="">Seleccionar responsable</option>
                                @foreach($allusers as $user)
                                    <option value="{{ $user->id }}" {{ old('nombre_del_responsable') == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                                @endforeach
                            </select>
                            @error('nombre_del_responsable')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="coordinacion" class="block mb-2 text-sm font-medium text-gray-900 ">Coordinación repsonsable</label>
                            <select name="coordinacion" id="coordinacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="12" required="" value="{{ old('coordinacion') }}"> 
                                <option value="todo-el-personal-de-la-unidad">Todo el personal de la unidad</option>
                                <option value="coordinacion-de-vigilancia-epidemiologica">Coordinación de Vigilancia Epidemiológica
                                </option>
                                <option value="coordinacion-de-vigilancia-contra-riesgos-sanitarios">Coordinación de Vigilancia
                                    Contra Riesgos Sanitarios</option>
                                <option value="coordinacion-de-biologia-molecular">Coordinación de Biologia Molecular</option>
                                <option value="coordinacion-de-cacu">Coordinación de CACU</option>
                                <option value="coordinacion-de-gestion-de-calidad">Coordinación de Gestión de Calidad</option>
                                <option value="coordinacion-administrativa">Coordinación Administrativa</option>
                                <option value="coordinacion-de-la-red-estatal-de-laboratorios">Coordinación de la Red Estatal de
                                    Laboratorios</option>
                                <option value="coordinacion-de-tecnologias-de-la-informacion">Coordinación de tecnologías de la
                                    información</option>
                                <option value="coordinacion-de-ensenanza-e-investigacion">Coordinación de Enseñanza e Investigación
                                </option>
                            </select>
                            @error('coordinacion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div>
                            <label for="dirigido" class="block mb-2 text-sm font-medium text-gray-900">Personal al que va dirigido</label>
                            <input required type="text" id="dirigido" name="dirigido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" value="{{ old('dirigido', 'Todo el personal') }}">
                            @error('dirigido')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="numero_de_asistentes" class="block mb-2 text-sm font-medium text-gray-900 ">No. de asistentes esperados</label>
                            <input type="number" name="numero_de_asistentes" id="numero_de_asistentes" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="" value="{{ old('numero_de_asistentes', '10') }}">
                            @error('numero_de_asistentes')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="horas_teoricas" class="block mb-2 text-sm font-medium text-gray-900 ">Horas teóricas:</label>
                            <input required type="number" id="horas_teoricas" name="horas_teoricas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('horas_teoricas', '2') }}">
                            @error('horas_teoricas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="horas_practicas" class="block mb-2 text-sm font-medium text-gray-900 ">Horas prácticas:</label>
                            <input required type="number" id="horas_practicas" name="horas_practicas"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ old('horas_practicas', '2') }}">
                            @error('horas_practicas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="">
                            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 ">Categoría:</label>
                            <select id="categoria" name="categoria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                value="{{ old('categoria') }}">
                                <option>Cursos técnicos del proceso analítico</option>
                                <option> Cursos del sistema de gestión integral (Calidad)</option>
                                <option>Cursos de Riesgo biológico (Bioseguridad) y gestión ambiental en laboratorios</option>
                                <option>Cursos de tecnologías de la información e informática</option>
                                <option>Cursos de enseñanza e investigación</option>
                                <option>Cursos relacionados con el cuidado de la salud</option>
                                <option>Cursos sobre Desarrollo Organizacional LESP MICHOACÁN</option>
            
                            </select>
                            @error('categoria')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="auditorio" class="block mb-2 text-sm font-medium text-gray-900 ">Lugar:</label>
                            <select name="auditorio"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 ">
                                <option>Auditorio</option>
                                <option>Sala de usos múltiples</option>
                                <option>Sala de juntas de la dirección</option>
                                <option>En el propio laboratorio</option>
                                <option>Otro</option>
                            </select>
                            @error('auditorio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="fecha_de_inicio" class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de inicio:</label>
                            <input type="date" id="fecha_de_inicio" name="fecha_de_inicio"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ date('Y-m-d') }}">
                            @error('fecha_de_inicio')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="">
                            <label for="fecha_de_terminacion"  class="block mb-2 text-sm font-medium text-gray-900 ">Fecha de término:</label>
                            <input type="date" id="fecha_de_terminacion" name="fecha_de_terminacion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="{{ date('Y-m-d') }}">
                            @error('fecha_de_terminacion')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                       

                        <div class="">
                            <label for="porcentaje_asistencia" class="block mb-2 text-sm font-medium text-gray-900 ">Porcentaje de asistencia
                                para acreditar:</label>
                                <select id="porcentaje_asistencia" name="porcentaje_asistencia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " value="{{ old('porcentaje_asistencia') }}">
                                    <option value="0" selected>NA</option>
                                    <option value="10">10%</option>
                                    <option value="20">20%</option>
                                    <option value="30">30%</option>
                                    <option value="40">40%</option>
                                    <option value="50">50%</option>
                                    <option value="60">60%</option>
                                    <option value="70">70%</option>
                                    <option value="80">80%</option>
                                    <option value="90">90%</option>
                                    <option value="100">100%</option>
                                </select>
                            @error('porcentaje_asistencia')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="">
                            <label for="calificacion_requerida"  class="block mb-2 text-sm font-medium text-gray-900 ">Calificación requerida:</label>
                            <select id="calificacion_requerida" name="calificacion_requerida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " value="{{ old('calificacion_requerida') }}">
                                <option value="0" selected>NA</option>
                                <option value="80">80%</option>
                                <option value="90">90%</option>
                                <option value="100">100%</option>
                            </select>
                            @error('calificacion_requerida')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        
                        <input type="text" id="age1" name="status" value="Disponible" hidden="true">
                        <div class="">
                            <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Palabras clave (Separadas por una coma)
                            </label>
                            <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " name="tags"
                                placeholder="Ejemplo: Calidad, Capacitación de Perfil, etc." value="{{ old('tags') }}" />
            
                            @error('tags')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="">
                            <label for="img" class="block mb-2 text-sm font-medium text-gray-900 ">
                                Imágen de portada
                            </label>
                            <input type="file" class="block  w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" name="img" />
            
                            @error('img')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input hidden type="text" value="Asistencia" id="forma_de_evaluacion" name="forma_de_evaluacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 hidden"/>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="objetivo_general" class="block mb-2 text-sm font-medium text-gray-900 ">Objetivo general de la capacitación</label>
                            <textarea required id="objetivo_general" name="objetivo_general" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Tu descripción aquí"></textarea>
                        </div>
                    </div>
                        <div id="activity-container" class="mt-4 border shadow-lg p-4 rounded-lg">
                            <div class="table-container">
                                <table id="temas-table" class="mb-4 text-sm border-2 rounded-xl">
                                    <th>No.</th>
                                    <th>Fecha y hora</th>
                                    <th>Contenio temático</th>
                                    <th>Objetivos específicos</th>
                                    <th>Técnica didáctica</th>
                                    <th>Responsable o ponente</th>
                                    <th>Horas teóricas</th>
                                    <th>Horas prácticas</th>
                                    <th>Referencia bibliográfica</th>
                                    <th>Acción</th>
                                </table>
                            </div>
                            <div class="activity-row grid grid-cols-2 gap-4">
                                <div>
                                    <label for="fechayhoras" class="block mb-2 text-sm font-medium text-gray-900">Fecha y hora.</label>
                                    <input type="datetime-local" id="fechayhorainput" name="fechayhoras"  placeholder="Date and Time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" value="{{ now()->format('Y-m-d\TH:i') }}">
                                </div>
                                <div> 
                                    <label for="contenidos" class="block mb-2 text-sm font-medium text-gray-900">Contenido temático.</label>
                                    <textarea name="contenidos"  placeholder="Content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="contenidoinput"></textarea>
                                </div>
                                <div>
                                    <label for="objetivos" class="block mb-2 text-sm font-medium text-gray-900">Objetivos específicos.</label>
                                    <textarea name="objetivos"  placeholder="Objectives" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="objetivosinput"></textarea>
                                </div>
                                <div>
                                    <label for="tecnicas" class="block mb-2 text-sm font-medium text-gray-900">Técnica didáctica</label>
                                    <input type="text" name="tecnicas"  placeholder="Technique" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="tecnicasinput">
                                </div>
                                <div>
                                    <label for="ponente" class="block mb-2 text-sm font-medium text-gray-900">Responsable o Ponente.</label>
                                    @php
                                    $allusers = DB::table('users')->orderBy('nombre')->get();
                                    @endphp
                                    <select id="ponente" name="ponente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="ponenteinput" >
                                        <option value="">Seleccionar responsable</option>
                                        @foreach($allusers as $user)
                                            <option value="{{ $user->id }}" {{ old('nombre_del_responsable') == $user->id ? 'selected' : '' }}>{{ $user->nombre_completo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="teoricas" class="block mb-2 text-sm font-medium text-gray-900">Horas teóricas.</label>
                                        <input type="number" name="teoricas"  placeholder="Theoretical Hours" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="teoricasinput">
                                    </div>
                                    <div>
                                        <label for="practicas" class="block mb-2 text-sm font-medium text-gray-900">Horas prácticas.</label>
                                        <input type="number" name="practicas"  placeholder="Practical Hours" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="practicasinput">
                                    </div>
                                </div>
                                <div>
                                    <label for="referencias" class="block mb-2 text-sm font-medium text-gray-900">Referencia Bigliográfica / GPC / NOM</label>
                                    <input type="text" name="referencias"  placeholder="Reference" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" id="referenciasinput">
                                </div>

                                
                            </div>
                            
                            <button type="button" id="add-activity-btn" class="py-2.5 px-5 bg-laravel text-white rounded-lg mt-4">Agregar tema</button>
                        </div>
                    
    
                        
                   
                    <div>
                        <input hidden type="text" value="No" id="evaluacion_adquirida" name="evaluacion_adquirida" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 hidden"/>
                    </div>
                    <div>
                    <button type="submit" class="inline-flex self-center px-5 py-2.5 mt-4 sm:mt-6 md:-mb-24 text-center text-white bg-laravel rounded-lg focus:ring-4 focus:ring-primary-200 hover:bg-primary-800 " onclick="submitForm()">
                        Crear curso
                    </button>
                    </div>
                </div>

                        <div class="" id="enlinea" disabled hidden>
                            En linea inputs
                        </div>
                        <div class="" id="actividad" disabled hidden>
                            Actividad inputs
                        </div>
                        <div class="" id="sesion" disabled hidden>
                            Sesion inputs
                        </div>
                    
            </form>
        
    </div>

    <script>
        function toggleDivs() {
            var selectElement = document.getElementsByName("modalidad")[0];
            var selectedOption = selectElement.options[selectElement.selectedIndex].text;
            
            var presencialDiv = document.getElementById("presencial");
            var enlineaDiv = document.getElementById("enlinea");
            var actividadDiv = document.getElementById("actividad");
            var sesionDiv = document.getElementById("sesion");
    
            if (selectedOption === "Congreso" || selectedOption === "Seminario" || selectedOption === "Diplomado") {
                presencialDiv.style.display = "grid";
                enlineaDiv.style.display = "none";
                actividadDiv.style.display = "none";
                sesionDiv.style.display = "none";
            } else if (selectedOption === "Curso" || selectedOption === "Taller") {
                presencialDiv.style.display = "grid";
                enlineaDiv.style.display = "none";
                actividadDiv.style.display = "none";
                sesionDiv.style.display = "none";
            } else if (selectedOption === "Curso-taller") {
                presencialDiv.style.display = "grid";
                enlineaDiv.style.display = "none";
                actividadDiv.style.display = "none";
                sesionDiv.style.display = "none";
            } else if (selectedOption === "Sesión") {
                presencialDiv.style.display = "none";
                enlineaDiv.style.display = "none";
                actividadDiv.style.display = "none";
                sesionDiv.style.display = "grid";
            } else {
                presencialDiv.style.display = "none";
                enlineaDiv.style.display = "none";
                actividadDiv.style.display = "grid";
                sesionDiv.style.display = "none";
            }
        }
    </script>
    <script>
        // Initialize the tema counter
        let rowCount = 0; // Initialize row count
        const temasArray = [];
        function submitForm() {
            

  let temasArrayInput = document.getElementById("temas-array-input");
  temasArrayInput.value = temasArray;

  // Rest of your form submission code
}

function addTema() {

    let fechaYHoraInput = document.querySelector('input[name="fechayhoras"]');
    let contenidoInput = document.querySelector('textarea[name="contenidos"]');
    let objetivosInput = document.querySelector('textarea[name="objetivos"]');
    let tecnicasInput = document.querySelector('input[name="tecnicas"]');
    let ponenteInput = document.querySelector('select[name="ponente"]');
    let teoricasInput = document.querySelector('input[name="teoricas"]');
    let practicasInput = document.querySelector('input[name="practicas"]');
    let referenciasInput = document.querySelector('input[name="referencias"]');


  if (
    fechaYHoraInput.value.trim() === "" ||
    contenidoInput.value.trim() === "" ||
    objetivosInput.value.trim() === "" ||
    tecnicasInput.value.trim() === "" ||
    ponenteInput.value.trim() === "" ||
    teoricasInput.value.trim() === "" ||
    practicasInput.value.trim() === "" ||
    referenciasInput.value.trim() === ""
    // Add more validation conditions for other fields
  ) {
    // Display an error message or perform any other necessary action
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
      toastr["warning"]("Rellena todos los campos.", "Error");
    return; // Stop the function execution
  } else {

  // Get the input values
  let fechayhora = fechaYHoraInput.value;
  let contenido = contenidoInput.value;
  let objetivos = objetivosInput.value;
  let tecnica = tecnicasInput.value;
  let responsableSelect = ponenteInput;
  let responsable = responsableSelect.options[responsableSelect.selectedIndex].text;
  let horasTeoricas = teoricasInput.value;
  let horasPracticas = practicasInput.value;
  let referencia = referenciasInput.value;

 
  // Create a new table row element
  const table = document.getElementById("temas-table");
  const newRow = document.createElement("tr");

  // Create table cells for each input value
  const rowNumberCell = document.createElement("td");
rowNumberCell.classList.add("row-number"); // Add row-number class
rowNumberCell.textContent = ++rowCount; // Increment and set row number
newRow.appendChild(rowNumberCell);


  const fechayhoraCell = document.createElement("td");
  fechayhoraCell.textContent = fechayhora;
  newRow.appendChild(fechayhoraCell);

  const contenidoCell = document.createElement("td");
  contenidoCell.textContent = contenido;
  newRow.appendChild(contenidoCell);

  const objetivosCell = document.createElement("td");
  objetivosCell.textContent = objetivos;
  newRow.appendChild(objetivosCell);

  const tecnicaCell = document.createElement("td");
  tecnicaCell.textContent = tecnica;
  newRow.appendChild(tecnicaCell);

  const responsableCell = document.createElement("td");
  responsableCell.textContent = responsable;
  newRow.appendChild(responsableCell);

  const horasTeoricasCell = document.createElement("td");
  horasTeoricasCell.textContent = horasTeoricas;
  newRow.appendChild(horasTeoricasCell);

  const horasPracticasCell = document.createElement("td");
  horasPracticasCell.textContent = horasPracticas;
  newRow.appendChild(horasPracticasCell);

  const referenciaCell = document.createElement("td");
  referenciaCell.textContent = referencia;
  newRow.appendChild(referenciaCell);

  const removeButton = document.createElement("button");
  removeButton.textContent = "Eliminar";
  removeButton.classList.add("remove-button");
  removeButton.addEventListener("click", function () {
    table.removeChild(newRow);
    // Update the row numbers
    const rows = table.getElementsByTagName("tr");
  rowCount = 0; // Reset row count
  for (let i = 0; i < rows.length; i++) {
    const rowNumberCell = rows[i].querySelector(".row-number");
    if (rowNumberCell) {
      rowNumberCell.textContent = ++rowCount; // Update row number
    }
  }
  });

  // Create a table cell for the "Remove" button
  const removeButtonCell = document.createElement("td");
  removeButtonCell.appendChild(removeButton);
  newRow.appendChild(removeButtonCell);

  
  // Append the new row to the table
  table.appendChild(newRow);

  const rowData = {
  numero: rowCount,
  fechayhora: fechayhora,
  contenido: contenido,
  objetivos: objetivos,
  tecnica: tecnica,
  responsable: responsable,
  horasTeoricas: horasTeoricas,
  horasPracticas: horasPracticas,
  referencia: referencia
};
temasArray.push(rowData);
console.log(temasArray);


// Reset the form inputs
fechaYHoraInput.value = "";
contenidoInput.value = "";
objetivosInput.value = "";
tecnicasInput.value = "";
ponenteInput.value = "";
teoricasInput.value = "";
practicasInput.value = "";
referenciasInput.value = "";



}


}

// Get the "Add tema" button
const addButton = document.getElementById("add-activity-btn");

// Add event listener to the button
addButton.addEventListener("click", addTema);
    </script>
    <style>
.remove-button {
  background-color: #a61414;
  color: #ffffff;
  border: none;
  padding: 6px 12px;
  cursor: pointer;
  border-radius: 4px;
}

.remove-button:hover {
  background-color: #cc0000;
}

        #temas-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 4px;
}

#temas-table th,
#temas-table td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
  border-radius: 4px;
}
.table-container {
  border-radius: 4px;
  overflow: hidden; /* Ensure content within the container respects the rounded corners */
}

#temas-table th {
  background-color: #f2f2f2;
}

/* Optional: Highlight alternating rows */
#temas-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

/* Optional: Hover effect on rows */
#temas-table tr:hover {
  background-color: #e8e8e8;
}
        </style>
    
</x-layout>