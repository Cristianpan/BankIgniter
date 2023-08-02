<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BirdBank</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Lato&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?=base_url()?>assets/css/app.bundle.css" type="text/css" />
  </head>
  <body class="body">
    
    <?= $this->include('./templates/header')?>
    
    <?=$this->renderSection('content') ?>

  </body>
</html>