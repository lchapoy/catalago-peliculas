<?php
    session_start();
    // Verifica si el usuario tiene sesion.
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
        header("location: index.php");
        exit;
    }
?>