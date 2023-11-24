<?php include 'headerA.php'?>
<!DOCTYPE html>
<html lang="en"> 
<head>  
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            font-family: 'Times New Roman', Times, serif;
        }

        .navbar-nav .nav-link {
            font-size: 16px;
        }
    </style>
</head> 
<body> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="container w-50" >
        <form action=   "../CONTROLADOR/controlador_opPerfil.php" method="POST" class="was-validated">
            <h2>Perfil de usuario</h2>
            <?php   
                //session_start();
                include '../CONTROLADOR/controlador_perfil.php';
            ?>
            <div class="mb-3 mt-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nom?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre no puede estar vacio</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $ape?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El apellido no puede estar vacio</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $cor?>" disabled >
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre no puede estar vacio</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" value="<?php echo $con?>" name="password">
                <div class="valid-feedback" id="passwordFeedback"></div>
                <div class="invalid-feedback" id="passwordFeedback">Contraseña vacia</div>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fe?>" disabled>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">La fecha no puede estar vacio</div>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero" value="<?php echo $gen?>">
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Otro</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary bg-success" data-bs-toggle="modal" data-bs-target="#mdGuardar">Guardar</button>
            <button type="button" class="btn btn-primary bg-danger" data-bs-toggle="modal" data-bs-target="#mdEliminar">Eliminar</button>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
          <!-- Modal guardar -->
            <div class="modal fade" id="mdGuardar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmaci&oacute;n</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Desea guardar los cambios realizados</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                    <button type="submit" class="btn btn-primary bg-success" name="btnGuardar">Guardar cambios</button>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal eliminar -->
            <div class="modal fade" id="mdEliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmaci&oacute;n</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Desea eliminar su cuenta definitivamente</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                    <button type="submit" class="btn btn-primary bg-danger" name="btnEliminar">Eliminar cuenta</button>
                </div>
                </div>
            </div>
            </div>
        </form>
    </div>
</body>