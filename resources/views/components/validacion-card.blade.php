            <tr class="bg-white border-b  hover:bg-gray-50">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <span class="font-semibold">{{$validacion->folio}}</span>
                </th>
                <td class="px-6 py-4">
                    <span class="font-semibold">{{$validacion->nombre_usuario}}</span>
                </td>
                <td class="px-6 py-4">
                    {{$validacion->nombre_curso}}
                </td>
                <td class="px-6 py-4">
                    {{$validacion->tipo}}
                </td>
                <td class="px-6 py-4">
                    {{$validacion->fecha_de_registro}}
                </td>
                <td class="px-6 py-4">
                    {{$validacion->valor_curricular}}
                </td>
                <td class="px-6 py-4 text-right">
                    <form action="/pdf_download/bitacora">
                        <input type="hidden" name="folio" value="{{$validacion->folio}}">
                        <input type="hidden" name="nombre_participante" value="{{$validacion->nombre_usuario}}">
                        <input type="hidden" name="nombre_capacitacion" value="{{$validacion->nombre_curso}}">
                        <input type="hidden" name="tipo_participacion" value="{{$validacion->tipo}}">
                        <input type="hidden" name="fecha_capacitacion" value="{{$validacion->fecha_de_registro}}">
                        <input type="hidden" name="valor_curricular" value="{{$validacion->valor_curricular}}">

                       
                        <button type="submit" class="font-medium text-blue-600 hover:underline">Descargar constancia</button>
                    </form>
                </td>
                
            </tr>
