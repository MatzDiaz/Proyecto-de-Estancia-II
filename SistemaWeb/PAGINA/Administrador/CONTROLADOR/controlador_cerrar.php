<?php
session_start();

session_destroy();

header("Location: ../VISTA/sesion.php"); 
exit();
?>