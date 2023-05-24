<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href=css/users.css>
    <link rel="shortcut icon" href="images/R.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a><img src="images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content">
                <div class="left">
                    <ul class="nav-links">
                        <li><a href="#">Horarios</a></li>
                        <li><a href="labs.php">Laboratorios</a></li>
                    </ul>
                </div>
                <div class="right">
                    <ul class="nav-links">
                        <li><a href="reportar.php">Generar reporte</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <a href="db/controler_close_session.php" class="btn"><button class="btn btn-rounded">Cerrar sesión</button></a>
    </header>
    <div class="contenedor col-xs-12 col-sm-12 col-md-12">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $msg . '
                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
              </div>';
        }
        ?>
    </div>


</body>

</html>