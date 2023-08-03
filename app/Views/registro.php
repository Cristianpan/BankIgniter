<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<main class="container">
    <h2>Registro de Cliente</h2>
    <form class="form">
        <div class="form__field">
            <label class="form__label" for="nombre">Nombre</label>
            <input name="nombre" class="form__input border-r-1" type="text" required placeholder="Cristian David" />
        </div>
        <div class="form__field">
            <label class="form__label" for="apellidos">Apellidos</label>
            <input id="apellido" name="apellido" class="form__input border-r-1" type="text" required placeholder="Pan Zaldivar" />
        </div>
        <div class="form__grid">
            <div class="form__field">
                <label class="form__label" for="fechaDeNacimiento">Fecha de Nacimiento</label>
                <input id="fechaDeNacimiento" name="fechaDeNacimiento" class="form__input border-r-1" type="date" required />
            </div>
            <div class="form__field">
                <label class="form__label" for="edad">Edad</label>
                <input id="edad" name="edad" class="form__input border-r-1" type="number" required placeholder="21" />
            </div>
        </div>
        <div class="form__field">
            <label class="form__label" for="">CURP</label>
            <input id="curp" name="curp" class="form__input border-r-1" type="text" required placeholder="PAZC010106HYNNLRA6" />
        </div>

        <div class="form__buttons">
            <a class="form__cancelar" href="javascript:history.back()">Cancelar</a>
            <input class="form__submit" type="submit" value="Guardar" />
        </div>
    </form>
</main>
<?= $this->endSection('content') ?>