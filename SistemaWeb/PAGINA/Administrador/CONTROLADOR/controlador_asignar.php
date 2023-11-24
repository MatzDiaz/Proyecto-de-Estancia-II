<?php
    include 'controlador_conexion.php';

    $idA = $_POST['idAlum'];

    if(empty($idA)){
        echo '<script>alert("No hay alumno seleccionado");
            window.location = "../VISTA/encuesta.php";
            </script>';
            exit();
    }

    $sql = "SELECT MAX(idEnc) AS max_id FROM encuesta";
    $result = $enlace->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $maxID = $row["max_id"];
    } else {
        $maxID = 0;
    }
    $maxID = $maxID +1;

    $sql = "INSERT INTO encuesta (idEnc) VALUES ('$maxID')";
    $execute = mysqli_query($enlace, $sql);

    if($execute){
        echo "good";
    }else{
        echo "bad";
    }

    $sqlA = "INSERT INTO asignar (fechaEn,idAlum, idEnc) VALUES (NOW(), '$idA', '$maxID')";
    $executeA = mysqli_query($enlace, $sqlA);
    if($execute){
        echo "excelente";
    }else{
        echo "bueno se intento";
    }   
?>