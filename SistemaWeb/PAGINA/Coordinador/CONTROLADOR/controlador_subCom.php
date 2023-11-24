<?php
session_start();
include 'controlador_conexion.php';

$us = $_SESSION['usuario'];
$com = mysqli_real_escape_string($enlace, $_POST['comentario']);
$sql = "SELECT idAlum FROM alumno WHERE correo = '$us';";
$result = mysqli_query($enlace, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['idAlum'];

$rec = $_POST['receta']; 

echo "$id $com $rec";
if(!empty($com)){
    $sql = "INSERT INTO comentario (Comentario, idRec, idAlum) VALUES ('$com', '$rec','$id')";
    $execute = mysqli_query($enlace, $sql);
    if($execute){
        echo '<script>alert("Comentario realizado, inténtelo de nuevo");
            window.location = "../VISTA/recetas.php";</script>';
    }else{ 
        echo '<script>alert("Error al publicar el comentario, inténtelo de nuevo");
            window.location = "../VISTA/recetas.php";</script>';
    }
}else{
    //comentario vacio mandar un alert
    echo '<script>alert("El comentario esta vacío, inténtelo de nuevo");
            window.location = "../VISTA/recetas.php";</script>';
}
?>