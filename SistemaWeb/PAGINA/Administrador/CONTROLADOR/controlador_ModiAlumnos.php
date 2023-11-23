<?php
    include 'controlador_conexion.php';
    
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $corre = $_POST['correo'];
        $pass = $_POST['password'];
        $fena = $_POST['fecha_nacimiento'];
        $sexo = $_POST['genero'];
    
            $contraEncrip = password_hash($pass, PASSWORD_DEFAULT);

            $sql = mysqli_query($enlace, "UPDATE alumno SET nombre = '$nom',
             apellido = '$ape', contra = '$contraEncrip', genero = '$sexo' WHERE correo = '$corre'");
            if($sql == true){
                echo '<script>alert("Cambios realizados");
                window.location = "../VISTA/administrarAlum.php";</script>';
            }else{
                echo '<script>alert("Fallo");
                window.location = "../VISTA/administrarAlum.php";</script>';
            }
?>