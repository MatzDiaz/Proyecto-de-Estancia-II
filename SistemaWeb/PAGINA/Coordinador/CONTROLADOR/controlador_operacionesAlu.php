<?php 
    session_start();
    include 'controlador_conexion.php';

    $corre = $_SESSION['usuario'];

    $consulta = mysqli_query($enlace, "SELECT nombre, apellido, correo, contra, fechana, genero FROM alumno WHERE correo = '$corre'");

    while($data = $consulta->fetch_assoc()){
        $nom = $data['nombre'];
        $ape = $data['apellido'];
        $cor = $data['correo'];
        $con = $data['contra'];
        $fe = $data['fechana'];
        $gen = $data['genero'];
    }

    if(isset($_POST['btnGuardar'])){
        if(isset($_POST['btnGuardar'])){
            $nom = $_POST['nombre'];
            $ape = $_POST['apellido'];
            $con = $_POST['password'];
            $gen = $_POST['genero'];
    
            $contraEncrip = password_hash($pass, PASSWORD_DEFAULT);

            mysqli_query($enlace, "UPDATE alumno SET nombre = '$nom', apellido = '$ape', 
            contra = '$con', genero = '$gen' WHERE correo = '$corre'");
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
    }

    if(isset($_POST['btnEliminar'])){
        mysqli_query($enlace, "DELETE FROM alumno WHERE correo = '$corre'");
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