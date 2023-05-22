@props(['listing'])

<x-card>
    <div class="flex">
        @if($listing->img !== null)
        <img class="hidden object-contain w-24 md:w-48 mr-6 md:block"
            src="{{ $listing->img ? asset('storage/' . $listing->img) : asset('/images/no-image.png') }}"
            alt="" />
        @endif
        @if($listing->img == null)
        <img class="hidden object-contain w-24 md:w-48 mr-6 md:block"
            src="/images/SS1.png"
            alt="" />
        @endif
        <div class="overflow-hidden">
            <h3 class="text-xl md:text-3xl truncate mb-3">
                <a href="/users/actividades/{{$listing->id}}"><span class="font-bold">{{ $listing->nombre }}</span></a>
            </h3>
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
                    @if($listing->tipo == 'Actividad')
                    <p class="text-center animate-pulse text-violet-600 text-2xl">CURSO CON ACTIVIDAD</p>
                    @endif
                <div class="m-4">
                    @php
                        $participantes = DB::table('participantes')->where('id_curso', $listing->id)->get();
                        $cuenta = $participantes->count();
                    @endphp
                </div>


        <div class="m-4">
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
            <div class="mt-4">
            <span class="font-semibold">Participantes: {{ $cuenta }}</span>
            </div>
        </div>
    </div>

                @endif
            </div>
            <h2 class="text-lg">
                <p><span class="font-bold">Responsable del evento:</span> {{ $listing->nombre_del_responsable }}</p>
                <p><span class="font-bold">Personal al que va dirigido:</span> {{ $listing->dirigido }}</p>
                <p><span class="font-bold">Objetivo general:</span> {{ $listing->objetivo_general }}</p>

                @php
                    $entregado = DB::table('revision')->where('id_user', auth()->user()->id)->where('id_curso', $listing->id)->first();
                @endphp
                @if ($entregado !== null)
                <div class="flex flex-col justify-center items-center">
                    <p class="text-xl md:text-3xl m-4 p-4 animate-pulse text-green-500">YA HAS ENTREGADO EVIDENCIA</p>
                    <a href="/users/evidencias/{{$entregado->id}}">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5  font-medium text-center text-white bg-laravel rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 hover:scale-105 hover:text-xl">
                        Ver evidencia
                    </button>
                    </a>
                </div>
                @endif
            </h2>
        </div>
    </div>
</x-card>
