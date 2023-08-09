<?php
$response = session()->get('response');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preload" href="<?= base_url() ?>assets/css/app.css" as="style">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.css">
</head>

<body>
    <main class="h-auto login py-5" style="background-color: #9A616D;">
        <div class="login__card h-100 p-5 mx-auto card rounded-5">
            <h1 class="text-center fs-1 mb-3 login__title">UpTask</h1>
            <p class="text-center fs-3 login__text">Welcome Back</p>

            <?php if ($response) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $response['message'] ?>
                </div>
            <?php endif ?>

            <form action="/login" method="post">
                <div class="form-outline mb-4">
                    <label for="email" class="form-label fs-5">Email</label>
                    <input name="email" type="email" id="email" class="fs-5 form-control" placeholder="your email" required>
                </div>
                <div class="form-outline mb-4">
                    <label for="password" class="form-label fs-5">Password</label>
                    <input name="password" type="password" id="password" class="fs-5 form-control" placeholder="your password" required>
                </div>


                <a href="#" class="fs-6 d-block text-end text-dark text-decoration-none">Forgot password?</a>

                <button type="submit" class="w-100 fs-5 text-uppercase my-4 btn btn-dark btn-block">Sign in</button>

                <a href="#" class="text-center text-dark d-block fs-6 text-decoration-none">Not a member? <span class="text-primary">Register</span></a>
            </form>

        </div>
    </main>


</body>

</html>