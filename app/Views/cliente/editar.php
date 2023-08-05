<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<main class="container">
    <h2>Editar Cliente</h2>

    <?= $this->include('./templates/modalMessage') ?>

    <form class="form" method="post" action="/editar/<?= $cliente['id'] . "/" . $cliente['curp']?>">
        <?= $this->include('./cliente/formulario') ?>

        <div class="form__buttons">
            <a class="form__cancelar" href="/">Cancelar</a>
            <input class="form__submit" type="submit" value="Editar" />
        </div>
    </form>
</main>

<?= $this->endSection('content') ?>