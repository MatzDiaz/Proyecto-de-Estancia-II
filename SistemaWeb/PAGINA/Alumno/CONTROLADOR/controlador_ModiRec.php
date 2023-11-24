<?php
session_start();
include 'controlador_conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cont = $_POST['contenido'];
    $idRec = $_POST['idrec'];
    $cadenaBR = nl2br($cont);
    
    $titulo = $_POST['titulo'];

    //echo $_SESSION['usuario'];
    $correo = $_SESSION['usuario'];
    $sql = "SELECT idAlum FROM alumno WHERE correo = '$correo';";
    $result = mysqli_query($enlace, $sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['idAlum'];

    //Subir archivos
    $destino = "../../../IMG/";  // Ruta destino
    $nombreTemp = $_FILES['multimedia']['tmp_name']; // Nombre temporal del archivo
    $nombreImg = $_FILES['multimedia']['name'];
    $archivo = $destino . $nombreImg;

    if (isset($_FILES['multimedia']) && $_FILES['multimedia']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($nombreTemp, $archivo)) {
            echo 'El archivo se ha subido y movido correctamente.';
            echo "$archivo";
        } else {
            echo 'Hubo un error al mover el archivo.';
        }
    } else {
        echo 'Hubo un error al subir el archivo.';
    }

    //echo "$titulo $cont $id " . date('Y-m-d H:i:s');
    /*$query = "INSERT INTO receta (Titulo, Contenido, Multimedia, FechaPub, idAlum, Estatus)
              VALUES ('$titulo', '$cadenaBR', '$archivo', NOW(), '$id', 0);";*/

    $query = "UPDATE receta SET Titulo = '$titulo', Contenido = '$cadenaBR', Multimedia = '$archivo'
     ,FechaPub = now() WHERE idRec = '$idRec'";

    $execute = mysqli_query($enlace, $query);
    if ($execute) {
       echo '<script>alert("Receta actualizada con exito");
            window.location = "../VISTA/recetas.php";</script>';
    } else {
       echo '<script>alert("Error al actualizar la receta, inténtelo de nuevo");
            window.location = "../VISTA/recetas.php";</script>';
    }
    mysqli_close($enlace);
} else {
    echo '<script>alert("Error al procesar el formulario de publicación.");
            window.location = "../VISTA/recetas.php";</script>';
}
?>