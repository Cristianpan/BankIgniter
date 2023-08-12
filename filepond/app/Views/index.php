<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drag and drop</title>
    <link rel="stylesheet" href="/assets/css/app.bundler.css">
</head>

<?php
$response = session()->get('response');
?>

<body>

    <main class="container vh-100 d-flex align-items-center flex-column justify-content-center">
        <h2 class="text-primary mb-4">Imagenes Guardadas</h2>
        <div class="d-flex gap-3 mb-4 justify-content-center flex-wrap">
            <?php foreach ($images as $value) : ?>
                <img class="d-block w-25" src="<?= base_url() ?>files/img/<?= $value['url'] ?>" alt="Image">

            <?php endforeach ?>
        </div>
        <div class="w-100">
            <?php if ($response) : ?>
                <div class="alert alert-success mb-3 w-50 mx-auto" role="alert">
                    <?= $response ?>
                </div>
            <?php endif ?>
            <form class="form w-50 m-auto" action="/save" method="POST">
                <input class="filepond-input-multiple" name="image[]" type="file" data-max-files="10" multiple required />
                <button type="submit" class="btn btn-primary" id="submit">Enviar</button>
            </form>
        </div>
    </main>




    <script src="/assets/js/app.bundler.js"></script>
</body>

</html>