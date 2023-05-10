<?php 
session_start();
if(empty($_SESSION["id"])){
    header("location: index.php");
}
?>
<?php
include "db_connection.php";
$id = $_GET['id'];
if(isset($_POST['submit'])){
    $titulo = $_POST['titulo'];
    $edificio = $_POST['edificio']; 
    $reporta = $_POST['reporta']; 
    $laboratorio = $_POST['laboratorio'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

    $sql = "UPDATE `reporte` SET `titulo`='$titulo', `edificio`='$edificio', `reporta`='$reporta', `laboratorio`='$laboratorio', `descripcion`='$descripcion', `fecha`='$fecha' WHERE id = $id";

    $result = mysqli_query($connection, $sql);

    if($result){
        header("Location: ../pages/reportes.php?msg=Laboratorio actualizado");
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
    <link rel="stylesheet" href="../css/resources.css">
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
        <a href="../pages/reportes.php" class="btn"><button class="btn btn-rounded">Regresar</button></a>
    </header>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-3"
        style=" font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">
        Editar reporte
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
                        <input type="text" class="form-control" name="titulo" value="<?php echo $row['titulo'] ?>">
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Edificio:</label>
                            <select name="edificio" class="form-select">
                                <option selected><?php echo $row['edificio'] ?></option>
                                <option value="" disabled>----------</option>
                                <option value="Edificio E">Edificio E</option>
                                <option value="Edificio D">Edificio D</option>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Quién reporta:</label>
                        <select name="reporta" class="form-select">
                            <option selected><?php echo $row['reporta'] ?></option>
                            <option value="" disabled>----------</option>
                            <?php
                                    include "../resources/db_connection.php";
                                    $sql = "SELECT * FROM `usuario`";
                                    $result = mysqli_query($connection, $sql);
                                    while ($row = mysqli_fetch_assoc($result)){
                                    ?>
                            <option value="<?php echo $row['nombre'] ?>"><?php echo $row['nombre'] ?></option>
                            <?php
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="col">
                                    <?php 
                                    $sql = "SELECT * FROM `reporte` WHERE id = $id LIMIT 1";
                                    $result = mysqli_query($connection, $sql);
                                    $row =  mysqli_fetch_assoc($result);
                                    ?>
                        <label class="form-label">Laboratorio:</label>
                        <select name="laboratorio" class="form-select">
                            <option selected><?php echo $row['laboratorio'] ?></option>
                            <option value="" disabled>----------</option>
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
                                    <?php 
                                    $sql = "SELECT * FROM `reporte` WHERE id = $id LIMIT 1";
                                    $result = mysqli_query($connection, $sql);
                                    $row =  mysqli_fetch_assoc($result);
                                    ?>
                    <label class="form-label">Descripción:</label>
                    <input type="" class="form-control" name="descripcion" value="<?php echo $row['descripcion'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha de reporte:</label>
                    <input type="date" id="fecha" name="fecha" value="<?php echo $row['fecha'] ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Editar</button>
                    <a href="../pages/reportes.php" class="btn btn-danger">Cancelar</a>
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