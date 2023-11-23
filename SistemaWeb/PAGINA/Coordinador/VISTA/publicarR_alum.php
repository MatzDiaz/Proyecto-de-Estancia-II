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
<div class="container mt-5">
        <h4>Nueva Publicación</h4>
        <form action="../CONTROLADOR/controlador_publiAlu.php" method="post" enctype="multipart/form-data" class="custom-form">
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
                <input type="file" class="form-control" id="multimedia" name="multimedia[]" multiple accept="image/*" required>
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
</body>
</html>
