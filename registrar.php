<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <link rel="stylesheet" href=css/style2.css>
    <link rel="shortcut icon" href="images/R.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <a href="login.php" class="btn"><button class="btn btn-rounded">Regresar</button></a>
    </header>
    <nav class="navbar navbar-light justify-content-center fs-2 mb-4"
        style="font-family: Arial, Helvetica, sans-serif; font-size: 30px; font-weight: bold;">
        Registro
    </nav>

    <div class="container">
        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 700px; min-width: 300px;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre completo:</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    </div>

                    <div class="col">
                        <label class="form-label">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo institucional:</label>
                    <input type="text" class="form-control" name="correo" placeholder="ejemplo@queretaro.tecnm.mx">
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="clave" placeholder="Contraseña">
                </div>

                <div class="mb-3">
                    <label class="form-label">Repetir contraseña:</label>
                    <input type="text" class="form-control" name="clave" placeholder="Contraseña">
                </div>

                <div class="button-container">
                    <button type="submit" class="btn btn-success" name="submit">Registrarme</button>
                    <a href="login.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>