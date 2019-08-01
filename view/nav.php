<?php
    $router = require_once(__ROOT__.'/controllers/nav.php');

    //Genera las rutas en la barra de navegacion dinamicamente.
    function renderRoutes($router){
        //Crea los objectos de cada una de las rutas.
        $rutas = [
            $router->getListElement('dashboard.php', 'Inicio', ['usuario', 'admin']),
            $router->getListElement('lista.php', 'Peliculas', ['usuario', 'admin']),
            $router->getListElement('agregar.php', 'Agregar', ['admin']),
            $router->getListElement('logout.php', 'Logout', ['usuario', 'admin'])
        ];
        $i = 0;
        //Prueba usando while para iterar array
        //Itera sobre las rutas creadas
        while(sizeof($rutas)>$i) {
            //Imprime la ruta <li> obtenida de la funcion getListElement
            echo $rutas[$i];
            $i += 1;
        }
    }
?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
    <img src="/catapeli/images/popcorn.png" width="30" height="30" >
    <a class="navbar-brand title" href="#">CataPeli</a>
    <ul class="navbar-nav">
        <?php
            //Imprime las rutas que el usuario tiene permiso.
            renderRoutes($router);
        ?>
    </ul>
</nav>

