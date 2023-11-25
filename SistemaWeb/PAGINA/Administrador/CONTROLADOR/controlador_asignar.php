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
    echo $maxID ." ".$idA;

    $sql = "INSERT INTO encuesta (idEnc) VALUES ('$maxID')";
    $execute = mysqli_query($enlace, $sql);

    if($execute){
        echo "good";
        $sqlA = "INSERT INTO asignar (fechaEn,idAlum, idEnc) VALUES (NOW(), '$idA', '$maxID')";
        $executeA = mysqli_query($enlace, $sqlA);
        if($execute){
            echo "excelente";
            $sql = "SELECT MAX(idAsig) AS max_id FROM asignar";
            $result = $enlace->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $maxIDA = $row["max_id"];
            } else {
                $maxIDA = 0;
            }

            $sqlR = "INSERT INTO respuesta (idAsig) VALUES ('$maxIDA')";
            $executeR = mysqli_query($enlace, $sqlR);
            if($executeR){
                echo "<script> alert('Encuesta asignada');
                window.location='../VISTA/encuesta.php'</script>";
            }else{
                echo "<script> alert('Error en la asignación');
                window.location='../VISTA/encuesta.php'</script>";
            }
        }else{
            echo "<script> alert('Error en la asignacón');
                window.location='../VISTA/encuesta.php'</script>";
        } 
    }else{
        echo "<script> alert('Error en la creación de encuesta');
                window.location='../VISTA/encuesta.php'</script>";
    }

?>