<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
} /*elseif ($_SESSION["rol"] != "Administrador" | $_SESSION["rol"] != "Prestante de servicio social") {
    header("location: ../user.php");
}*/
$id_usuario = $_SESSION["id"];
include "../db/db_connection.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../images/R.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="../pages/admin.php"><img src="../images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content">
                <ul class="nav-links">
                    <li><a><?php echo $_SESSION["nombre"] ?></a></li>
                </ul>
            </div>
        </nav>
        <a href="../db/controler_close_session.php" class="btn btn-rounded"><button class="btn btn-rounded">Cerrar sesión</button></a>
    </header>
    <div class="content2">
        <ul class="nav-links">
            <li><a href="../asignaciones/asignaciones.php">Asignados</a></li>
            <li><a href="../laboratorios/laboratorios.php">Laboratorios</a></li>
            <li><a href="../usuarios/usuarios.php">Usuarios</a></li>
            <li><a href="../reportes/reportes.php">Reportes</a></li>
        </ul>
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