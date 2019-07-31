<?php
    define('__ROOT__', dirname(__FILE__));
    $session = require_once(__ROOT__.'/controllers/session.php');
    $session->verifyLogin();
    if (isset($_POST['login'])) {
        $session->login();
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
    <div class="wrapper">
        <img src="/catapeli/images/popcorn.png" width="120" height="120" class="logor">
        <h2 class="title"> CataPeli </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($session->username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-user"></i></div>
                    </div>
                    <input type="text" name="username" class="form-control" value="<?php echo $session->username; ?>" aria-describedby="usernameHelpBlock">
                </div>
                <span id="usernameHelpBlock" class="help-block text-muted"><?php echo $session->username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($session->password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                    <input type="password" name="password" class="form-control" aria-describedby="passwordHelpBlock">
                </div>
                <span id="passwordHelpBlock" class="help-block text-muted" ><?php echo $session->password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Iniciar Sesion" name="login">
            </div>
        </form>
    </div>    
</body>
</html>