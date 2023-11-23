<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOBYCAMP: Inicar sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/CSS/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" src="../CSS/styles.css">
    <style>
    body{
        background: #ffe259;
        background: linear-gradient(to right, #ffa751, #ffe259);
        font-family: 'Times New Roman', Times, serif;
    }

    .bg{
        background-image: url(../../../IMG/descargar.jpg);
        background-position: center center;
        background-repeat: no-repeat;
    }
    </style>
</head>
<body>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <div class="container w-85 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
            </div>
            <div class="col bg-white pd-5 rounded-end">
            <div class="container">
                <div class="row">
                        <div class="col-12 text-right">
                            <img src="../../../IMG/logo.png" class="logo" width="50">
                        </div>
                    </div>
                </div>
                <div class="text-center pd-top-5">
                    <img src="../../../IMG/logo.png" width="70">
                </div>
                <h2 class="fw-bold text-center py-5">Bienvenidos a <i>noncore</i></h2>
                <!--inicio-->
                <form action="../CONTROLADOR/controlador_inicios.php" method="POST">
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-email form-control" name="email" oninput="validarEmail(this);" onblur="validarEmail(this);" placeholder="user123@dominio.com" required autofocus>
                        <div class="invalid-feedback" id="emailFeedback"></div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-password form-control" name="password" oninput="validarPassword(this);" onblur="validarPassword(this);" required>
                        <div class="invalid-feedback" id="passwordFeedback"></div>
                    </div>

                    <div class="mb- 4 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary btn-rounded w-50">Iniciar sesión</button>
                    </div>
                    
                    <div class="my-3">
                        <p class="text-center">¿No tienes una cuenta? <a href="../VISTA/registro.php">Registrarse</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    function validarEmail(emailInput) {
        var email = emailInput.value;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (!re.test(email)) {
            document.getElementById("emailFeedback").textContent = "El correo electrónico no es válido.";
            emailInput.setCustomValidity("Correo no válido");
        } else {
            document.getElementById("emailFeedback").textContent = "";
            emailInput.setCustomValidity("");
        }
    }

    function validarPassword(passwordInput) {
        var password = passwordInput.value;

        if (password.trim() === "") {
            document.getElementById("passwordFeedback").textContent = "La contraseña no puede estar vacía.";
            passwordInput.setCustomValidity("Contraseña vacía");
        } else {
            document.getElementById("passwordFeedback").textContent = "";
            passwordInput.setCustomValidity("");
        }
    }
</script>
</body>
</html>  