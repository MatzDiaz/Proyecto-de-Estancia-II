<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Copia de Seguridad de la Base de Datos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4">Copia de Seguridad de la Base de Datos</h1>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <form action="../CONTROLADOR/controlador_backup.php" method="post">
                    <button type="submit" name="backup" class="btn btn-primary">Crear Copia de Seguridad</button>
                </form>
            </div>
        </div> 
        <form action="../CONTROLADOR/controlador_restauracion.php" method="post" enctype="multipart/form-data">
            <div class="row mt-5">
                <div class="col-12">
                    <h1>Restaurar Base de Datos</h1>
                </div>
            </div>
            <label for="archivo">Selecciona un archivo SQL:</label>
            <input type="file" name="archivo" id="archivo" accept=".sql">
            <br>
            <input type="submit" value="Restaurar Base de Datos">
        </form>

        <div class="row mt-3">
            <div class="col-12">
                <p id="status"></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
