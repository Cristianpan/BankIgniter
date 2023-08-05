<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<?php
$errors = session()->get('errors');
?>

<main class="container">
    <h2>Registro de Cliente</h2>

    <?= $this->include('./templates/modalMessage')?>

    <form class="form" method="post" action="/registro">
        <?= $this->include('./cliente/formulario') ?>

        <div class="form__buttons">
            <a class="form__cancelar" href="/">Cancelar</a>
            <input class="form__submit" type="submit" value="Guardar" />
        </div>
    </form>
</main>

<?= $this->endSection('content') ?>