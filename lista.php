<?php
    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }
    require_once('./controller/lista.php');
    require_once('./view/lista.php');
    require_once('./model/lista.php');
    $model = new ListaModel();
    $controller = new ListaController($model);
    $view = new ListaView($controller, $model);

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
        .wrapper{
            padding: 20px;
            flex-direction: 'row';
            display: flex;
            flex-wrap: wrap
         }
        .title{
            text-align: center;
            font-family: 'Permanent Marker', cursive;
        }
        .movie{
            flex: 1 1 25%;
        }
    </style>
    
</head>
<body>
    <?php console_log($controller->getMovies()); ?>
    <?php
        require_once('./components/nav.php');
        $view->render();
    ?>

</body>
</html>