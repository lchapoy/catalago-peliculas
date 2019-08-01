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
                            <div class="row">
                                <a href="./informacion.php?id={$movie[5]}" class="btn btn-primary"><i class='fas fa-eye'></i></a>
                                <a href="./agregar.php?id={$movie[5]}" class="btn btn-primary"><i class='fas fa-edit'></i></a>
                            </div>
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