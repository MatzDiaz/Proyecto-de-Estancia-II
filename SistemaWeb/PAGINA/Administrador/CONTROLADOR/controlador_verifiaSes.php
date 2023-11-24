<?php
    session_start();
    if(!isset($_SESSION['loggin'])){
        echo '<script>alert("Porfacor, inicie sesións");
            window.location = "../VISTA/sesion.php";
            </script>';
    }
?>
