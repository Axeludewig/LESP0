<x-layout>
    <a href="/" class="inline-block text-black ml-4 mb-4">
        <i class="fa-solid fa-arrow-left"></i> Volver
    </a>
    <div class="md:mx-48">
        <div class="mb-[600px] md:mt-24 content">
            {!! $postid->content !!}
        </div>
    </div>

    <style>
        table {
            border-collapse: collapse;
        }
    
        table, td, tr {
            border: 1px solid black;
        }

        .content ol {
            font-size: 16px;
            color: #333333;
            margin-left: 20px;
        }

        .content li {
            margin-bottom: 8px;
            list-style-type: disc;
            list-style-position: inside;
            color: black;
        }

        blockquote {
            margin: 0;
            padding: 10px;
            background-color: #f2f2f2;
            border-left: 4px solid #333333;
            font-style: italic;
        }

        figure {
            border: 10px solid #333333;
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        p img {
            border: 10px solid #333333;
            padding: 20px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    
</x-layout>
