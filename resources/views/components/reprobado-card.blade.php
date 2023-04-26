<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <span class="font-semibold">{{$reprobado->nombre_user}}</span>
    </th>
    <td class="px-6 py-4">
        <span class="font-semibold">{{$reprobado->nombre_curso}}</span>
    </td>
    <td class="px-6 py-4">
        {{$reprobado->calificacion}}
    </td>
    <td class="px-6 py-4">
        {{$reprobado->oportunidad}}
    </td>
    <td class="px-6 py-4">
        {{$reprobado->created_at}}
    </td>
    <td class="px-6 py-4 text-right">
        <form action="/pdf_download/bitacora">
           
            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
        </form>
    </td>
