<?php 
    //session_start();
    include 'controlador_conexion.php';

    $corre = $_SESSION['usuario'];

    $consulta = mysqli_query($enlace, "SELECT nombre, apellido, correo, contra, fechana, genero FROM alumno WHERE correo = '$corre'");

    while($data = $consulta->fetch_assoc()){
        $nom = $data['nombre'];
        $ape = $data['apellido'];
        $cor = $data['correo'];
        $con = $data['contra'];
        $fe = $data['fechana'];
        $gen = $data['genero'];
    }    
?>