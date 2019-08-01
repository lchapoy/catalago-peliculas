<?php
    require_once('./controller/login.php');
    require_once('./view/login.php');
    require_once('./model/login.php');
    $model = new LoginModel();
    $controller = new LoginController($model);
    $view = new LoginView($controller, $model);
    if (isset($_POST['login'])) {
        $controller->login();
    }

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
    <script src="https://kit.fontawesome.com/a35779a5fa.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <style type="text/css">
        html{
            height: 100%;
            display: flex;
        }
        body{ 
            font: 14px sans-serif;
            display: flex;
            flex: 1;
            align-items: center;
            justify-content: center;
            background-color: darkgray;
        }
        .wrapper{
            position: relative;
            display: flex;
            align-self: 'center';
            background-color: white;
            padding: 20px;
            border: 1px solid lightgray;
            border-radius: 6px;
            width: 320px;
            flex-direction: column;
        }
        .logor{
            position: absolute;
            top: -80px;
            left: 100px;
        }
        .title{
            text-align: center;
            margin-top: 10px;
            font-family: 'Permanent Marker', cursive;
        }
    </style>
</head>
<body>
<?php
   $view->render();
?>
</body>
</html>