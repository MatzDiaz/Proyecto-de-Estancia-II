<?php
    session_start();
    if(!isset($_SESSION['loggin'])){
        echo '<script>alert("Porfacor, inicie sesións");
            window.location = "../VISTA/sesion.php";
            </script>';
            $corre = $_SESSION['usuario'];

            $consulta = mysqli_query($enlace, "SELECT correo FROM alumno WHERE correo = '$corre'");
        
            while($data = $consulta->fetch_assoc()){
                $cor = $data['correo'];
            }   
    }
?>
