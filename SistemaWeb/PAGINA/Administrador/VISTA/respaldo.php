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
        
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-4">Restaurar Base de Datos</h1>
                    <form action="../CONTROLADOR/controlador_restauracion.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="archivo" class="form-label">Selecciona un archivo SQL:</label>
                            <input type="file" class="form-control" id="archivo" name="archivo" accept=".sql">
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary" value="Restaurar Base de Datos">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <p id="status"></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
