<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrapValidator.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Cabecera redirect index php htdocs -->
    <title><?php echo $titulo;?></title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../home/index.php">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/nuevaPersona.php">Nueva persona</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../pages/listarPersonas.php">Listar personas</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../pages/modificarPersona.php">Modificar persona</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../pages/eliminarPersona.php">Eliminar persona</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main role="main">
            <?php
            include_once '../../configuracion.php';
            ?>
        </main>
    </header>