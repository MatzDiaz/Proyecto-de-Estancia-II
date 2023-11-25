<?php
    session_start();
    if(!isset($_SESSION['loggin'])){
        echo '<script>alert("Por favor, inicie sesión");
            window.location = "../VISTA/sesion.php";
            </script>';
    }
?>
