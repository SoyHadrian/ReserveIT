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
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
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
                    <li><a>Usuarios</a></li>
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

    <div class="contenedor col-xs-12 col-sm-12 col-md-12">

        <?php
        if (isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                ' . $msg . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        }
        ?>
        <div class="row">
            <div class="col">
                <a href="add_user.php" class="btn btn-dark mb-3 fs-6">Agregar usuario</a>
            </div>
            <div class="col">
                <form method="post" action="../resources/procesarExcel.php" enctype="multipart/form-data">
                    <div class="mb-3" style="display: flex; padding: 10px;">
                        <input type="file" name="archivo" class="form-control" style="width: 500px;" id="seleccionarBtn">
                        <input type="submit" value="Subir archivo" class="btn btn-success" id="subirBtn">
                    </div>
                </form>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-hover text-center fs-6">
                <thead class="table-dark" style="vertical-align: middle;">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">No. control</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "../db/db_connection.php";
                    $sql = "SELECT * FROM `usuario`";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <tr>
                            <td><?php echo $row['id_usuario'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['usuario'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['nocontrol'] ?></td>
                            <td><?php echo $row['rol'] ?></td>
                            <td><?php echo $row['clave'] ?></td>
                            <td>
                                <a href="edit_user.php?id=<?php echo $row['id_usuario'] ?>" class="link-dark"><i class="bi bi-pencil-square"></i></a>
                                <a href="delete_user.php?id=<?php echo $row['id_usuario'] ?>" class="link-dark"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>

                    <?php
                    }

                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>