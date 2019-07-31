<?php
    class Session{
        function __construct() {
            // Empieza la sesion.
            session_start();
            $this->username = "";
            $this->password = "";
            $this->password_err = "";
            $this->username_err = "";
            $this->username_err = "";
            $this->db = require_once('./controllers/db-connection.php');
        }

        public function verifyLogin(){
           // Verifica si el usuario esta logeado.
           if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
               //redirecciona a pagina principal
               header("location: dashboard.php");
               exit;
           }
        }

        public function verifySession(){
           // Verifica si el usuario esta logeado.
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
                header("location: index.php");
                exit;
            }
        }

        //Checa si el usuario esta conectado
        public function login(){
            // Inicia las variables de usuario, password y errores correspondientes.
            $this->username = "";
            $this->password = "";
            $this->password_err = "";
            $this->password_err = "";

            // Obtiene la informacion de la forma cuando esta se envia.
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Usuario Vacio
                if(empty(trim($_POST["username"]))){
                    $this->username_err = "Usuario Invalido";
                } else{
                    $this->username = trim($_POST["username"]);
                }

                // Contraseña Vacia
                if(empty(trim($_POST["password"]))){
                    $this->password_err = "Contraseña Invalida";
                } else{
                    $this->password = trim($_POST["password"]);
                }

                // Valida las credenciales
                if (empty($this->username_err) && empty($this->password_err)) {
                    $user = $this->db->validateCredentials($this->username, sha1($this->password));
                    echo $user['username'];
                    if (!empty($user)) {
                        // Guarda valores de referencia para la sesion.
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $user['id'];
                        $_SESSION["username"] = $user['username'];
                        $_SESSION["role"] = $user['role'];
                        // Redirecciona el usuario a la pagina principal
                        header("location: dashboard.php");
                    } else {
                        $this->password_err = "Credenciales Invalidas";
                    }
                }
            }
        }
    }
    $session = new Session();
    if (isset($_POST['login'])) {
        $session->login();
    }
    return $session
?>