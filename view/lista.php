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

        public function renderMovie() {
            $movies = '';
            for ($i = 1; $i < sizeof($this->model->movies); $i++) {
                $movie = $this->model->movies[$i];
                $movies = $movies.<<<MovieTag
                    <div class="card movie" style="width: 18rem;">
                        <img src="{$this->getMoviePath($movie)}" class="card-img-top medium">
                        <div class="card-body">
                            <h5 class="card-title">{$movie[8]}</h5>
                            <p class="card-text">{$movie[19]}</p>
                            <a href="#" class="btn btn-primary">Ver mas informacion</a>
                        </div>
                    </div>
                MovieTag;
            }
            return $movies;
        }

       public function render(){
          echo <<<ListaTAG
             <section class="wrapper">
                 {$this->renderMovie()}
             </section>
         ListaTAG;
       }
    }
?>