<x-layout>
    <div class="flex flex-col items-center justify-center">
        <div class="border shadow rounded-lg p-8 text-center mb-4 w-1/4 flex flex-col items-center justify-center px-24">
            <button class="border shadow rounded-lg px-4 py-2 text-white bg-laravel">
                <a href="/editor">
            Crear aviso
                </a>
            </button>
        </div>
    </div>
    @unless(count($avisos) == 0)
  
    <table class="text-center md:w-full">
        <tr class="border bg-laravel text-white">
            <td class="border font-semibold">Id</td>
            <td class="border font-semibold">Autor</td>
            <td class="border font-semibold" style="padding: 10px 10px;">Contenido</td>
            <td class="border font-semibold">Acción</td>
        </tr>
    @foreach($avisos as $aviso)
    <x-aviso-card :aviso="$aviso" />
    @endforeach
</table>
    @endunless

    <div class="mt-6 p-4">
        {{$avisos->links()}}
      </div>
</x-layout>