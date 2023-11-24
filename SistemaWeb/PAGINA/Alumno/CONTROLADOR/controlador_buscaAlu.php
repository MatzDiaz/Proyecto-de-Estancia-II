<div class="container mt-4">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="d-flex" method="POST">
        <input class="form-control me-2" type="search" name="correo" placeholder="Correo del alumno a buscar..." aria-label="Search">
        <button class="btn btn-outline-primary" type="submit" name="buscar">Buscar</button>
    </form>

    <?php
    include 'controlador_conexion.php';
    // Verificar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["buscar"])) {
        $correo = $_POST["correo"];

        $sql = "SELECT idAlum, nombre, apellido, fechaNa, correo, genero FROM alumno WHERE correo = '$correo'";
        $result = $enlace->query($sql);

        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {
                echo "<p>ID: " . $data['idAlum'] . "</p>";
                echo "<p>Nombre: " . $data['nombre'] . "</p>";
                echo "<p>Apellido: " . $data['apellido'] . "</p>";
                echo "<p>Correo: " . $data['correo'] . "</p>";
                echo "<p>Fecha de Nacimiento: " . $data['fechaNa'] . "</p>";
                echo "<p>Género: " . $data['genero'] . "</p>";
            }
        } else {
            echo "<p>No se encontraron resultados para el correo: $correo</p>";
        }
        $enlace->close();
    }
    ?>
    <form action="controlador_asignar.php" method="POST">
        <input value="<?=$data['idAlum']?>" name="idAlum" hidden></input>
        <button type="submit" class="btn btn-primary bg-info">Asignar encuesta</button>
    </form>
</div>
