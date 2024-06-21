<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet-Stylo</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/david/css/styles.css">
    
    <style>
        /* .bg{
            background-image: url(assets/david/img/imgLogin.jpg);
            background-position: center center;
            background-repeat: no-repeat;
        } */

        /* .login{
            background: linear-gradient(#70d0df, #e2e2e2, #70d0df);
        } */
        footer{
            background-color: #70d0df;
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-sm fondoHeader w-100">
        <div class="container-fluid">
            <!--Icono-->
            <a class="navbar-brand" href="?">
                <img class="logo" src="assets/david/img/logo sin fondo.png" alt="">
            </a>
            <!--Icono menu-->
            <button style="background-color: #ee8133;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Elementos del menu colapsable-->
            <div style="background-color: #70d0df;" class="collapse navbar-collapse rounded p-4" id="menu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Citas</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="background-color: #ee8133;" class="btn nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown">Horarios</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item">Lunes a Viernes: 8:00am a 6:00pm</li>
                            <li class="dropdown-item">Sabados y Domingos: 11:00am a 4:00pm</li>
                        </ul>
                    </li>
                </ul>   
                <a class="d-flex ms-auto" href="index.php?controller=Users&action=mostrarFormularioLogin">Iniciar Sesión</a>
            </div>
        </div>
    </header>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>