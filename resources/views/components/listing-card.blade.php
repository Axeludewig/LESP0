@props(['listing'])

<x-card>
    <div class="flex">
        @if($listing->img !== null)
        <img class="hidden object-contain w-24 md:w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/SS1.png') }}"
            alt="" />
        @endif
        @if($listing->img == null)
        <img class="hidden object-contain w-24 md:w-48 mr-6 md:block"
            src="/images/SS1.png"
            alt="" />
        @endif
        <div class="overflow-hidden">
            <h3 class="text-xl md:text-3xl truncate mb-3">
                <a href="/listings/{{ $listing->id }}"><span class="font-bold">{{ $listing->nombre }}</span></a>
            </h3>
            <div class="font-semibold md:text-xl">
                @if($listing->status == 'Disponible')
                    <p class="text-green-600 animate-pulse">Status: {{$listing->status}}</p>
                @endif
                @if($listing->status == 'En proceso')
                    <p class="text-yellow-600 animate-pulse">Status: {{$listing->status}}</p>
                @endif
                @if($listing->status == 'Finalizado')
                    <p class="text-red-600 animate-pulse">Status: {{$listing->status}}</p>
                @endif                    
            </div>
            @if($listing->img !== null)
            <img class="object-contain mr-6 p-4 sm:hidden"
                src="{{ $listing->img ? asset('storage/' . $listing->img) : 'images/no-image.png' }}"
                alt="" />
            @endif
            @if($listing->img == null)
            <img class="object-contain mr-6 p-4 sm:hidden"
            src="/images/SS1.png"
            alt="" />
            @endif
            
            <div class="mt-3 text-xl mb-4"><span class="font-bold">Inicia: </span>{{ $listing->fecha_de_inicio }}</div>
            <div class="text-xl mb-4"><span class="font-bold">Termina: </span>{{ $listing->fecha_de_terminacion }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                @if($listing->auditorio == 'Virtual')
                <p class="text-center animate-pulse text-green-600 text-2xl">CURSO VIRTUAL</p>
                @endif
                @if($listing->auditorio !== 'Virtual')
                    @if($listing->tipo == 'Presencial')
                    <p class="text-center animate-pulse text-violet-600 text-2xl">CURSO PRESENCIAL</p>
                    @endif
                    @if($listing->tipo == 'Actividad')
                    <p class="text-center animate-pulse text-violet-600 text-2xl">CURSO CON ACTIVIDAD</p>
                    @endif
                <span class="font-bold"> Auditorio:</span>
                {{ $listing->auditorio }} <i class="fa-solid fa-location-dot"></i>
                <div class="m-4">
                    @php
                        $participantes = DB::table('participantes')->where('id_curso', $listing->id)->get();
                        $cuenta = $participantes->count();
                    @endphp
                </div>


        <div class="m-4">
            <div class="mt-4">
                <span class="font-semibold">Participantes: {{ $cuenta }}</span>
            </div>
        <div>
        <div class="flex -space-x-4 max-w-full">
            @if ($participantes->count() < 4)
            @foreach ($participantes as $participante)
            @php
            $user = DB::table('users')->where('id', $participante->id_user)->first(); 
            if ($user){
                $pfp = $user->profile_pic; 
            }    
            @endphp
            @if ($pfp !== null)
            <img class="w-10 h-10 md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800" src="{{asset('storage/' . $pfp) }}" alt="Foto de perfil de {{$user->nombre_completo}}"> 
            @else
            <img class="w-10 h-10  md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800"  src="/prueba_pics_nombre/{{$participante->id}}" alt=""> 
            @endif
            @endforeach
            @else

            @php $count = 0; @endphp

            @foreach ($participantes as $participante)

            @php
            $user = DB::table('users')->where('id', $participante->id_user)->first(); if ($user){
                $pfp = $user->profile_pic; 
            }    
            @endphp

            @if ($pfp !== null && $count !== 3)
            <img class="w-10 h-10 md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800" src="{{asset('storage/' . $pfp) }}" alt="Foto de perfil de {{$user->nombre_completo}}"> 
            @php $count++; @endphp
            @endif

            @if ($pfp == null && $count !== 3)
            <img class="w-10 h-10  md:w-24 md:h-24 border-2 border-white rounded-full dark:border-gray-800" src="/prueba_pics_submit/{{$user->id}}" alt=""> 
            @php $count++; @endphp
            @endif

            @endforeach
            @if ($count = 4)
            <a class="flex items-center justify-center w-10 h-10  md:w-24 md:h-24 text-lg font-medium text-white bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800" href="#">+{{$cuenta-3}}</a>
            @endif

            
            @endif

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
                @endif
                
            </div>
            <h2 class="text-lg">
                <p><span class="font-bold">Modalidad a realizar:</span> {{ $listing->modalidad }}</p>
                <p><span class="font-bold">Tipo de capacitación:</span> {{ $listing->tipo }}</p>
                <p><span class="font-bold">Responsable del evento:</span> {{ $listing->nombre_del_responsable }}</p>
                <p><span class="font-bold">Personal al que va dirigido:</span> {{ $listing->dirigido }}</p>
                <p><span class="font-bold">Horas teóricas:</span> {{ $listing->horas_teoricas }}</p>
                <p><span class="font-bold">Horas prácticas:</span> {{ $listing->horas_practicas }}</p>
                <p><span class="font-bold">Objetivo general:</span> {{ $listing->objetivo_general }}</p>
                
            </h2>

        </div>
    </div>
    @if (!Auth::check() && $listing->tipo=='Presencial')
        <div class="flex place-content-center mt-6">
            <form method="POST" action="/registro/{{ $listing->id }}">
                @csrf
                <a href="/registro/{{ $listing->id }}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px]">Registro</a>
            </form>
        </div>
    @endif
    @if (auth()->check() && $listing->tipo == 'Presencial' && auth()->user()->es_admin=='0')
        @php    
            $registrado = DB::table('participantes')->where('id_curso', $listing->id)->where('id_user', auth()->user()->id)->first();
        @endphp    

        @if (!$registrado)
        <div class="flex place-content-center mt-6">
                @csrf
                <a href="/listings/{{ $listing->id }}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2  w-[215px]">Registro</a>
        </div>
        @endif
        @if ($registrado)
        <div class="flex place-content-center mt-6">
            <button class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">
                <p class="">Estás registrado.</p>
            </button>
        </div>
        @endif
    @endif
    @if (auth()->check() && $listing->tipo == 'Actividad' && auth()->user()->es_admin=='0')
        @php    
            $validado = DB::table('validaciones')->where('id_curso', $listing->id)->where('id_user', auth()->user()->id)->first();
        @endphp  
        @if ($validado == null)
        <div class="flex place-content-center mt-6">
                @csrf
                <a href="/listings/{{ $listing->id }}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2  w-[215px]">Registro</a>
        </div>
        @endif
        @if ($validado !== null)
        <div class="flex place-content-center mt-6">
                <button class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">Has aprobado este curso.</a>
        </div>
        @endif
    @endif
    @if (auth()->check() && $listing->tipo == 'Virtual' && auth()->user()->es_admin=='0')
        @php    
            $validado = DB::table('validaciones')->where('id_curso', $listing->id)->where('id_user', auth()->user()->id)->first();
        @endphp  
        @if ($validado !== null)
        <div class="flex place-content-center mt-6">
                <button class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">Has aprobado este curso.</a>
        </div>
        @endif
        @if ($validado == null)
        <div class="flex place-content-center mt-6">
                <a href="/users/xevalz/{{$listing->id}}"
                    class="text-black hover:text-white bg-mich4 border-2 border-laravel from-laravel to-mich4 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium    rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2 w-[215px] ">Ir a evaluación</a>
        </div>
        @endif
    @endif
</x-card>
