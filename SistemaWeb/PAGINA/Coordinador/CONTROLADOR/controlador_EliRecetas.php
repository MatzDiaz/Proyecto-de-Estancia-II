<?php
    include 'controlador_conexion.php';
    $id = $_POST['receta'];
    echo "$id";
        $sql = mysqli_query($enlace, "DELETE FROM receta WHERE idRec = $id");
        if($sql == true){
            echo '<script>alert("Receta eliminada exitosamente");
            window.location = "../VISTA/recetas.php";</script>';
       }else{
            echo '<script>alert("Falló");
            window.location = "../VISTA/recetas.php";</script>';
        }
    
?>