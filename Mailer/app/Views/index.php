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

<body>

    <header class="header section">
        <div class="header__flex container">
            <h1 class="header__title">Code Igniter <span class="header__span">
                    <picture>
                        <source srcset="/assets/img/igniter.avif" type="image/avif">
                        <source srcset="/assets/img/igniter.webp" type="image/webp">
                        <img src="/assets/img/igniter.png" alt="Logo code igniter">
                    </picture>
                </span></h1>
            <p class="header__description">Registrate al Bootcamp más esperado de todo el mundo</p>

            <p class="header__dates"> 7 de agosto - 7 de septiembre</p>

            <a href="#contacto" class="header__link">Regístrate</a>
        </div>
    </header>

    <main class="main container section" id="contacto">
        <h2 class="main__title">Registrate <span class="main__title--span">Participa por un acceso gratuito</span></h2>

        <?= $this->include('templates/modalMessage')?>

        <form action="/enviarEmail" method="post" class="form">
            <div class="form__field">
                <label for="nombre" class="form__label">Nombre</label>
                <input <?= old('nombre')?> required type="text" class="form__input" id="nombre" name="nombre" placeholder="Ej: Cristian David">
            </div>
            <div class="form__field">
                <label for="apellido" class="form__label">Apellidos</label>
                <input <?= old('apellido')?> required type="text" class="form__input" id="apellido" name="apellido" placeholder="Ej: Pan Zaldivar">
            </div>

            <div class="form__field">
                <label for="correo" class="form__label">Correo</label>
                <input <?= old('correo')?> required type="mail" class="form__input" id="correo" name="correo" placeholder="Ej: panzaldivarcristian@gmail.com">
            </div>

            <div class="form__field">
                <label for="institucion" class="form__label">Institución</label>
                <input <?= old('institucion')?> required type="text" class="form__input" id="institucion" name="institucion" placeholder="Ej: Universidad Autónoma de Yucatán">
            </div>

            <div class="form__field">
                <label for="mensaje" class="form__label">Mensaje</label>
                <textarea required name="mensaje" id="mensaje" class="form__input" placeholder="Describe porqué deberías de ser seleccionado para participar en el bootcamp"><?= old('mensaje')?></textarea>
            </div>

            <div class="form__buttons">
                <input type="submit" value="Enviar" class="form__submit">
            </div>
            
        </form>
    </main>

    <script src="<?= base_url() ?>assets/js/app.bundler.js"></script>

</body>

</html>