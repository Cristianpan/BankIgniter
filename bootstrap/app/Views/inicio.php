<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="preload" href="<?= base_url() ?>assets/css/app.css" as="style">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
</head>

<body>

    <nav class="navbar bg-dark py-3">
        <div class="container">
            <a class="navbar-brand text-white fs-2 fw-bolder" href="#">UPTask</a>

            <div class="d-flex align-items-center gap-5">
                <a href="#" class="text-decoration-none fs-5 text-white">Projects</a>
                <a href="#" class="text-decoration-none fs-5 text-white">Add Project</a>

                <form action="/logout" method="post">
                    <input type="submit" value="LogOut" class="btn btn-light px-3">
                </form>
            </div>
        </div>
    </nav>

    <main>
        <h1 class="fs-3 mt-5 text-center">Bienvenido <?= session()->get('nombre') ?></h1>
    </main>
</body>

</html>