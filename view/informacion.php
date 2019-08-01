<?php
    class InformacionView{
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

        public function renderMovie() {

            $movie = $this->model->movie;
            return "
                <div class='card movie' style='width: 18rem;'>
                    <img src='{$this->getMoviePath($movie)}' class='card-img-top medium'>
                    <div class='card-body'>
                        <h5 class='card-title'>{$movie[8]}</h5>
                        <p class='card-text'>{$movie[19]}</p>
                        <p class='card-text'>{$movie[9]}</p>
                        <p class='card-text'>Rating: {$movie[22]}</p>
                        <a href='./lista.php' class='btn btn-primary'>Regresar</a>
                    </div>
                </div>
            ";
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