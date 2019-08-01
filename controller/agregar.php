<?php
    class AgregarEditarController{
        function __construct($model) {
            // Empieza la sesion.
            session_start();
            $this->model = $model;
            $this->db = require_once('./controller/db-connection.php');
            // Verifica si el usuario esta logeado.
            if(
                !isset($_SESSION["loggedin"])
                || $_SESSION["loggedin"] === false
                || $_SESSION["role"] !== 'admin'
            ){
               header("location: index.php");
               exit;
            }
        }

        public function getMovie($movieId) {
            $this->model->id = $movieId;
            $result = $this->db->getMovie($movieId);
            $this->model->title = $result[8];
            $this->model->overview = $result[9];
            $this->model->subtitle = $result[19];
            $this->model->rating = $result[22];
            return $result;
        }

        public function getValue($name) {

            if(empty(trim($_POST[$name]))){
                $this->model->{$name.'_err'} = ucfirst($name)." Invalido";
            } else{
                $this->model->{$name} = trim($_POST[$name]);
            }
        }

        public function agregarPelicula() {
            // Reinicia errores.
            $this->model->title_err = "";
            $this->model->overview_err = "";
            $this->model->subtitle_err = "";
            $this->model->rating_err = "";
            $this->model->form_err = "";
            // Obtiene la informacion de la forma cuando esta se envia.
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Verifica Inputs
                $this->getValue("title");
                $this->getValue("subtitle");
                $this->getValue("overview");
                $this->getValue("rating");

                //No errores
                if (
                    empty($this->model->title_err)
                    && empty($this->model->subtitle_err)
                    && empty($this->model->overview_err)
                    && empty($this->model->rating_err)
                ) {
                    //Agrega Pelicula
                    $error = $this->db->agregarPelicula(
                        $this->model->title,
                        $this->model->overview,
                        $this->model->subtitle,
                        $this->model->rating
                    );
                    if (empty($error)) {
                        header("location: lista.php");
                    } else {
                        $this->model->form_err = "Valores invalidos";
                    }
                }
            }
        }

        public function editarPelicula($id) {
            // Reinicia errores.
            $this->model->id = $id;
            $this->model->title_err = "";
            $this->model->overview_err = "";
            $this->model->subtitle_err = "";
            $this->model->rating_err = "";
            $this->model->form_err = "";
            // Obtiene la informacion de la forma cuando esta se envia.
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Verifica Inputs
                $this->getValue("title");
                $this->getValue("subtitle");
                $this->getValue("overview");
                $this->getValue("rating");

                //No errores
                if (
                    empty($this->model->title_err)
                    && empty($this->model->subtitle_err)
                    && empty($this->model->overview_err)
                    && empty($this->model->rating_err)
                ) {
                    //Editar Pelicula
                    $error = $this->db->editarPelicula(
                        $this->model->id,
                        $this->model->title,
                        $this->model->overview,
                        $this->model->subtitle,
                        $this->model->rating
                    );
                    if (empty($error)) {
                        header("location: lista.php");
                    } else {
                        $this->model->form_err = "Valores invalidos";
                    }
                }
            }
        }
    }
?>