<?php
    include 'controlador_conexion.php';

    $sql = "SELECT COUNT(*) as total FROM alumno WHERE Genero = 'Masculino'";
    $query_masculino = mysqli_query($enlace, $sql);
    $resultado_masculino = mysqli_fetch_assoc($query_masculino);
    $masculino = $resultado_masculino['total'];
    
    $sql = "SELECT COUNT(*) as total FROM alumno WHERE Genero = 'Femenino'";
    $query_femenino = mysqli_query($enlace, $sql);
    $resultado_femenino = mysqli_fetch_assoc($query_femenino);
    $femenino = $resultado_femenino['total'];

    //GRADO DE SATISFACCION
    $sql = "SELECT count(*) as total FROM encuesta WHERE pregunta = 2";
    $query_muyin = mysqli_query($enlace, $sql);
    $resultado_muyin= mysqli_fetch_assoc($query_muyin);
    $muyin = mysqli_num_rows($query_muyin) > 0 ? $resultado_muyin['total'] : 0;

    $sql = "SELECT count(*) as total FROM encuesta WHERE pregunta = 2";
    $query_insatisfecho = mysqli_query($enlace, $sql);
    $resultado_insatisfecho = mysqli_fetch_assoc($query_insatisfecho);
    $insatisfecho = mysqli_num_rows($query_insatisfecho) > 0 ? $resultado_insatisfecho['total'] : 0;

    $sql = "SELECT count(*) as total FROM encuesta WHERE pregunta = 3";
    $query_neutro = mysqli_query($enlace, $sql);
    $resultado_neutro = mysqli_fetch_assoc($query_neutro);
    $neutro = mysqli_num_rows($query_neutro) > 0 ? $resultado_neutro['total'] : 0;

    $sql = "SELECT count(*) as total FROM encuesta WHERE pregunta = 4";
    $query_satisfecho = mysqli_query($enlace, $sql);
    $resultado_satisfecho = mysqli_fetch_assoc($query_satisfecho);
    $satisfecho = mysqli_num_rows($query_satisfecho) > 0 ? $resultado_satisfecho['total'] : 0;

    $sql = "SELECT count(*) as total FROM encuesta WHERE pregunta = 5";
    $query_muysat = mysqli_query($enlace, $sql);
    $resultado_muysat = mysqli_fetch_assoc($query_muysat);
    $muysat = mysqli_num_rows($query_muysat) > 0 ? $resultado_muysat['total'] : 0;


?>