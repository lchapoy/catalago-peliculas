<?php
    class ListaView{
        function __construct($controller,$model) {
           $this->controller = $controller;
           $this->model = $model;
        }
        public function getMoviePath($movie) {
          if (empty($movie[11])){
            return '/catapeli/images/no-movie.jpg';
          } else {
            return 'http://image.tmdb.org/t/p/original'.$movie[11];
          }
        }

        public function deleteEditActions($movieId, $formAction) {
            if($_SESSION["role"] === 'admin') {
                return "
                    <a href='./agregar.php?id={$movieId}' class='btn btn-primary'><i class='fas fa-edit'></i></a>
                    <form action='$formAction' method='post'>
                        <button type='submit' class='btn btn-danger' name='deleteMovie' value='{$movieId}'>
                            <i class='fas fa-trash'></i>
                        </button>
                    </form>
                ";
            } else {
                return '';
            }
        }

        public function renderMovie() {
            $movies = '';
            $formAction = htmlspecialchars($_SERVER['PHP_SELF']).'?'.http_build_query($_GET);
            for ($i = 1; $i < sizeof($this->model->movies); $i++) {
                $movie = $this->model->movies[$i];
                $adminActions = $this->deleteEditActions($movie[5], $formAction);
                $movies = $movies."
                    <div class='card movie' style='width: 18rem;'>
                        <img src='{$this->getMoviePath($movie)}' class='card-img-top medium'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$movie[8]}</h5>
                            <p class='card-text'>{$movie[19]}</p>
                            <div class='row'>
                                <a href='./informacion.php?id={$movie[5]}' class='btn btn-primary'><i class='fas fa-eye'></i></a>
                                $adminActions    
                            </div>
                        </div>
                    </div>
                ";
            }
            return $movies;
        }

       public function render(){
          echo "
             <section class='wrapper'>
                 {$this->renderMovie()}
             </section>
         ";
       }
    }
?>