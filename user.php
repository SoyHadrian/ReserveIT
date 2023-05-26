<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}
$id_usuario = $_SESSION["id"];
include "db/db_connection.php";
$sql = "SELECT asignacion.id_asignacion, asignacion.prioridad, asignacion.estado, usuario.nombre, reporte.titulo, reporte.laboratorio, reporte.reporta, reporte.descripcion, reporte.fecha
        FROM asignacion
        INNER JOIN usuario ON asignacion.id_usuario = usuario.id_usuario
        INNER JOIN reporte ON asignacion.id_reporte = reporte.id_reporte
        WHERE asignacion.id_usuario = $id_usuario AND asignacion.estado = 'En curso'";
$resultado = mysqli_query($connection, $sql);

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
    <link rel="stylesheet" href="css/users.css">
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
                        <!-- <li><a href="#">Horarios</a></li>-->
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
    <div class="container-fluid p-3" style="padding: 10px;">
        <div class="card text-center" style="width: auto;">
            <div class="card-body">
                <h5 class="card-title">ReserveIT</h5>
                <p class="card-text">Si existe algún problema, ¿Por qué no lo reportas?</p>
                <p class="card-text">Da click en generar reporte, llena el formulario y nosotros lo resolvemos.</p>
                <a href="#" class="card-link"></a>
                <a href="#" class="card-link"></a>
            </div>
        </div>
        <div class="row g-2 p-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reporta</h5>
                        <p class="card-text">Reporta incidencias desde tu dispositivo desde cualquier lugar.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Ahorra tiempo</h5>
                        <p class="card-text">No es necesario un tramite complejo para resolver los problemas.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body text-end">
                        <h5 class="card-title">Da mantenimiento</h5>
                        <p class="card-text">Los reportes son revisados para corregir cualquier circunstancia fuera de lo normal.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>