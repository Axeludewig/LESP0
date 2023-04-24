@if(session()->has('message'))
<div id="popup-modal" tabindex="-1" class="fixed top-0 left-1/2 transform -translate-x-1/2 px-48 py-3 z-50 p-4 overflow-x-hidden overflow-y-auto " x-data="{show: true}" x-init="setTimeout(() => (show=false), 2500)" x-show="show">
    <div class="relative w-full max-w-md max-h-full">
        <div class="flex relative bg-white rounded-lg shadow border-2">
            <div class="p-6 text-center">
              <div class="relative">
                <p class="inline-block pr-12">
                    {{session('message')}}
                </p>
                <div class="absolute top-0 right-0 flex">
                  <button type="button" onclick="document.getElementById('popup-modal').style.display='none'" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto items-center inline-block" data-modal-hide="popup-modal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" onclick="this.parentElement.style.display='none'" ><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                </div>
              </div>
                <button data-modal-hide="popup-modal" type="button" onclick="this.parentElement.style.display='none'" class="text-white bg-laravel hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mt-4">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
@endif