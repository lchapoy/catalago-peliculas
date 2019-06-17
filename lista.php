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
        .wrapper{ padding: 20px; }
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
    <section class="wrapper">
        <div class="card" style="width: 18rem;">
            <img src="/ejercicio1/images/no-movie.jpg" class="card-img-top medium">
            <div class="card-body">
                <h5 class="card-title">Pelicula 1</h5>
                <p class="card-text">Descripcion Pelicula 1</p>
                <a href="#" class="btn btn-primary">Ver mas informacion</a>
            </div>
        </div>
    </section>
</body>
</html>