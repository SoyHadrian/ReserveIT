<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}
$id_usuario = $_SESSION["id"];
include "db/db_connection.php";
$sql = "SELECT asignacion.id_asignacion, usuario.nombre, reporte.titulo, reporte.laboratorio, reporte.reporta, reporte.descripcion, reporte.fecha
        FROM asignacion
        INNER JOIN usuario ON asignacion.id_usuario = usuario.id_usuario
        INNER JOIN reporte ON asignacion.id_reporte = reporte.id_reporte
        WHERE asignacion.id_usuario = $id_usuario";
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
    <div class="container">
        <h1>Asignaciones del usuario</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Asignación</th>
                    <th>Nombre</th>
                    <th>Título</th>
                    <th>Laboratorio</th>
                    <th>Reporta</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($resultado)) { ?>
                    <tr>
                        <td><?php echo $row['id_asignacion']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['titulo']; ?></td>
                        <td><?php echo $row['laboratorio']; ?></td>
                        <td><?php echo $row['reporta']; ?></td>
                        <td><?php echo $row['descripcion']; ?></td>
                        <td><?php echo $row['fecha']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>