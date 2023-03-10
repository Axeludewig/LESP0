<x-layout>
    <a href="/admin/paneldecontrol" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Volver </a>
    <div class="m-4 flex text-white bg-mich5 border border-gray-200 rounded p-6 place-content-center hover:text-black hover:bg-mich4">
        <h3 class="text-2xl ">
            <p>Panel de Sesiones</p>
        </h3>
      </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center">
            <h3 class="text-2xl">
                <a href="/admin/sesiones/crear">Crear Sesión <i class="fa-sharp fa-solid fa-plus"></i></a> 
            </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl">
            <a href="/admin/sesiones/show">Cerrar Sesión <i class="fa-solid fa-location-pin-lock"></i></a> 
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl">
            <a href="/admin/sesiones/showcerradas">Abrir Sesión <i class="fa-solid fa-location-pin-lock"></i></a> 
        </h3>
    </div>
    <div class="m-6 flex bg-gray-50 border border-gray-200 rounded p-6 place-content-center">
        <h3 class="text-2xl">
            <a href="/admin/sesiones/history">Historial <i class="fa-solid fa-clock-rotate-left"></i></a> 
        </h3>
    </div>
</x-layout>