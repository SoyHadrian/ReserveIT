<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
}
?>
<?php
include "../db/db_connection.php";

if (isset($_POST['submit'])) {
    date_default_timezone_set('America/Mexico_City');
    $titulo = $_POST['titulo'];
    $reporta = $_POST['reporta'];
    $laboratorio = $_POST['laboratorio'];
    $descripcion = $_POST['descripcion'];
    $prioridad = $_POST['prioridad'];
    $fecha = date('Y-m-d');

    $sql = "INSERT INTO `reporte`(`id_reporte`, `titulo`, `reporta`, `laboratorio`, `descripcion`, `fecha`)
    VALUES (NULL, '$titulo', '$reporta', '$laboratorio', '$descripcion', '$fecha')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
            $id_reporte = mysqli_insert_id($connection);
        
            $sql = "SELECT id_usuario, COUNT(*) AS asignaciones FROM asignacion WHERE estado = 'En curso' GROUP BY id_usuario ORDER BY asignaciones ASC LIMIT 1";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $id_usuario = $row['id_usuario'];
        
            $sql = "INSERT INTO asignacion (id_usuario, id_reporte, prioridad, estado) VALUES ('$id_usuario', '$id_reporte', '$prioridad', 'En curso')";
            $result = mysqli_query($connection, $sql);
        
            if ($result) {
                header("Location: reportes.php?msg=Nuevo reporte y asignación creados");
            } else {
                echo "Failed: " . mysqli_error($connection);
            }
        } else {
            echo "Failed: " . mysqli_error($connection);
    }

    if ($result) {
        header("Location: reportes.php?msg=Nuevo reporte creado");
    } else {
        echo "Failed: " . mysqli_error($connection);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>ReserveIT</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../images/R.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a><img src="../images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content">
                <ul class="nav-links">
                    <li><a><?php echo $_SESSION["nombre"] ?></a></li>
                </ul>
            </div>
        </nav>
        <a href="reportes.php" class="btn"><button class="btn btn-rounded">Regresar</button></a>
    </header>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-3" style=" font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">
        Agregar reporte
    </nav>

    <div class="container">
    <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 1000px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Título del reporte:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Título">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Quién reporta:</label>
                        <select name="reporta" class="form-select">
                            <?php
                            include "../db/db_connection.php";
                            $sql = "SELECT * FROM `usuario`";
                            $result = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['id_usuario'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col">
                        <label class="form-label">Laboratorio:</label>
                        <select name="laboratorio" class="form-select">
                            <?php
                            include "../db/db_connection.php";
                            $sql = "SELECT * FROM `laboratorio`";
                            $result = mysqli_query($connection, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row['id_laboratorio'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <input type="" class="form-control" name="descripcion" placeholder="Descripción">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prioridad:</label>
                    <select name="prioridad" class="form-select">
                        <option value="1">1 (Alta)</option>
                        <option value="2">2 (Media)</option>
                        <option value="3">3 (Baja)</option>
                    </select>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Agregar</button>
                    <a href="reportes.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>