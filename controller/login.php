<?php
    class LoginController{
        function __construct($model) {
            // Empieza la sesion.
            session_start();
            $this->model = $model;
            $this->db = require_once('./controller/db-connection.php');
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
               //redirecciona a pagina principal
               header("location: dashboard.php");
               exit;
            }
        }

        //Checa si el usuario esta conectado
        public function login(){
            // Inicia las variables de usuario, password y errores correspondientes.
            $this->model->username = "";
            $this->model->password = "";
            $this->model->password_err = "";
            $this->model->password_err = "";

            // Obtiene la informacion de la forma cuando esta se envia.
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Usuario Vacio
                if(empty(trim($_POST["username"]))){
                    $this->model->username_err = "Usuario Invalido";
                } else{
                    $this->model->username = trim($_POST["username"]);
                }

                // Contraseña Vacia
                if(empty(trim($_POST["password"]))){
                    $this->model->password_err = "Contraseña Invalida";
                } else{
                    $this->model->password = trim($_POST["password"]);
                }

                // Valida las credenciales
                if (empty($this->username_err) && empty($this->password_err)) {
                    $user = $this->db->validateCredentials($this->model->username, sha1($this->model->password));
                    if (!empty($user)) {
                        // Guarda valores de referencia para la sesion.
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $user['id'];
                        $_SESSION["username"] = $user['username'];
                        $_SESSION["role"] = $user['role'];
                        // Redirecciona el usuario a la pagina principal
                        header("location: dashboard.php");
                    } else {
                        $this->model->password_err = "Credenciales Invalidas";
                    }
                }
            }
        }
    }
?>