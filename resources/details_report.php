<?php
include "db_connection.php";
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>ReserveIT</title>
    <link rel="stylesheet" href="../css/resources.css">
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
                    <li><a>Nombre completo de usuario</a></li>
                </ul>
            </div>
        </nav>
        <a href="../pages/laboratorios.php" class="btn"><button>Regresar</button></a>
    </header>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-3"
        style=" font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">
        Detalles de reporte
    </nav>

    <div class="container">
            <?php 
                $sql = "SELECT * FROM `reporte` WHERE id = $id LIMIT 1";
                $result = mysqli_query($connection, $sql);
                $row =  mysqli_fetch_assoc($result);
            ?>
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 1000px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Título del reporte:</label>
                        <input disabled type="text" class="form-control" name="titulo" value="<?php echo $row['titulo'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Edificio de incidencia:</label>
                        <input disabled type="text" class="form-control" name="titulo" value="<?php echo $row['edificio'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                <div class="col">
                        <label class="form-label">Persona que reporta:</label>
                        <input disabled type="text" class="form-control" name="titulo" value="<?php echo $row['reporta'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Laboratorio de ocurrencia:</label>
                        <input disabled type="text" class="form-control" name="titulo" value="<?php echo $row['laboratorio'] ?>">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <input disabled type="text" class="form-control" name="titulo" value="<?php echo $row['descripcion'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de reporte:</label>
                    <input disabled type="date" id="fecha" name="fecha" value="<?php echo $row['fecha'] ?>">
                </div>
                <div>
                    <a href="edit_report.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Editar</a>
                    <a href="../pages/reportes.php" class="btn btn-danger">Regresar</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>