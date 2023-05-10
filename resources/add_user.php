<?php 
session_start();
if(empty($_SESSION["id"])){
    header("location: ../index.php");
}

include "db_connection.php";

if(isset($_POST['submit'])){
        $correo = $_POST['correo'];
    if (!preg_match('/^[a-z][0-9]{8,9}@queretaro\.tecnm\.mx$/', $correo)) {
        header("Location: add_user.php?msg=Correo inválido");
      }else if(!preg_match('/^[a-z][0-9]{8,9}@queretaro\.tecnm\.mx$/', $correo)){
        header("Location: ../pages/usuarios.php?msg=Correo inválido");
      }else{        
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];
        $nocontrol = $_POST['nocontrol'];

        $sql = "INSERT INTO `usuario`(`id`, `nombre`, `usuario`, `correo`, `clave`, `rol`, `nocontrol`)
        VALUES (NULL, '$nombre', '$usuario', '$correo', '$clave', '$rol', '$nocontrol')";
        
        $result = mysqli_query($connection, $sql);
    
        if($result){
            header("Location: ../pages/usuarios.php?msg=Nuevo usuario creado");
        }else{
            echo "Failed: " . mysqli_error($connection);
        }
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
        <a href="../pages/usuarios.php" class="btn"><button class="btn btn-rounded">Cancelar</button></a>
    </header>

    <?php 
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                '.$msg.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
            }
        ?>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-3"
        style=" font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">
        Agregar usuario
    </nav>

    <div class="container col-xs-12 col-sm-12 col-md-12">
        <div class="text-center">
            <p class="muted" style="font-family: Arial, Helvetica, sans-serif;">Ingresa los datos del nuevo usuario</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 1000px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre completo:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="nombre" required>
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="usuario" placeholder="usuario" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo institucional:</label>
                    <input type="text" class="form-control" name="correo" placeholder="ejemplo@queretaro.tecnm.mx" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Número de control:</label>
                        <input type="text" class="form-control" name="nocontrol" placeholder="Numero de control" required>
                    </div>
                    <div class="col">
                        <label class="form-label">Rol de usuario:</label>
                        <select name="rol" class="form-select" required>
                            <option selected value="Alumno">Alumno</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Prestante de servicio social">Prestante de servicio social</option>
                            <option value="Profesor">Profesor</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="clave" placeholder="contraseña" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit">Agregar</button>
                    <a href="../pages/usuarios.php" class="btn btn-danger">Cancelar</a>
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