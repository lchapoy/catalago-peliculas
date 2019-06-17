<?php
    define('__ROOT__', dirname(__FILE__));
    require_once(__ROOT__.'/utils/check-session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="XAMPP is an easy to install Apache distribution containing MariaDB, PHP and Perl." />
    <meta name="keywords" content="xampp, apache, php, perl, mariadb, open source distribution" />
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
        require_once(__ROOT__.'/components/nav.php');
    ?>
    <div class="jumbotron">
        <h1 class="display-4">Agregar Pelicula al Catalogo!</h1>
        <p class="lead">En esta pagina podras encontrar agregar una pelicula al catalogo catalago</p>
    </div>
</body>
</html>