<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="shortcut icon" href="images/R.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <a href="index.php" class="btn"><button>Regresar</button></a>
    </header>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-3"
        style="font-family: Arial, Helvetica, sans-serif; font-weight: bold;">
        Iniciar sesión
    </nav>
    <div class="container">
        <div class="text-center">
            <p class="muted" style="font-family: Arial, Helvetica, sans-serif;">Ingresa los datos requeridos</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 500px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre de usuario o correo institucional:</label>
                        <input type="text" class="form-control" name="usuario" placeholder="usuario">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="clave" placeholder="contraseña">
                </div>

                <div>
                    <button type="submit" class="btn btn-success" name="submit">Iniciar sesión</button>
                    <a href="registrar.php" class="btn btn-danger">Registrarme</a>
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