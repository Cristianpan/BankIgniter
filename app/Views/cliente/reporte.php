<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<main class="container reporte">
    <h2>Reporte de Clientes</h2>

    <?php foreach ($clientes as $cliente) : ?>

        <div class="reporte__info">

            <div class="reporte__cliente">
                <h3 class="reporte__titulo">Información de Cliente</h3>
                <div class="cliente">
                    <div>
                        <p class="cliente__label">No. de Cliente</p>
                        <p class="cliente__info"><?= $cliente['id'] ?></p>
                    </div>
                    <div>
                        <p class="cliente__label">Nombre</p>
                        <p class="cliente__info"><?= $cliente['nombre'] ?></p>
                    </div>
                    <div>
                        <p class="cliente__label">Apellidos</p>
                        <p class="cliente__info"><?= $cliente['apellido'] ?></p>
                    </div>
                    <div>
                        <p class="cliente__label">CURP</p>
                        <p class="cliente__info"><?= $cliente['curp'] ?></p>
                    </div>
                    <div>
                        <p class="cliente__label">Fecha de Nacimiento</p>
                        <p class="cliente__info"><?= $cliente['fechaNacimiento'] ?></p>
                    </div>
                    <div>
                        <p class="cliente__label">Edad</p>
                        <p class="cliente__info"><?= $cliente['edad'] ?></p>
                    </div>
                </div>
            </div>

            <div class="reporte__cuenta">
                <h3 class="reporte__titulo">Cuentas de cliente</h3>
                <?php foreach ($cliente['cuentas'] as $cuenta) : ?>
                    <div class="cuenta">
                        <div>
                            <p class="cuenta__label">No. de Cuenta</p>
                            <p class="cuenta__info"><?= $cuenta['id'] ?></p>
                        </div>
                        <div>
                            <p class="cuenta__label">Saldo</p>
                            <p class="cuenta__info"><?= $cuenta['saldo'] ?></p>
                        </div>
                        <div>
                            <p class="cuenta__label">Fecha de Vencimiento</p>
                            <p class="cuenta__info"><?= $cuenta['vencimiento'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    <?php endforeach ?>

    <button class="reporte-boton">
        <img src="<?= base_url() ?>assets/img/print.svg" alt="icono de imprimir">
    </button>

</main>


<?= $this->endSection('content') ?>