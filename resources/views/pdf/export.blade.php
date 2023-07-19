<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Exported Model Data</h1>
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>User Name</th>
                <th>Curricular Value</th>
                <th>Status</th>
                <th>Type</th>
                <th>Folio</th>
                <th>Registration Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item['nombre_curso'] }}</td>
                <td>{{ $item['nombre_usuario'] }}</td>
                <td>{{ $item['valor_curricular'] }}</td>
                <td>{{ $item['status'] }}</td>
                <td>{{ $item['tipo'] }}</td>
                <td>{{ $item['folio'] }}</td>
                <td>{{ $item['fecha_de_registro'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
