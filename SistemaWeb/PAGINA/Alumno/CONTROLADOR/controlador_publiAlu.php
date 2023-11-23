<?php
session_start();
include 'controlador_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cont = $_POST['contenido'];
    $titulo = $_POST['titulo'];
    
    $sql = "SELECT idAlum FROM alumno WHERE correo = '$_SESSION';";

    $id = mysqli_query($enlace, $sql);
    //subir archivos
    $destino = '../../../IMG/';  //ruta destino
    $archivo = $_FILES['multimedia']['tmp_name']; // nombre archivo subido
    $nombreImg = $_FILES['multiimedia']['name'];

    $destino = $destino."/".$nombreImg;
    move_uploaded_file($archivo, $destino);
    /*if (isset($_FILES['multimedia']) && $_FILES['multimedia']['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($_FILES['multimedia']['tmp_name'], $destino . $archivo)) {
            echo 'El archivo se ha subido y movido correctamente.';
        } else {
            echo 'Hubo un error al mover el archivo.';
        }
    } else {
        echo 'Hubo un error al subir el archivo.';
    }*/
    echo "$titulo $cont $destino $id". date('Y-m-d H:i:s');
    $query = "INSERT INTO receta (titulo, contenido, multimedia, fechapub, estatus, idalum)
    VALUES ('$titulo', '$cont', '$archivo', date('Y-m-d H:i:s'), 0, '$id');";
    $execute = mysqli_query($enlace, $query);
    if ($execute) {
        echo "good";
        /*echo '<script>alert("Receta enviada");
        window.location = "../VISTA/publicarR_alum.php";</script>';
        header("location: ../VISTA/publicarR_alum.php");*/
    } else {
        echo "bad";
        /*echo '<script>alert("Receta no enviada");
        window.location = "../VISTA/publicarR_alum.php";</script>';*/
    }
    mysqli_close($enlace);

    // header("Location: ../VISTA/principal_alum.php");
    // exit();
} else {
    echo "Error al procesar el formulario de publicación.";
}
?>