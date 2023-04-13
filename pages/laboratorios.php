<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../images/R.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="../index.php"><img src="../images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content">
                <ul class="nav-links">
                    <li><a>Laboratorios</a></li>
                    <li><a>Nombre completo de usuario</a></li>
                </ul>
            </div>
        </nav>
        <a href="#" class="btn"><button>Cerrar sesión</button></a>
    </header>
    <div class="content2">
        <ul class="nav-links">
            <li><a href="horarios.php">Horarios</a></li>
            <li><a href="laboratorios.php">Laboratorios</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li><a href="reportes.php">Reportes</a></li>
        </ul>
    </div>
    <div class="contenedor">
        <?php 
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        ?>
        <a href="../resources/add_lab.php" class="btn btn-dark mb-3 fs-6">Agregar Laboratiorio</a>
        <table class="table table-hover text-center fs-6">
            <thead class="table-dark" style="vertical-align: middle;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Edificio</th>
                    <th scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../resources/db_connection.php";
                    $sql = "SELECT * FROM `laboratorio`";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)){
                        ?>

                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php echo $row['descripcion'] ?></td>
                    <td><?php echo $row['edificio'] ?></td>
                    <td>
                        <a href="../resources/edit_lab.php?id=<?php echo $row['id'] ?>" class="link-dark"><i
                                class="bi bi-pencil-square"></i></a>
                        <a href="../resources/delete_lab.php?id=<?php echo $row['id'] ?>" class="link-dark"><i
                                class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>