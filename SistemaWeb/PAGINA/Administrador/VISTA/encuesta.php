<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Encuesta de Satisfacción</title>
</head>
<body>
<?php
    include '../CONTROLADOR/controlador_conexion.php';
    $cor = $_SESSION['usuario'];
    $sql = "SELECT COUNT(*) AS total_encuestas FROM asignar
    INNER JOIN Alumno on Asignar.idAlum = Alumno.idAlum
    WHERE Correo = '$cor'";
    $resultado = mysqli_query($enlace, $sql);

    if ($resultado) {
        $row = mysqli_fetch_assoc($resultado);
        $totalEncuestas = $row['total_encuestas'];

        if ($totalEncuestas > 0) {
          echo '<div class="container mt-5 w-50">
                <h2 class="mb-4">Encuesta de Satisfacción</h2>

                <form action="../CONTROLADOR/controlador_subEnc.php" method="POST">
                <div class="mb-3">
                    <label for="satisfaccion" class="form-label">¿Qué tan satisfecho estás con nuestro servicio?</label>
                    <select class="form-select" name="nivel_satisfaccion" aria-label="Nivel de Satisfacción">
                        <option value="1">Muy Insatisfecho</option>
                        <option value="2">Insatisfecho</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfecho</option>
                        <option value="5">Muy Satisfecho</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="satisfaccion" class="form-label">¿Qué tan satisfecho estás con nuestro servicio?</label>
                    <select class="form-select" name="recomendacion" aria-label="Nivel de Satisfacción">
                        <option value="Muy Insatisfecho">Muy Insatisfecho</option>
                        <option value="Insatisfecho">Insatisfecho</option>
                        <option value="Neutral">Neutral</option>
                        <option value="Satisfecho">Satisfecho</option>
                        <option value="Muy Satisfecho">Muy Satisfecho</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="satisfaccion" class="form-label">¿Qué tan satisfecho estás con nuestro servicio?</label>
                    <select class="form-select" name="accesibilidad" aria-label="Nivel de Satisfacción">
                        <option value="Muy Insatisfecho">Muy Insatisfecho</option>
                        <option value="Insatisfecho">Insatisfecho</option>
                        <option value="Neutral">Neutral</option>
                        <option value="Satisfecho">Satisfecho</option>
                        <option value="Muy Satisfecho">Muy Satisfecho</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="satisfaccion" class="form-label">¿Qué tan satisfecho estás con nuestro servicio?</label>
                    <select class="form-select" name="facilidad" aria-label="Nivel de Satisfacción">
                        <option value="Muy Insatisfecho">Muy Insatisfecho</option>
                        <option value="Insatisfecho">Insatisfecho</option>
                        <option value="Neutral">Neutral</option>
                        <option value="Satisfecho">Satisfecho</option>
                        <option value="Muy Satisfecho">Muy Satisfecho</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="satisfaccion" class="form-label">¿Qué tan satisfecho estás con nuestro servicio?</label>
                    <select class="form-select" name="mejora" aria-label="Nivel de Satisfacción">
                        <option value="1">Muy Insatisfecho</option>
                        <option value="2">Insatisfecho</option>
                        <option value="3">Neutral</option>
                        <option value="4">Satisfecho</option>
                        <option value="5">Muy Satisfecho</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="comentarios" class="form-label">Comentarios adicionales:</label>
                    <textarea class="form-control" id="comentarios" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Enviar Encuesta</button>
                </form>
            </div>';
        } else {
            echo '<h4 class="text-center">No hay encuestas disponibles.</h4>';
        }
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($enlace);
    }
?>

<?php include'../CONTROLADOR/controlador_buscaAlu.php'?>
<div class="container">
    <div class="col-9 p-4">
        <table class="table">
            <thead class="bg-info">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">FECHA</th>
                <th scope="col">ESTATUS</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include '../CONTROLADOR/controlador_conexion.php';
                $sql = $enlace->query("SELECT Asignar.idAsig, Nombre, Resultado, FechaEn FROM Asignar
                                    INNER JOIN Alumno ON alumno.idalum = asignar.idalum
                                    INNER JOIN Respuesta ON Respuesta.idAsig = Asignar.idAsig");
                while ($datos = $sql->fetch_object()) {
                    ?>
                    <tr>
                        <td name="id"><?= $datos->idAsig ?></td>
                        <td><?= $datos->Nombre ?></td>
                        <td><?= $datos->FechaEn ?></td>
                        <td>
                            <?php if ($datos->Resultado == 1) {
                                echo "Contestado";
                            } else {
                                echo "Pendiente";
                            } ?>
                        </td> 
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>