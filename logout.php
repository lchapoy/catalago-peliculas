<?php
    // Inicializa la sesion
    session_start();
    
    // Borra todas las variables de la sesion actual
    $_SESSION = array();
    
    // Destruye la sesion
    session_destroy();
    
    // Redirecciona a la pagina de inicio
    header("location: index.php");
    exit;
?>