<x-layout>
    <a href="/users/actividades" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div
    class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center ">
    <h3 class="text-3xl ">
        <p class="font-semibold">Evidencias subidas</p>
    </h3>
</div>
    <div class="flex flex-col md:flex-row items-center justify-center gap-3 mb-80 mt-24">
        @if ($revision->archivo1 != null)
        <a target="_blank" href="{{asset('storage/' . $revision->archivo1)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Ver evidencia 1</a>
        @endif
        @if ($revision->archivo2 != null)
        <a target="_blank" href="{{asset('storage/' . $revision->archivo2)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Ver evidencia 2</a>
        @endif
        @if ($revision->archivo3 != null)
        <a target="_blank" href="{{asset('storage/' . $revision->archivo3)}}" class="border-2 bg-mich4 border-black mb-4 hover:scale-105 font-semibold px-6 p-4 rounded-full">Ver evidencia 3</a>
        @endif
        </div>
</x-layout>