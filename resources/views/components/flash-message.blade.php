@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => (show=false), 2500)" x-show="show"
  class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
  <div class="flex text-center"> 
    <p>
      {{session('message')}}
    </p>
    <button class="w-10 flex text-center justify-center items-center text-sm  ml-4 py-1 px-3 bg-white text-laravel rounded-lg font-bold"
            onclick="this.parentElement.style.display='none'">
      X
  </div>
</div>
@endif