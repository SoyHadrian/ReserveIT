<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
}
?>
<?php
include "../db/db_connection.php";
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];
    $rol = $_POST['rol'];

    $sql = "UPDATE `usuario` SET `nombre`='$nombre',`correo`='$correo',`usuario`='$usuario',`clave`='$clave',`rol`='$rol' WHERE id = $id";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("Location: ../usuarios/usuarios.php?msg=Usuario actualizado");
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
        <a href="../usuarios/usuarios.php" class="btn"><button class="btn btn-rounded">Cancelar</button></a>
    </header>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-3" style=" font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">
        Editar usuario
    </nav>

    <div class="container">
        <?php
        $sql = "SELECT * FROM `usuario` WHERE id = $id LIMIT 1";
        $result = mysqli_query($connection, $sql);
        $row =  mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 1000px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre completo:</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="usuario" value="<?php echo $row['usuario'] ?>">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo institucional:</label>
                    <input type="text" class="form-control" name="correo" value="<?php echo $row['correo'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="clave" value="<?php echo $row['clave'] ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Rol de usuario:</label>

                    <select name="rol" class="form-select">
                        <option selected><?php echo $row['rol'] ?></option>
                        <option value="Administrador">Administrador</option>
                        <option value="Prestante de servicio social">Prestante de servicio social</option>
                        <option value="Profesor">Profesor</option>
                        <option value="Alumno">Alumno</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Editar</button>
                    <a href="../usuarios/usuarios.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>