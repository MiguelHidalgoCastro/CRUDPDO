<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="assets/favicon.ico" rel="icon" type="image/x-icon" />
    <title>CRUD PDO</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg mb-5">
        <a class="navbar-brand ms-2 mx-5">CRUD PDO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=categoria">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=reto&a=index">Retos disponibles</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Mis Retos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?c=reto&a=add">Añadir Reto</a></li>
                        <li><a class="dropdown-item text-uppercase text-primary" href="?c=reto&a=listarporprofesor">Mis Retos</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">Sesion</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?c=sesion&a=formadd">Crear Usuario</a></li>
                        <li><a class="dropdown-item" href="?c=sesion&a=cerrarsesion">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
            <span class="navbar-text mx-5"><?php echo $profesor != null ? 'Bienvenido, ' . $profesor->nombre : 'Estoy en INDEX'; ?></span>
        </div>
    </nav>