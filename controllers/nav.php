<?php
    class Route {
        function __construct() {
            $directoryURI = $_SERVER['REQUEST_URI'];
            $path = parse_url($directoryURI, PHP_URL_PATH);
            $components = explode('/', $path);
            $this->first_part = end($components);
        }
        //Checa si el usuario tiene permiso a la ruta
        public function permisoRole($role){

            return in_array($_SESSION["role"] ,  $role);
        }
        //Obtiene HTML <li> para la ruta 
        public function getListElement($ruta, $label, $role) {
            if ($this->permisoRole($role)){
                $active = $this->first_part === $ruta ? 'active' : '';
                $class = "nav-item ".$active;
                return '<li class="'.$class.'"><a class="nav-link" href="'.$ruta.'">'.$label.'</a></li>';
            } else {
                return null;
            }
           
        }
    }

    return new Route()
?>

