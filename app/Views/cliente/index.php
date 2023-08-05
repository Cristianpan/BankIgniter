<?= $this->extend('templates/layout') ?>

<?= $this->section('content') ?>

<main class="container">
    <h2>Buscar Cliente</h2>
    
    <?= $this->include('templates/modalMessage')?>

    <form class="search border-r-1">
        <label for="curp" class="search__label">
            <img src="<?=base_url()?>assets/img/lupa.svg" alt="lupa icon" />
        </label>
        <input type="search" id="curp" name="curp" placeholder="Ingrese el CURP del cliente" class="search__input" />
    </form>


    <?php if (!$cliente) { ?>

        <p class="text-center">No se han encontrado resultados</p>

    <?php } else { ?>
        <div class="card">
            <h3 class="card__titulo">Información de Cliente</h3>

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
            <div class="cliente__botones">
                <a href="/editar/<?= $cliente['id'] ?>" class="cliente__boton">
                    <img src="<?=base_url()?>assets/img/edit.svg" alt="edit icon" />
                </a>
                <form action="/cliente/eliminar" method="post">
                    <input name="clienteId" type="hidden" value="<?= $cliente['id'] ?>">
                    <button type="submit" class="cliente__boton"><img src="<?=base_url()?>assets/img/trash.svg" alt="trash icon" /></button>
                </form>
            </div>
        </div>
        <div class="card">
            <h3 class="card__titulo">Cuentas de cliente</h3>
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
                        <p class="cuenta__info">10/28</p>
                    </div>

                    <form action="/cuenta/eliminar" method="post">
                        <input type="hidden" value="<?= $cuenta['id'] ?>">
                        <button type="submit" class="cuenta__eliminar"><img src="<?=base_url()?>assets/img/trash.svg" alt="trash icon" /></button>
                    </form>
                </div>
            <?php endforeach ?>
            <form id="cuenta__agregar" action="/cuenta/agregar" method="post">
                <input type="hidden" value="<?= $cliente['id'] ?>">
                <input type="submit" class="card__agregar" value="Agregar Cuenta" />
            </form>
        </div>

    <?php } ?>
</main>

<?= $this->endSection('content') ?>