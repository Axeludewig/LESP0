@props(['listing'])

<x-card>
  <div class="flex place-content-center">
    <div>
      <h3 class="text-2xl">
        <span class="font-bold">Nombre completo: </span>{{$listing->nombre_usuario}}
      </h3>

      <div class="mt-3 text-xl  mb-4">
        <span class="font-bold">Capacitación: </span>{{$listing->nombre_curso}}
      </div>
    
      <div class="mt-3 text-xl  mb-4">
        <span class="font-bold">Valor Curricular: </span>{{$listing->valor_curricular}}
      </div>

      <div class="mt-3 text-xl  mb-4">
        <span class="font-bold ">Status: </span>
        <span class="text-green-600 font-bold">{{$listing->status}}</span>
      </div>
 
    </div>
  </div>
</x-card>