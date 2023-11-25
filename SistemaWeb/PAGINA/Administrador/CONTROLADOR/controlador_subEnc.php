<?php
session_start();
include 'controlador_conexion.php';
//Obtener los datos para la encuesta
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nivel_satisfaccion'])) {
        $p1 = $_POST['nivel_satisfaccion'];
    }

    if (isset($_POST['comentarios'])) {
        $comentarios = $_POST['comentarios'];
    }

    //obtener identificador alumno
    $cor = $_SESSION['usuario'];

    $sql = "SELECT IdAlum FROM alumno WHERE correo = '$cor'";
    $resultado = mysqli_query($enlace, $sql);
    $fila = mysqli_fetch_assoc($resultado);
    $idAlumno = $fila['IdAlum'];

    echo $p1 ."\n identidicador".$idAlumno;

    //obtener los identificadores para encuensta y respuesta 
    $sqlid = "SELECT Encuesta.idEnc AS Encuesta, Respuesta.idRes AS Respuesta from asignar
    INNER JOIN encuesta ON encuesta.idEnc = asignar.idEnc
    INNER JOIN respuesta ON respuesta.idAsig = asignar.idAsig 
    WHERE idAlum = '$idAlumno'";

    $resultadoI = mysqli_query($enlace, $sqlid);
    $fila = mysqli_fetch_assoc($resultadoI);
    $idEnc = $fila['Encuesta'];
    $idRes = $fila['Respuesta'];

    echo $idEnc . " " .$idRes;

    $sqlue = "";
    $excute = mysqli_query($enlace, $sqlue);

    if($excute){
        $sqlur = "";
    }else{
        echo "error encuesta";
    }
}

?>