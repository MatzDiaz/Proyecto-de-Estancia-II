<?php
session_start();
include 'controlador_conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nivel_satisfaccion'])) {
        $nivel_satisfaccion = $_POST['nivel_satisfaccion'];
    }

    if (isset($_POST['comentarios'])) {
        $comentarios = $_POST['comentarios'];
    }

    $cor = $_SESSION['usuario'];

    $sql = "SELECT IdAlum FROM alumno WHERE correo = '$cor'";
    $resultado = mysqli_query($conn, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $idAlumno = $fila['IdAlum'];

    

}

?>