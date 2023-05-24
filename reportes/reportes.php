<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
}
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
                    <li><a>Reportes</a></li>
                    <li><a><?php echo $_SESSION["nombre"] ?></a></li>
                </ul>
            </div>
        </nav>
        <a href="../db/controler_close_session.php" class="btn"><button class="btn btn-rounded">Cerrar sesión</button></a>
    </header>
    <div class="content2">
        <ul class="nav-links">
            <li><a href="../pages/asignados.php">Asignados</a></li>
            <li><a href="../laboratorios/laboratorios.php">Laboratorios</a></li>
            <li><a href="../usuarios/usuarios.php">Usuarios</a></li>
            <li><a href="../reportes/reportes.php">Reportes</a></li>
            <li><a href="../asignaciones/asignaciones.php">Asignaciones</a></li>
        </ul>
    </div>

    <div class="contenedor">

        <?php

        if (isset($_SESSION['success_msg'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . $_SESSION['success_msg'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['success_msg']); 
        }

        if (isset($_SESSION['error_msg'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    ' . $_SESSION['error_msg'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            unset($_SESSION['error_msg']); 
        }
        ?>
        <a href="../reportes/add_report.php" class="btn btn-dark mb-3 fs-6">Agregar Reporte</a>

        <table class="table table-hover text-center fs-6 table-bordered">
            <thead class="table-dark" style="vertical-align: middle;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Laboratorio</th>
                    <th scope="col">Fecha de reporte</th>
                    <th scope="col">Prioridad</th> <!-- Nueva columna -->
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody style="vertical-align: middle;">
                <?php
                include "../db/db_connection.php";
                $sql = "SELECT reporte.id_reporte, reporte.titulo, reporte.descripcion, reporte.fecha, laboratorio.nombre AS nombre_laboratorio, asignacion.prioridad
                FROM reporte
                INNER JOIN laboratorio ON reporte.laboratorio = laboratorio.id_laboratorio
                INNER JOIN asignacion ON reporte.id_reporte = asignacion.id_reporte";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo $row['id_reporte'] ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td style="width: 500px;"><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['nombre_laboratorio'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['prioridad'] ?></td> 
                        <td style="width: 200px;">
                            <a href="edit_report.php?id=<?php echo $row['id_reporte'] ?>" class="link-dark"><i class="bi bi-pencil-square"></i></a>
                            <a href="delete_report.php?id=<?php echo $row['id_reporte'] ?>" class="link-dark"><i class="bi bi-trash-fill"></i></a>
                            <a href="complete_report.php?id=<?php echo $row['id_reporte'] ?>" class="link-dark"><i class="bi bi-check-circle-fill"></i></a>
                            <a href="details_report.php?id=<?php echo $row['id_reporte'] ?>" class="link-dark">Detalles</a>
                        </td>
                    </tr>

                <?php
                }

                ?>
            </tbody>
        </table>

    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>