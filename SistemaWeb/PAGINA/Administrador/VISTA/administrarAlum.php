<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gesti&oacute;n de alumnos</title> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <title>Administrar alumnos</title>
    <script src="https://kit.fontawesome.com/4ac2beed8b.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="col-9 p-4">
    <table class="table">
        <thead class="bg-info">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">CORREO</th>
            <th scope="col">CONTRASENA</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th scope="col">GENERO</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include '../CONTROLADOR/controlador_conexion.php';
                $sql = $enlace->query("SELECT * FROM alumno");
                while($datos=$sql->fetch_object()) {?>
                    <tr>         
                        <td name="id"><?=$datos->idAlum?></td>
                        <td><?=$datos->Nombre?></td>
                        <td><?=$datos->Apellido?></td>
                        <td><?=$datos->Correo?></td>
                        <td><?=$datos->Contra?></td>
                        <td><?=$datos->FechaNa?></td>
                        <td><?=$datos->Genero?></td>
                        <td>
                            <button type="button"class="btn btn-primary bg-warning" data-bs-toggle="modal" data-bs-target="#mdGuardar<?=$datos->idAlum?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            <button type="button" class="btn btn-primary bg-danger" data-bs-toggle="modal" data-bs-target="#mdEliminar<?=$datos->idAlum?>"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>

        <!-- Modal eliminar -->
            <form action="../CONTROLADOR/controlador_EliAlumnos.php" method="POST">
            <div class="modal fade" id="mdEliminar<?=$datos->idAlum?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmaci&oacute;n</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form-control" id="correo" name="correo" value="<?= $datos->Correo?>" hidden >
                        <p>Desea eliminar al alumno <?=$datos->Nombre?> definitivamente</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary bg-danger" name="btnEliminar">Eliminar</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
        </div>

        <!-- Modal guardar -->
        <form action="../CONTROLADOR/controlador_ModiAlumnos.php" method="POST">
            <div class="modal fade" id="mdGuardar<?=$datos->idAlum?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3 mt-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->Nombre?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre no puede estar vacio</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $datos->Apellido?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El apellido no puede estar vacio</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="text" class="form-control" id="correo" name="correo" value="<?= $datos->Correo?>" required >
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre no puede estar vacio</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" value="<?= $datos->Contra?>" name="password">
                <div class="valid-feedback" id="passwordFeedback"></div>
                <div class="invalid-feedback" id="passwordFeedback">Contraseña vacia</div>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $datos->FechaNa?>" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">La fecha no puede estar vacio</div>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero" value="<?= $datos->Genero?>">
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Otro</option>
                </select>
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

        <!-- Modal  -->
        <form action="../CONTROLADOR/controlador_RegAlumnos.php" method="POST">
            <div class="modal fade" id="mdRegistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo alumno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="mb-3 mt-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre no puede estar vacio</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El apellido no puede estar vacio</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="text" class="form-control" id="correo" name="correo" required >
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">El nombre no puede estar vacio</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" required>
                <div class="valid-feedback" id="passwordFeedback"></div>
                <div class="invalid-feedback" id="passwordFeedback">Contraseña vacia</div>
            </div>
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">La fecha no puede estar vacio</div>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero">
                    <option>Masculino</option>
                    <option>Femenino</option>
                    <option>Otro</option>
                </select>
            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                        <button type="submit" class="btn btn-primary bg-success" name="btnRegistrar">Registrar</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
            <?php }?>
            <button type="button" class="btn btn-primary bg-info" data-bs-toggle="modal" data-bs-target="#mdRegistro">Registrar</button>

        </tbody>
        
    </table>
</div>
<div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>