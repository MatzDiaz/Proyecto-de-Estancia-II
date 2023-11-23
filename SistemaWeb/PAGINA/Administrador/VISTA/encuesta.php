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

<div class="container mt-5">
    <h2 class="mb-4">Encuesta de Satisfacción</h2>

    <form>
        <div class="mb-3">
            <label for="satisfaccion" class="form-label">¿Qué tan satisfecho estás con nuestro servicio?</label>
            <div class="btn-group" role="group" aria-label="Nivel de Satisfacción">
                <button type="button" class="btn btn-outline-primary">Muy Insatisfecho</button>
                <button type="button" class="btn btn-outline-primary">Insatisfecho</button>
                <button type="button" class="btn btn-outline-primary">Neutral</button>
                <button type="button" class="btn btn-outline-primary">Satisfecho</button>
                <button type="button" class="btn btn-outline-primary">Muy Satisfecho</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios adicionales:</label>
            <textarea class="form-control" id="comentarios" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Encuesta</button>
    </form>
</div>

<?php include'../CONTROLADOR/controlador_buscaAlu.php'; ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
