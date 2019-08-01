<?php
    class ListaController{
        function __construct($model) {
            // Empieza la sesion.
            session_start();
            $this->model = $model;
            $this->db = require_once('./controller/db-connection.php');
            // Verifica si el usuario esta logeado.
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
               header("location: index.php");
               exit;
            }
        }

        public function getMovies() {
            $result = $this->db->getMovies();
            $this->model->movies = $result;
            return $result;
        }

        public function deleteMovie($deleteMovieId) {
            $result = $this->db->deleteMovie($deleteMovieId);
            return $result;
        }

    }
?>