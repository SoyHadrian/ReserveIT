<?php 
session_start();
if(empty($_SESSION["id"])){
    header("location: index.php");
}
?>
<?php
include "resources/db_connection.php";

if(isset($_POST['submit'])){
    $titulo = $_POST['titulo'];
    $edificio = $_POST['edificio'];
    $reporta = $_SESSION['nombre']; 
    $laboratorio = $_POST['laboratorio'];
    $descripcion = $_POST['descripcion'];
    $fecha = date('Y-m-d');  

    $sql = "INSERT INTO `reporte`(`id`, `titulo`, `edificio`, `reporta`, `laboratorio`, `descripcion`, `fecha`)
    VALUES (NULL, '$titulo', '$edificio', '$reporta', '$laboratorio', '$descripcion', '$fecha')";

    $result = mysqli_query($connection, $sql);

    if($result){
        header("Location: user.php?msg=Reporte de incidencia enviado");
    }else{
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>ReserveIT</title>
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
                        <li><a href="horarios.php">Horarios</a></li>
                        <li><a href="labs.php">Laboratorios</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <a href="user.php" class="btn"><button class="btn btn-rounded">Regresar</button></a>
    </header>
    <div class="container" style="padding-top: 30px;">
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 1000px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Título del reporte:</label>
                        <input type="text" class="form-control" name="titulo" placeholder="Título" required>
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Edificio:</label>
                            <select name="edificio" class="form-select">
                            <?php
                                    include "../resources/db_connection.php";
                                    $sql = "SELECT * FROM `edificio`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                        ?>
                                    <option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
                                <?php
                                    }
                                    ?>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Laboratorio:</label>
                        <select name="laboratorio" class="form-select">
                            <?php
                                    include "../resources/db_connection.php";
                                    $sql = "SELECT * FROM `laboratorio`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                    ?>
                            <option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php
                                    }
                                    ?>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <input type="" class="form-control" name="descripcion" placeholder="Descripcion" required>
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Reportar</button>
                    <a href="user.php" class="btn btn-danger">Cancelar</a>
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