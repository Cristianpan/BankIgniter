<?php
    $errors = session()->get('errors');
?>

<div class="form__field">
    <label class="form__label" for="nombre">Nombre</label>
    <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : '' ?>
    <input name="nombre" id="nombre" class="form__input border-r-1" type="text" placeholder="Cristian David" value="<?= old('nombre') ?? $cliente['nombre'] ?? '' ?>" />
</div>
<div class="form__field">
    <label class="form__label" for="apellido">Apellidos</label>
    <?= isset($errors['apellido']) ? "<p class='error'>" . $errors['apellido'] . "</p>" : '' ?>
    <input name="apellido" id="apellido" class="form__input border-r-1" type="text" placeholder="Pan Zaldivar" value="<?= old('apellido') ?? $cliente['apellido'] ?? '' ?>" />
</div>
<div class="form__grid">
    <div class="form__field">
        <label class="form__label" for="fechaNacimiento">Fecha de Nacimiento</label>
        <?= isset($errors['fechaNacimiento']) ? "<p class='error'>" . $errors['fechaNacimiento'] . "</p>" : '' ?>
        <input name="fechaNacimiento" id="fechaNacimiento" class="form__input border-r-1" type="date" value="<?= old('fechaNacimiento') ?? $cliente['fechaNacimiento'] ?? '' ?>" />
    </div>
    <div class="form__field">
        <label class="form__label" for="edad">Edad</label>
        <?= isset($errors['edad']) ? "<p class='error'>" . $errors['edad'] . "</p>" : '' ?>
        <input name="edad" id="edad" class="form__input border-r-1" type="number" placeholder="21" value="<?= old('edad') ?? $cliente['edad'] ?? '' ?>" />
    </div>
</div>
<div class="form__field">
    <label class="form__label" for="curp">CURP</label>
    <?= isset($errors['curp']) ? "<p class='error'>" . $errors['curp'] . "</p>" : '' ?>
    <input name="curp" id="curp" class="form__input border-r-1" type="text" placeholder="PAZC010106HYNNLRA6" value="<?=  old('curp') ?? $cliente['curp'] ?? '' ?>" />
</div>