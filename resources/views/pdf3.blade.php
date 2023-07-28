<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>

            * {
                font-family: sans-serif;
            }

            body {
            }

            h1 {
            }

            .constancia {
                text-align: center;
                font-size: 80px;
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
                font-size: xx-large;
                margin-left: 6%;
                margin-right: 6%;
            }

            .parrafo2 {
                text-align: center;
                margin-left: 6%;
                margin-right: 6%;
            }

            .imgs {
                text-align: center;
            }

            .resize {
                object-fit: contain;
            }
            .image-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 12%;
            }

            .image-container img {
            display: block; /* Remove any default inline spacing */
            margin: 0 auto; /* This will horizontally center the images within the container */
            }

        </style>
        <title>Constancia</title>
    </head>

    <body>
        <div class="imgs">
            <br />
            <img
                class="resize"
                src="<?php echo $pic2; ?>"
                width="300px"
                height="120px"
            />
            <img src="<?php echo $qrcode; ?>" width="125px" height="125px" />
        </div>
        <p class="parrafo">
            El <b>Gobierno del Estado de Michoacán de Ocampo</b><br />
            a través de la <b>Secretaría de Salud de Michoacán</b><br />
            y del <b>Laboratorio Estatal de Salud Pública</b><br />
            Otorga la presente
        </p>

        <h1 class="constancia">CONSTANCIA</h1>

        <p class="nombre"><b>A: {{ $nombre_del_participante }}</b></p>

        <p class="parrafo2">
            Por su valiosa participación como
            <b>{{ $tipo }}</b> en el evento de
            capacitación
            <b>{{ $nombre_del_curso }}</b> realizado en el
            Laboratorio Estatal de Salud Pública el
            <b>{{ $fecha_de_terminacion }}</b>. <br /><br />Valor
            curricular en horas: <b>{{ $valor_curricular }}</b>
            <br /><br />Folio: <b>{{ $folio }}</b><br /><br />
            <div class="image-container">
                <img src="<?php echo $pic; ?>" width="700px" height="140px" />
                <img src="<?php echo $pic3; ?>" width="700px" height="20px" />
            </div>  
        </p>
    </body>
</html>
