<x-layout>
    <div>
        <div class="flex flex-col items-center justify-center">
            <div class="shadow border rounded-lg px-4 py-2 text-center bg-laravel text-white text-xl">
                <h1>Últimos avisos</h1>
            </div>
        </div>
        <div x-data="{ activeSlide: 0 }" class="carousel">
            <div class="carousel-inner">
                @foreach($posts as $key => $post)
                    <div x-show="activeSlide === {{ $key }}" class="carousel-item{{ $key === 0 ? ' active' : '' }}">
                        <x-post-card :post="$post" />
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center pt-4">
                <button x-on:click="activeSlide = (activeSlide === 0) ? {{ count($posts) - 1 }} : activeSlide - 1" class="carousel-prev"><i class="fa-solid fa-circle-chevron-left text-3xl"></i></button>
                <button x-on:click="activeSlide = (activeSlide === {{ count($posts) - 1 }}) ? 0 : activeSlide + 1" class="carousel-next"><i class="fa-solid fa-circle-chevron-right text-3xl"></i></button>
            </div>
            
            
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.Alpine = require('alpinejs');

        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', () => ({
                activeSlide: 0,
            }));
        });

        Alpine.start();
    </script>
</x-layout>
