<div class="carousel-content p-4 shadow rounded-lg border-2 h-[350px] overflow-hidden md:px-[150px]">
    <div class="text-center items-center justify-center mx-auto mb-2">
        <button class="text-white bg-laravel shadow border rounded-lg px-4 py-2">
            <a href="/posts/{{ $post->id }}">
            Ver este aviso
            </a>
        </button>
    </div>
    <p class="text-gray-600">{!! $post->content !!}</p>
    
</div>
