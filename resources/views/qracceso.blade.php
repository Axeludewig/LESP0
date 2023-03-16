<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            font-family: sans-serif;
        }

        h3 {
            text-align: center;
            font-size: 60px;
        }

        .image {
            text-align: center;
        }
    </style>

    <title>Código QR de acceso</title>
</head>

<body>
    <h3>{{ $nombre_curso }}</h3>
    <div class="image">
        <img src="<?php echo $qrcode; ?>" width="800px" height="800px" />
    </div>
</body>

</html>
