<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>drag and drop</title>
    <link rel="stylesheet" href="/assets/css/app.bundle.css">
</head>

<?php
$response = session()->get('response');
?>

<body>


    <main class="container vh-100 d-flex align-items-center">
        <div class="w-100">
            <?php if ($response) : ?>
                <div class="alert alert-success mb-3 w-50 mx-auto" role="alert">
                    <?= $response ?>
                </div>
            <?php endif ?>

            <form class="form w-50 m-auto" action="/save" method="POST">
                <input class="filepond-input-multiple" name="image[]" type="file" data-max-files="10" multiple />
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </main>


    <script src="/assets/js/app.bundler.js"></script>
</body>

</html>