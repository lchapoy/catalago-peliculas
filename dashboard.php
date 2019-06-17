<?php
    define('__ROOT__', dirname(dirname(__FILE__)));
    require_once(__ROOT__.'/ejercicio1/utils/check-session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .title{
            text-align: center;
            font-family: 'Permanent Marker', cursive;
        }
    </style>
</head>
<body>
    <?php
        require_once(__ROOT__.'/ejercicio1/components/nav.php');
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Peliculas!</h1>
        <p class="lead">En esta pagina podras encontrar un catalago de las peliculas mas recientes</p>
        <a class="btn btn-primary btn-lg" href="lista.php" role="button">Lista de Peliculas</a>
    </div>
</body>
</html>