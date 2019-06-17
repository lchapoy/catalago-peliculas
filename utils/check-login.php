<?php
    // Empieza la sesion.
    session_start();
    
    // Verifica si el usuario esta logeado.
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        //redirecciona a pagina principal
        header("location: dashboard.php");
        exit;
    }
    
    // Inicia las variables de usuario, password y errores correspondientes.
    $username = $password = "";
    $username_err = $password_err = "";
    
    // Obtiene la informacion de la forma cuando esta se envia.
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Usuario Vacio
        if(empty(trim($_POST["username"]))){
            $username_err = "Usuario Invalido";
        } else{
            $username = trim($_POST["username"]);
        }
        
        // Contraseña Vacia
        if(empty(trim($_POST["password"]))){
            $password_err = "Contraseña Invalida";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Valida las credenciales
        if (empty($username_err) && empty($password_err)) {
            // Abre archivo de contraseñas
            $myfile = fopen("credentials.csv", "rb");
            // Inicializa Arreglo para lista de usuarios con contraseñas
            $credentials = array();
            while (!feof($myfile)) {
                // Recorre linea por linea el archivo creado arreglo por linea separado por ",".
                $result = fgetcsv($myfile, 600, ",");
                // Guarda el usuario y la contraseña en arreglo de credenciales
                $credentials[$result[0]] = $result[1];
            }
            // Verifica si la contraseña proporcionada es la misma que la otorgada por el usuario
            if ($credentials[$username] === sha1($password)) {
                // Inicia la Sesion
                session_start();        
                // Guarda valores de referencia para la sesion.
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;                            
                
                // Redirecciona el usuario a la pagina principal
                header("location: dashboard.php");
            } else {
                $password_err = "Credenciales Invalidas";
            }
            // Cierra el archivo de credenciales.
            fclose($myfile);
        }
    }
?>