<?php 
    session_start();
    include 'controlador_conexion.php';

    $corre = $_SESSION['usuario'];

    if(isset($_POST['btnGuardar'])){
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $con = $_POST['password'];
        $gen = $_POST['genero'];

        $contraEncrip = password_hash($pass, PASSWORD_DEFAULT);

        mysqli_query($enlace, "UPDATE coordinador SET nom = '$nom', ape = '$ape', 
        password = '$con', sexo = '$gen' WHERE cor = '$corre'");
            if($sql == true){
                echo '<script>alert("Cambios realizados");
                window.location = "../VISTA/perfil.php";</script>';
                header("location: ../VISTA/perfil.php");
            }else{
                echo '<script>alert("Fallo");
                window.location = "../VISTA/perfil.php";</script>';
                header("location: ../VISTA/perfil.php");
            } 
    }

    if(isset($_POST['btnEliminar'])){
        mysqli_query($enlace, "DELETE FROM coordinador WHERE cor = '$corre'");
            if($sql == true){
                echo '<script>alert("Cambios realizados");
                window.location = "../VISTA/sesion.php";</script>';
                header("location: ../VISTA/sesion.php");
            }else{
                echo '<script>alert("Fallo");
                window.location = "../VISTA/perfil.php";</script>';
                header("location: ../VISTA/perfil.php");
            }
    }
?>