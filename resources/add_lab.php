<?php
include "db_connection.php";

if(isset($_POST['submit'])){
    $nombre = $_POST['nombre'];
    $edificio = $_POST['edificio'];
    $descripcion = $_POST['descripcion'];

    $sql = "INSERT INTO `laboratorio`(`id`, `nombre`, `edificio`, `descripcion`)
    VALUES (NULL, '$nombre', '$edificio', '$descripcion')";

    $result = mysqli_query($connection, $sql);

    if($result){
        header("Location: ../pages/laboratorios.php?msg=Nuevo laboratorio creado");
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
        Agregar laboratorio
    </nav>

    <div class="container">
        <div class="text-center">
            <p class="muted" style="font-family: Arial, Helvetica, sans-serif;">Ingresa los datos del nuevo laboratorio
            </p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 1000px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre de laboratorio:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>

                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Edificio:</label>
                            <select name="edificio" class="form-select">
                                <option selected disabled>Elegir edificio</option>
                                <option value="Edificio E">Edificio E</option>
                                <option value="Edificio ">Edificio D</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción:</label>
                    <input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Agregar</button>
                    <a href="../pages/laboratorios.php" class="btn btn-danger">Cancelar</a>
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