<?php 
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $first_part = end($components);
    class Route{
        private $ruta;
        private $role;
        function __construct($ruta, $label, $role) { 
            $this->ruta = $ruta;
            $this->role = $role;
            $this->label = $label;
        }
        //Checa si la ruta actual esta activa
        public function rutaActiva($rutaActiva){
            return $this->ruta === $rutaActiva;
        }
        //Checa si el usuario tiene permiso a la ruta
        public function permisoRole(){
            return in_array($_SESSION["role"] , $this->role);
        }
        //Obtiene HTML <li> para la ruta 
        public function getListElement($first_part) {
            if ($this->permisoRole()){
                $active = $first_part === $this->ruta ? 'active' : '';
                $class = "nav-item ".$active;
                return '<li class="'.$class.'"><a class="nav-link" href="'.$this->ruta.'">'.$this->label.'</a></li>';
            } else {
                return null;
            }
           
        }
    } 
  
    //Genera las rutas en la barra de navegacion dinamicamente.
    function renderRoutes($first_part){
        //Crea los objectos de cada una de las rutas.
        $rutas = [
            new Route('dashboard.php', 'Inicio', ['user', 'admin']),
            new Route('lista.php', 'Peliculas', ['user', 'admin']),
            new Route('agregar.php', 'Agregar', ['admin']),
            new Route('logout.php', 'Logout', ['user', 'admin'])
        ];
        $i = 0;
        //Prueba usando while para iterar array
        //Itera sobre las rutas creadas
        while(sizeof($rutas)>$i) {
            //Imprime la ruta <li> obtenida de la funcion getListElement
            echo $rutas[$i]->getListElement($first_part);
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
            renderRoutes($first_part);
        ?>
    </ul>
</nav>

