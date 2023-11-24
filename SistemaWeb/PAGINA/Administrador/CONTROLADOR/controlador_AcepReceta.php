<?php
    include '../CONTROLADOR/controlador_conexion.php';

    $id = $_POST['receta'];
    $query = "UPDATE receta SET Estatus = 1 WHERE idRec = '$id'";

    $execute = mysqli_query($enlace, $query);
    if ($execute) {
        echo '<script>alert("Receta actualizada con exito");
        window.location = "../VISTA/AdmRecetas.php";</script>';
    } else {
        echo '<script>alert("Error al actualizar la receta, inténtelo de nuevo");
        window.location = "../VISTA/AdmRecetas.php";</script>';
    }
    mysqli_close($enlace);
?>