<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="images/R.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>

    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content">
                <ul class="nav-links">
                </ul>
            </div>
        </nav>
        <a href="index.php" class="btn btn-rounded"><button class="btn btn-rounded">Cancelar</button></a>
    </header>

    <form class="form align-items-center" action="" method="post">
        <h2 class="form_title">Iniciar sesión</h2>

        <?php
        include "db/db_connection.php";
        include "db/controller_login.php";
        ?>

        <div class="form_container">
            <div class="form_group">
                <input type="text" id="email" class="form_input" placeholder=" " name="usuario">
                <label for="email" class="form_label">Usuario</label>
                <span class="form_line"></span>
            </div>
            <div class="form_group">
                <input type="password" id="pass" class="form_input" placeholder=" " name="clave">
                <label for="pass" class="form_label">Contraseña</label>
                <span class="form_line"></span>
            </div>
            <input type="submit" class="form_submit" value="Ingresar" name="btningresar">
            <p class="form_paragraph">¿No tienes una cuenta? <a href="registrar.php" class="form_link">Entra aquí</a></p>
        </div>
    </form>

</body>

</html>