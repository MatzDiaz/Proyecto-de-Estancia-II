<?php
    include 'controlador_conexion.php';

    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $corre = $_POST['correo'];
    $pass = $_POST['password'];
    $fena = $_POST['fecha_nacimiento'];
    $sexo = $_POST['genero'];
    
    // Verificar que el correo no se repita
        $verificaCorreo = mysqli_query($enlace, "SELECT * FROM coordinador WHERE cor = '$corre'");
        if (mysqli_num_rows($verificaCorreo) > 0) {
            echo '<script>alert("Correo ya registrado");
            window.location = "../VISTA/administrarCoor.php";
            </script>';
            //header("Location: registro.php");
            exit();
        }
    
        // Insertar registro en la base de datos
        $contraEncrip = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO coordinador (nom, ape, cor, password, fecha, sexo)
        VALUES ('$nom', '$ape', '$corre', '$contraEncrip', '$fena', '$sexo')";
    
        $ejecutar = mysqli_query($enlace, $query);
    
        if ($ejecutar) {
            echo '<script>alert("Usuario registrado");
            window.location = "../VISTA/administrarCoor.php;</script>';
        } else {
            echo '<script>alert("Usuario no registrado, inténtelo de nuevo");
            window.location = "../VISTA/administrarCoor.php";</script>';
        }
        mysqli_close($enlace);
    
?>