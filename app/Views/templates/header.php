<?php
$curp = session()->get('curp');
?>

<header class="header">
    <a class="logo" href="/<?= $curp ? 'curp/' . $curp : '' ?>">
        <img class="logo__imagen" src="<?= base_url() ?>/assets/img/logo.svg" alt="logo" />
        <h1 class="logo__texto">Bird<span class="logo__span">Bank</span></h1>
    </a>

    <nav class="nav">
        <a class="nav__link" href="/<?= $curp ? 'curp/' . $curp : '' ?>"> Inicio </a>
        <a class="nav__link" href="/registro">Agregar Cliente</a>
        <a class="nav__link" href="/reporte"> Reporte de Clientes</a>
    </nav>
</header>