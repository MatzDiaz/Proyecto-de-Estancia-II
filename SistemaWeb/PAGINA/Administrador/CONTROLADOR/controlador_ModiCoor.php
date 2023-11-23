<?php
    include 'controlador_conexion.php';

    $nom = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $corre = $_POST['correo'];
    $pass = $_POST['password'];
    $fena = $_POST['fecha_nacimiento'];
    $sexo = $_POST['genero'];

    // Cifrar la contraseña
    $contraEncrip = password_hash($pass, PASSWORD_DEFAULT);

    // Utilizar $contraEncrip en la consulta SQL
    $sql = "UPDATE coordinador SET nom = '$nom', ape = '$ape', 
            password = '$contraEncrip', sexo = '$sexo', fecha = '$fena' WHERE cor = '$corre'";
    $execute = mysqli_query($enlace, $sql);

    if ($execute) {
        echo '<script>alert("Cambios realizados");
                window.location = "../VISTA/administrarCoor.php";</script>';
    } else {
        echo '<script>alert("Fallo");
                window.location = "../VISTA/administrarCoor.php";</script>';
    }
?>
