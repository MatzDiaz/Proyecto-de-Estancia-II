<?php include '../CONTROLADOR/controlador_verifiaSes.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
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

<!--Menu-->
        <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand"><img src="../../../IMG/usuario.png" width=40 >Coordinador</a>
            <input type="text" readonly class="form-control-plaintext" id="correo" value="<?php 
            $cor = $_SESSION['usuario'];
            echo "$cor"; ?>">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <!--Barra de navegacion-->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <img src="../../../IMG/logo.png" alt="Logo" width="40" height="30" class="d-inline-block"><h5 class="offcanvas-title" id="offcanvasNavbarLabel">noncore</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-left flex-grow-1 pe-1">
                <li class="nav-item  mb-50">
                <a class="navbar-brand" aria-current="page" href="principal.php">
                    <img src="../../../IMG/casa.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Inicio</a>
                </li>
                <br>
                <li class="nav-item">
                    <a class="navbar-brand" aria-current="page" href="recetas.php"><img src="../../../IMG/receta.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Mis recetas</a>
                </li>
                <br>
                <li class="nav-item">
                <a class="navbar-brand" aria-current="page" href="encuesta.php"><img src="../../../IMG/lista.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Encuestas</a>
                </li>
                <br>
                <li class="nav-item">
                <a class="navbar-brand" aria-current="page" href="AdmRecetas.php"><img src="../../../IMG/aceptar.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Aprobar recetas</a>
                </li>
                <br>
                <li class="nav-item">
                <a class="navbar-brand" aria-current="page" href="perfil.php"><img src="../../../IMG/sugerencia.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                   Mi informacion</a>
                </li>
                <li>
                    <br>
                    <br>
                    <br>
                    <br>
                    <form action="../CONTROLADOR/controlador_cerrar.php" method="post">
                        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </div>
    <!--Barra busqueda-->
    <form class="d-flex ms-auto" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">
                <img src="../../../IMG/buscar.png" width="40" alt="Buscar">
            </button>
        </form>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntXw/XNdnjGP9l8gpgjjyl/5DmkUuHg/V48L+xnDJFdLVUvQpU2jPZzf+dPp2t4N+KDp6r2gNg00tJKmDc1X4TfPtK413qV2D2O2Tp/0/CnqmJszLfUz" crossorigin="anonymous"></script>
</body>
</html>

