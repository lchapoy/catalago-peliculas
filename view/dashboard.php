<?php
    class DashboardView{
        function __construct($controller,$model) {
           $this->controller = $controller;
           $this->model = $model;
        }

       public function render(){
          echo "
             <div class='jumbotron'>
                 <h1 class='display-4'>Peliculas!</h1>
                 <p class='lead'>En esta pagina podras encontrar un catalago de las peliculas mas recientes</p>
                 <a class='btn btn-primary btn-lg' href='lista.php' role='button'>Lista de Peliculas</a>
             </div>
         ";
       }
    }
?>