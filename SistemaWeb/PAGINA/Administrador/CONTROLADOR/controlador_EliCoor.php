<?php
    include 'controlador_conexion.php';
    $corre = $_POST['correo'];

        $sql = mysqli_query($enlace, "DELETE FROM alumno WHERE correo = '$corre'");
        if($sql == true){
            echo '<script>alert("Cambios realizados");
            window.location = "../VISTA/administrarAlum.php";</script>';
       }else{
            echo '<script>alert("Fallo");
            window.location = "../VISTA/administrarAlum.php";</script>';
        }
    
?>