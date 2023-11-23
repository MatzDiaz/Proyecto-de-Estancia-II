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

    //
    $sql = "SELECT count(*) as total FROM respuesta INNER JOIN asignar 
        ON asignar.idasig = respuesta.idAsig WHERE idEnc = 1 AND grado = 5 GROUP BY grado";
    $query_insatisfecho = mysqli_query($enlace, $sql);
    $resultado_insatisfecho = mysqli_fetch_assoc($query_insatisfecho);
    $muy_satisfecho = mysqli_num_rows($query_insatisfecho) > 0 ? $resultado_insatisfecho['total'] : 0;



    $sql = "SELECT count(*) as total FROM respuesta INNER JOIN asignar 
        ON asignar.idasig = respuesta.idAsig WHERE idEnc = 1 AND grado = 4 GROUP BY grado";
    $query_insatisfecho = mysqli_query($enlace, $sql);
    $resultado_insatisfecho = mysqli_fetch_assoc($query_insatisfecho);
    $insatisfecho = mysqli_num_rows($query_insatisfecho) > 0 ? $resultado_insatisfecho['total'] : 0;



?>