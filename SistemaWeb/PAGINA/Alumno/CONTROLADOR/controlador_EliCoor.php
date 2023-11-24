<?php
    include 'controlador_conexion.php';
    $corre = $_POST['correo'];

        $sql = mysqli_query($enlace, "DELETE FROM coordinador WHERE correo = '$corre'");
        if($sql == true){
            echo '<script>alert("Cambios realizados");
            window.location = "../VISTA/administrarCoor.php";</script>';
       }else{
            echo '<script>alert("Fallo");
            window.location = "../VISTA/administrarCoor.php";</script>';
        }
    
?>