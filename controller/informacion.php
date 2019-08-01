<?php
    class InformacionController{
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

        public function getMovie($movieId) {
            $result = $this->db->getMovie($movieId);
            $this->model->movie = $result;
            return $result;
        }

    }
?>