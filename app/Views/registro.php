<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<?php
$errors = session()->get('errors');
$message = session()->get('message')
?>

<main class="container">
    <h2>Registro de Cliente</h2>

    <?php if (isset($message)) : ?>
        <div class="success">
            <?= $message ?>
        </div>
    <?php endif ?>

    <form class="form" method="post">
        <div class="form__field">
            <label class="form__label" for="nombre">Nombre</label>
            <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : '' ?>
            <input name="nombre" id="nombre" class="form__input border-r-1" type="text" placeholder="Cristian David"  value="<?= old('nombre') ?>" />
        </div>
        <div class="form__field">
            <label class="form__label" for="apellidos">Apellidos</label>
            <?= isset($errors['apellido']) ? "<p class='error'>" . $errors['apellido'] . "</p>" : '' ?>
            <input name="apellido" id="apellido" class="form__input border-r-1" type="text" placeholder="Pan Zaldivar"  value="<?= old('apellido') ?>" />
        </div>
        <div class="form__grid">
            <div class="form__field">
                <label class="form__label" for="fechaNacimiento">Fecha de Nacimiento</label>
                <?= isset($errors['fechaNacimiento']) ? "<p class='error'>" . $errors['fechaNacimiento'] . "</p>" : '' ?>
                <input name="fechaNacimiento" id="fechaNacimiento" class="form__input border-r-1" type="date"   value="<?= old('fechaNacimiento') ?>"/>
            </div>
            <div class="form__field">
                <label class="form__label" for="edad">Edad</label>
                <?= isset($errors['edad']) ? "<p class='error'>" . $errors['edad'] . "</p>" : '' ?>
                <input name="edad" id="edad" class="form__input border-r-1" type="number" placeholder="21"  value="<?= old('edad') ?>" />
            </div>
        </div>
        <div class="form__field">
            <label class="form__label" for="">CURP</label>
            <?= isset($errors['curp']) ? "<p class='error'>" . $errors['curp'] . "</p>" : '' ?>
            <input name="curp" id="curp" class="form__input border-r-1" type="text" placeholder="PAZC010106HYNNLRA6" value="<?= old('curp') ?>" />
        </div>

        <div class="form__buttons">
            <a class="form__cancelar" href="/">Cancelar</a>
            <input class="form__submit" type="submit" value="Guardar" />
        </div>
    </form>
</main>

<?= $this->endSection('content') ?>