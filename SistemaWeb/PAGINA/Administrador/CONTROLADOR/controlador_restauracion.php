<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
    include 'controlador_conexion.php';

    $archivo_nombre = $_FILES['archivo']['name'];
    $archivo_tmp = $_FILES['archivo']['tmp_name'];

    $sql = file_get_contents($archivo_tmp);

    if ($enlace->multi_query($sql) === TRUE) {
        echo "Base de datos restaurada correctamente";
    } else {
        echo "Error al restaurar la base de datos: " . $enlace->error;
    }

    $enlace->close();
}

?>
