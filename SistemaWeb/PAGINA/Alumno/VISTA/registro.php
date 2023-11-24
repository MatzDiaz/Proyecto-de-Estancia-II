<!DOCTYPE html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
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
<div class="container w-85 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
        </div>
        <div class="col bg-white pd-5 rounded-end">
            <div class="container">
                <div class="row">
                    <div class="col-12 alig-items-right">
                        <img src="../../../IMG/logo.png" class="logo" width=50>
                    </div>
                </div>
            </div>
        <div class="text-center pd-top-5">
            <img src="../../../IMG/logo.png" width="70">
        </div>
            <h2 class="fw-bold text-center py-5">ALUMNO</h2>
                <!--formulario-->
            <form action="../CONTROLADOR/controlador_registro.php" method="POST" class="was-validated">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required autofocus>
                    <div class="valid-feedback" id="nameFeedback" placeholder="Nombre"></div>
                    <div class="invalid-feedback" id="nameFeedback">Nombre vacio</div>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" placeholder="Apellido" name="apellido" required>
                    <div class="invalid-feedback" id="apellidoFeedback"></div>
                    <div class="valid-feedback" id="lastFeedback"></div>
                    <div class="invalid-feedback" id="lastFeedback">Apellido vacio</div>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" class="form-control" id="email" placeholder="Correo electrónico" name="email" oninput="validarCorreo()" required>
                    <div class="valid-feedback" id="emailFeedback"></div>
                    <div class="invalid-feedback" id="emailFeedback">Correo vacio</div>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password" required>
                    <div class="valid-feedback" id="passwordFeedback"></div>
                    <div class="invalid-feedback" id="passwordFeedback">Contraseña vacia</div>
                </div>
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" oninput="validarFechaNacimiento()" required>
                    <div class="valid-feedback" id="dateFeedback"></div>
                    <div class="invalid-feedback" id="dateFeedback">Fecha vacia</div>
                </div>
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select class="form-control" id="genero" name="genero">
                        <option>Masculino</option>
                        <option>Femenino</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class=" d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary w-50">LISTO!</button>
                </div>
            </form>
        </div>
    </div>
        <script>
            function validarCorreo() {
                var correo = document.getElementById("email").value;
                var reCorreo = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
                if (!reCorreo.test(correo)) {
                    document.getElementById("emailFeedback").textContent = "El correo electrónico no es válido";
                } else {
                    document.getElementById("emailFeedback").textContent = "";
                }
            }

            function validarFechaNacimiento() {
                var fechaNacimiento = document.getElementById("fecha_nacimiento").value;
                var fechaNacimientoDate = new Date(fechaNacimiento);
                var hoy = new Date();
                var edad = hoy.getFullYear() - fechaNacimientoDate.getFullYear();
                if (edad < 18) {
                    document.getElementById("dateFeedback").textContent = "Debes tener al menos 18 años para registrarte";
                } else {
                    document.getElementById("dateFeedback").textContent = "";
                }
            }
        </script>
</body>