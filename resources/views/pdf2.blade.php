<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: sans-serif;
        }

        body {}

        h1 {}

        .constancia {
            text-align: center;
            font-size: 72px;
            color: rgb(133, 32, 12);
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .parrafo {
            text-align: center;
            font-size: x-large;
        }

        .nombre {
            text-align: center;
        }

        .parrafo2 {
            text-align: center;
            margin-left: 20%;
            margin-right: 20%;
        }

        .imgs {
            text-align: center;
        }

        .resize {
            object-fit: contain;
        }
    </style>
    <title>Constancia</title>
</head>

<body>
    <div class="imgs">
        <br>
        <img class="resize" src="<?php echo $pic2; ?>" width="300px" height="150px" />
        <img src="<?php echo $pic3; ?>" width="150px" height="150px" />
    </div>
    <p class="parrafo">El <b>Gobierno del Estado de Michoacán de Ocampo</b><br>
        a través de la <b>Secretaría de Salud de Michoacán</b><br>
        y del <b>Laboratorio Estatal de Salud Pública</b><br>
        Otorga la presente</p>

    <h1 class="constancia">CONSTANCIA</h1>

    <p class="nombre"><b>A: {{ $user->nombre }} {{ $user->apellido_paterno }}
            {{ $user->apellido_materno }}</b></p>

    <p class="parrafo2">Por su valiosa participación como <b>{{ $tipo }}</b> en el evento de capacitación
        <b>{{ $curso->nombre }}</b> realizado en el Laboratorio Estatal de Salud Pública el
        <b>{{ $curso->fecha_de_terminacion }}</b>.
        <br><br>Valor curricular en horas: <b>{{ $valor_curricular }}</b>
        <br><br>Folio: <b>{{ $folio }}</b><br><br>


        <img src="<?php echo $qrcode; ?>" width="125px" height="125px" />


        <img src="<?php echo $pic; ?>" width="700px" height="190px" />

</body>

</html>
