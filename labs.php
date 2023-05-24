<?php
/*session_start();
if (empty($_SESSION["id"])) {
    header("location: index.php");
}*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>ReserveIT</title>
    <link rel="stylesheet" href=css/users.css>
    <link rel="shortcut icon" href="images/R.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content" style="padding-top: 25px;">
                <ul class="nav-links" style="padding-right: 433px;">
                    <li><a href="labs.php">Laboratorios</a></li>
                </ul>


                <ul class="nav-links">
                    <li><a href="reportar.php">Generar reporte</a></li>
                </ul>
            </div>
        </nav>
        <a href="user.php" class="btn"><button class="btn btn-rounded">Regresar</button></a>
    </header>

    <div class="container" style="padding-top: 30px;">
        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        ?>
        <table class="table table-hover text-center fs-6">
            <thead class="table-dark" style="vertical-align: middle;">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Edificio</th>
                    <!-- <th scope="col">Accion</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                include "db/db_connection.php";
                $sql = "SELECT laboratorio.id_laboratorio, laboratorio.nombre, laboratorio.descripcion, edificio.nombre AS nombre_edificio
                FROM laboratorio
                INNER JOIN edificio ON laboratorio.edificio = edificio.id_edificio";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>

                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['nombre_edificio'] ?></td>
                        <!-- <td>
                            <a href="edit_lab.php?id=<?php echo $row['id_laboratorio'] ?>" class="link-dark"><i class="bi bi-pencil-square"></i></a>
                            <a href="delete_lab.php?id=<?php echo $row['id_laboratorio'] ?>" class="link-dark"><i class="bi bi-trash-fill"></i></a>
                        </td> -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>