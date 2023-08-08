<x-layout>
    <div class="flex items-center justify-center mt-24">
        <x-card>
            <form method="POST" action="/excelcirce" enctype="multipart/form-data" />
                @csrf
                <input type="file" name="file" />
                <button type="submit" class="rounded-lg border-2 p-4 bg-white text-black px-8">Send</button>
            </form> 
        </x-card>
    </div>
</x-layout>