<?php 
    //session_start();
    include 'controlador_conexion.php';

    $corre = $_SESSION['usuario'];

    $consulta = mysqli_query($enlace, "SELECT nom, ape, cor, password, fecha, sexo FROM coordinador
     WHERE cor = '$corre'");

    while($data = $consulta->fetch_assoc()){
        $nom = $data['nom'];
        $ape = $data['ape'];
        $cor = $data['cor'];
        $con = $data['password'];
        $fe = $data['fecha'];
        $gen = $data['sexo'];
    }    
?>