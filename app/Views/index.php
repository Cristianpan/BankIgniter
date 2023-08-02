<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<main class="container">
    <h2>Buscar Cliente</h2>
    <form class="search border-r-1">
        <label for="search" class="search__label">
            <img src="assets/img/lupa.svg" alt="lupa icon" />
        </label>
        <input type="search" id="curp" name="curp" placeholder="Ingrese el CURP del cliente" class="search__input" />
    </form>

    <div class="card">
        <h3 class="card__titulo">Información de Cliente</h3>

        <div class="cliente">
            <div>
                <p class="cliente__label">No. de Cliente</p>
                <p class="cliente__info">123412312</p>
            </div>
            <div>
                <p class="cliente__label">Nombre</p>
                <p class="cliente__info">Cristian David</p>
            </div>
            <div>
                <p class="cliente__label">Apellidos</p>
                <p class="cliente__info">Pan Zaldivar</p>
            </div>
            <div>
                <p class="cliente__label">CURP</p>
                <p class="cliente__info">PAZC010106HYNNLRA6</p>
            </div>
            <div>
                <p class="cliente__label">Fecha de Nacimiento</p>
                <p class="cliente__info">6 de enero de 2001</p>
            </div>
            <div>
                <p class="cliente__label">Edad</p>
                <p class="cliente__info">21</p>
            </div>
        </div>
        <div class="cliente__botones">
            <a href="#" class="cliente__boton">
                <img src="assets/img/edit.svg" alt="edit icon" />
            </a>
            <a href="#" class="cliente__boton">
                <img src="assets/img/trash.svg" alt="trash icon" />
            </a>
        </div>
    </div>
    <div class="card">
        <h3 class="card__titulo">Cuentas de cliente</h3>
        <div class="cuenta">
            <div>
                <p class="cuenta__label">No. de Cuenta</p>
                <p class="cuenta__info">1234567891234567</p>
            </div>
            <div>
                <p class="cuenta__label">Saldo</p>
                <p class="cuenta__info">$300</p>
            </div>
            <div>
                <p class="cuenta__label">Fecha de Vencimiento</p>
                <p class="cuenta__info">10/28</p>
            </div>
            <a class="cuenta__eliminar">
                <img src="assets/img/trash.svg" alt="trash icon" />
            </a>
        </div>
        <a href="#" class="card__agregar">Agregar Cuenta</a>
    </div>
</main>

<?= $this->endSection('content') ?>