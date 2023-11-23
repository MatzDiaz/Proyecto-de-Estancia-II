<?php include 'header.php'; ?>
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

        .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        }

        .star {
        display: inline-block;
        font-size: 24px;
        cursor: pointer;
        }

        .star:hover,
        .star.active {
        color: orange;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <!-- Formulario de crear una nueva receta -->
        <h4>Nueva Publicación</h4>
        <form action="../CONTROLADOR/controlador_subirRe.php" method="post" enctype="multipart/form-data" class="custom-form">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título de la Publicación:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <textarea class="form-control resizable-textarea" id="contenido" name="contenido" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Multimedia (Arrastra y suelta imágenes aquí):</label>
                <input type="file" class="form-control" id="multimedia" name="imagen" multiple accept="image/*" >
            </div>
            <input type="hidden" id="fecha" name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const multimediaInput = document.getElementById('multimedia');
        
        multimediaInput.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        multimediaInput.addEventListener('drop', (e) => {
            e.preventDefault();
            const files = e.dataTransfer.files;
        });
    </script>

    <!--Obtener las recetas-->
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
        FROM receta INNER JOIN alumno on receta.idAlum = alumno.idAlum WHERE receta.idAlum = $id");
        $consulta = mysqli_query($enlace, $sql);
        while($datos=$consulta->fetch_object()) {?>
        <div class="container mt-4  border mt-3 p-3">
         <div class="row">
        <!-- Nombre del alumno -->
        <input name="recet" value="<?=$datos->idRec?>" hidden></input>
        <div class="col-6">
            <?="<h2>$datos->Nombre</h2>";?>
        </div>
        <!-- Menú de tres puntos -->
        <div class="col-6 text-end">
            <div class="btn-group">
                <button type="button" class="btn btn-primary bg-white text-black" data-bs-toggle="modal" data-bs-target="#mdEliminar<?=$datos->idRec?>">Eliminar</button>
                <button type="button" class="btn btn-primary bg-white text-black" data-bs-toggle="modal" data-bs-target="#mdEditar<?=$datos->idRec?>">Editar</button>
            </div>
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

    <!--Parte de la imagen-->
    <div class="row mt-2">
        <div class="col-8">
            <img src="<?= $datos->Multimedia ?>" alt="Imagen de la publicación" class="img-fluid">
        </div>
        <div class="col-4">
            <!--Comentarios-->
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
                <input name="receta" hidden value="<?=$datos->idRec?>"></input>
                <button type="submit" class="btn btn-primary bg-info">Agregar</button>
            </form>    
        </div>
    </div>

    <div class="row mt-2">
        <div class="col">
            <!-- Opción para calificar -->
            <div class="d-flex align-items-center">
                <p class="me-2">Calificar:</p>
                <div class="rating">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
                <input type="hidden" name="rating-value" id="rating-value" value="0">
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal eliminar -->
    <form action="../CONTROLADOR/controlador_EliRecetas.php" method="POST">
            <div class="modal fade" id="mdEliminar<?=$datos->idRec?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmaci&oacute;n</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" id="receta" name="receta" value="<?= $datos->idRec?>" hidden>
                        <p>Desea eliminar la receta <?=$datos->Titulo?> definitivamente</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary bg-danger" name="btnEliminar">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal editar -->
        <form action="../CONTROLADOR/controlador_EliCoor.php" method="POST">
            <div class="modal fade" id="mdEditar<?=$datos->idRec?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevos datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título de la Publicación:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$datos->Titulo?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="contenido" class="form-label">Contenido:</label>
                            <textarea class="form-control resizable-textarea" id="contenido" name="contenido" required value="<?=$datos->Contenido?>"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Multimedia (Arrastra y suelta imágenes aquí):</label>
                            <input type="file" class="form-control" id="multimedia" name="imagen" multiple accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary bg-success" name="btnGuardar">Guardar</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
    <?php }?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        const stars = document.querySelectorAll(".star");
        const ratingValue = document.getElementById("rating-value");

        stars.forEach((star) => {
            star.addEventListener("click", function () {
            const rating = this.getAttribute("data-rating");
            ratingValue.value = rating;

            stars.forEach((s) => {
                if (s.getAttribute("data-rating") <= rating) {
                s.classList.add("active");
                } else {
                s.classList.remove("active");
                }
            });
            });
        });
        });
    </script>
</body>
</html>