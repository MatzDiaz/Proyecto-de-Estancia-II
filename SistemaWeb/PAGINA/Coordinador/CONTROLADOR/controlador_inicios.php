<?php
session_start();
include 'controlador_conexion.php';

$correo = $_POST['email']; 
$pass = $_POST['password'];

$stmt = mysqli_prepare($enlace, "SELECT cor, Password FROM coordinador WHERE cor = ?");
mysqli_stmt_bind_param($stmt, "s", $correo);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($resultado)) { //verifica que el correo exista
    $passEncry = $row['Password'];

    echo "$pass"." "."$passEncry";

    if (password_verify($pass, $passEncry)) { //se utiliza para verificar que las password sean idénticas
        $_SESSION['usuario'] = $correo;
        $_SESSION['loggin'] = true;
        header("Location: ../VISTA/principal.php");
        exit();
    }
}

// en caso de no encontrar coincidencias, muestra lo siguiente
echo '<script> 
    alert("Usuario o Contraseña incorrectos");
    window.location = "../VISTA/sesion.php";
</script>';

mysqli_stmt_close($stmt);
mysqli_close($enlace);
?>
