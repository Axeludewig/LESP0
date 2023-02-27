<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        <img class="hidden object-contain w-48 mr-6 md:block"
        src="{{$listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png')}}" alt="" />
        <h3 class="text-2xl mb-2">
          {{$listing->nombre}}
        </h3>
        <div class="text-xl font-bold mb-4">{{$listing->company}}</div>

        <x-listing-tags :tagsCsv="$listing->tags" />

        <div class="text-lg my-4">
          <i class="fa-solid fa-location-dot"></i> {{$listing->ubicacion}}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
          <h3 class="text-3xl font-bold mb-4">Descripción del curso</h3>
          <div class="text-lg space-y-6">
            {{$listing->descripcion}}

            <a href="mailto:admin@gmail.com"
              class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                class="fa-solid fa-envelope"></i>
              Contactar al Administrador</a>

              <form method="POST" action="/listings" enctype="multipart/form-data">
                <div class="mb-6">
    
                  @csrf
                  <div class="mb-6">
                    <label for="nombre_curso" class="inline-block text-lg mb-2">
                      Capacitación: {{$listing->nombre}}
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="nombre_curso" 
                    rows="10"
                    value="{{$listing->nombre}}"
                    placeholder="{{$listing->nombre}}">
                    </input>
            
                    @error('nombre_curso')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="rfc_participante" class="inline-block text-lg mb-2">
                      RFC del participante: {{auth()->user()->rfc}}
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="rfc_participante" 
                    rows="10"
                    value="{{auth()->user()->rfc}}"
                    placeholder="{{auth()->user()->rfc}}">
                    </input>
            
                    @error('rfc_participante')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="nombre_participante" class="inline-block text-lg mb-2">
                      Nombre del participante: {{auth()->user()->nombre}}
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="nombre_participante" 
                    rows="10"
                    value="{{auth()->user()->nombre}}"
                    placeholder="{{auth()->user()->nombre}}">
                    </input>
            
                    @error('nombre_participante')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="ubicacion" class="inline-block text-lg mb-2">
                      Ubicación: {{$listing->ubicacion}}
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="ubicacion" 
                    rows="10"
                    value="{{$listing->ubicacion}}"
                    placeholder="{{$listing->ubicacion}}">
                    </input>
            
                    @error('ubicacion')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="fecha_de_inicio" class="inline-block text-lg mb-2">
                      Fecha de inicio: {{$listing->fecha_de_inicio}}.
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="fecha_de_inicio" 
                    rows="10"
                    value="{{$listing->fecha_de_inicio}}"
                    placeholder="{{$listing->fecha_de_inicio}}">
                    </input>
            
                    @error('fecha_de_inicio')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="fecha_de_terminacion" class="inline-block text-lg mb-2">
                      Fecha de terminación: {{$listing->fecha_de_terminacion}}.
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="fecha_de_terminacion" 
                    rows="10"
                    value="{{$listing->fecha_de_terminacion}}"
                    placeholder="{{$listing->fecha_de_terminacion}}">
                    </input>
            
                    @error('fecha_de_terminacion')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="valor_curricular" class="inline-block text-lg mb-2">
                      Valor curricular: {{$listing->valor_curricular}}
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="valor_curricular" 
                    rows="10"
                    value="{{$listing->valor_curricular}}"
                    placeholder="{{$listing->valor_curricular}}">
                    </input>
            
                    @error('valor_curricular')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="mb-6">
                    <label for="img" class="inline-block text-lg mb-2">
                    </label>
                    <input 
                    type="text" 
                    hidden="true"
                    contenteditable="false"
                    class="border border-gray-200 rounded p-2 w-full" name="img" 
                    rows="10"
                    value="{{$listing->img}}"
                    placeholder="{{$listing->img}}">
                    </input>
            
                    @error('img')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                  </div>

                  <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Registrarse
                  </button>
          
                  <a href="/" class="text-black ml-4"> Volver </a>
                </div>
              </form>
          </div>
        </div>
      </div>
    </x-card>
  </div>
</x-layout>