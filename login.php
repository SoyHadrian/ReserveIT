<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href=css/styleLog.css />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="js/code.js"></script>
</head>

<body>
    <form class="form" action="" method="post">
        <h2 class="form_title">Iniciar sesión</h2>

        <?php
        include "resources/db_connection.php";
        include "resources/controller_login.php";
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
                <!-- <img src="images/eye.png" class="showIcon" id="eye"> Icono para mostrar contraseña, no me quedó jsjs-->
            </div>
            <input type="submit" class="form_submit" value="Ingresar" name="btningresar">
            <p class="form_paragraph">¿No tienes una cuenta? <a href="registrar.php" class="form_link">Entra aquí</a></p>
        </div>
    </form>

</body>

</html>