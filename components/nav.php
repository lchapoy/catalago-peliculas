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
        //Aquí van los métodos
        public function rutaActiva($rutaActiva){
            return $this->ruta === $rutaActiva;
        }
        public function permisoRole(){
            return in_array($_SESSION["role"] , $this->role);
        }
        public function obtenerRuta(){
            return $this->ruta;
        }
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
  
    
    function renderRoutes($first_part){
        $rutas = [
            new Route('dashboard.php', 'Inicio', ['user', 'admin']),
            new Route('lista.php', 'Peliculas', ['user', 'admin']),
            new Route('agregar.php', 'Agregar', ['admin']),
            new Route('logout.php', 'Logout', ['user', 'admin'])
        ];
        $i = 0;
        while(sizeof($rutas)>$i) {
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
            renderRoutes($first_part);
        ?>
    </ul>
</nav>

