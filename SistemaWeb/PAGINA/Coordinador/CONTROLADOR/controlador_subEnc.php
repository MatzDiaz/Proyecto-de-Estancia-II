<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nivel_satisfaccion'])) {
        $nivel_satisfaccion = $_POST['nivel_satisfaccion'];
        // Aquí puedes utilizar $nivel_satisfaccion según tus necesidades
    }
    if (isset($_POST['comentarios'])) {
        $comentarios = $_POST['comentarios'];
        // Aquí puedes utilizar $comentarios según tus necesidades
    }
    // Procesa los datos del formulario
}

?>