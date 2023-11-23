<?php include 'header_alum.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mis recetas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/css/bootstrap.min.css">
    <style>
        /* Personaliza el contorno del formulario */
        .custom-form {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
        }

        /* Reduce el tamaño del espacio y la fuente */
        .custom-form .form-label,
        .custom-form .form-control {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .custom-form .form-control {
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <?php   
        include '../CONTROLADOR/controlador_conexion.php';
        //obtener el id
        $correo = $_SESSION['usuario'];
        $sql = "SELECT idAlum FROM alumno WHERE correo = '$correo';";
        $result = mysqli_query($enlace, $sql);
        $row = mysqli_fetch_assoc($result);
        $id = $row['idAlum'];
        //consulta para mostrar recetas
        $sql = ("SELECT idRec, Titulo, FechaPub, Contenido, Multimedia, Nombre 
        FROM receta INNER JOIN alumno on receta.idAlum = alumno.idAlum");
        $consulta = mysqli_query($enlace, $sql);
        while($datos=$consulta->fetch_object()) {?>
        <div class="container mt-4  border mt-3 p-3">
         <div class="row">
        <!-- Nombre del alumno -->
        <input name="recet" value="<?=$datos->idRec?>" hidden></input>
        <div class="col-6">
            <?="<h2>$datos->Nombre</h2>";?>
        </div>
    </div>


    <!-- Fecha -->
    <div class="row mt-2">
        <div class="col">
                <?= "<p>$datos->FechaPub</p>" ?>
        </div>
    </div>

    <!-- Título de la publicación -->
    <div class="row mt-2">
        <div class="col">
            <?= "<center><h3>$datos->Titulo</h3></center>"?>
        </div>
    </div>

    <!-- Contenido -->
    <div class="row mt-2">
        <div class="col">
            <?="<p>$datos->Contenido</p>"?>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-8">
            <img src="<?= $datos->Multimedia ?>" alt="Imagen de la publicación" class="img-fluid">
        </div>
        <div class="col-4">
            <p>Comentarios</p>
            <?php 
                $idReceta = $datos->idRec;
                $sql = $enlace->query("SELECT Comentario, Nombre
                        FROM receta 
                        INNER JOIN comentario ON receta.idRec = comentario.idRec 
                        INNER JOIN alumno ON alumno.idAlum = comentario.idAlum
                        WHERE receta.idRec = '$idReceta'");
                
                if ($sql) {
                    while ($datosComentario = $sql->fetch_object()) {
                        echo '<div class="container">';
                        echo '    <div class="row">';
                        echo '        <div class="col-2">';
                        echo '<i class="fas fa-user" style="font-size: 24px;"></i><img src="../../../IMG/p2.png" alt="Avatar" style="width: 48px; height: 48px;">';
                        echo '        </div>';
                        echo '        <div class="col-10">';
                        echo "            <!-- Nombre de usuario -->";
                        echo "            <h5>$datosComentario->Nombre</h5>";
                        echo "            <!-- Sección con texto -->";
                        echo "            <p>$datosComentario->Comentario</p>";
                        echo '        </div>';
                        echo '    </div>';
                        echo '</div>';
                    }
                }
            ?>
            <!-- Botón de comentar -->
            <form action="../CONTROLADOR/controlador_subCom.php" method="POST">
                <input type="text" name="comentario"></input>
                <button type="submit" class="btn btn-primary bg-info">Agregar</button>
            </form>    
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <!-- Opción para calificar -->
            <div class="d-flex align-items-center">
                <p class="me-2">Calificar:</p>
            </div>
            
        </div>
    </div>
</div>
    <?php }?>
</body>
</html>