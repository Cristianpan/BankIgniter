<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/app.bundle.css">

</head>

<style>
    body {
        font-family: sans-serif;
    }

    .mail__description {
        font-size: 28px;
        color: #DD4814;
        margin-bottom: 30px; 
    }

    .mail__text {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .mail__span {
        color: #181a1b;
        font-weight: normal;
    }
</style>

<body>
    <p class="mail__description">Se ha generado el siguiente mensaje desde el formulario de registro</p>

    <p class="mail__text">Remitente: <span class="mail__span"><?= $contacto['correo'] ?></span></p>
    <p class="mail__text">Nombre: <span class="mail__span"><?= $contacto['nombre'] . " " . $contacto['apellido'] ?></span></p>
    <p class="mail__text">Institución Proveniente: <span class="mail__span"><?= $contacto['institucion'] ?></span></p>
    <p class="mail__text">Mensaje: <span class="mail__span"><?= $contacto['mensaje'] ?></span></p>

</body>

</html>