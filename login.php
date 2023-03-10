<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <link rel="stylesheet" href=css/style2.css>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="index.php"><img src="images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <a href="index.php" class="btn"><button>Regresar</button></a>
    </header>
    <div class="formulario">
        <form class="form" action="" method="post">
            <h2 class="form_title">Iniciar sesión</h2>

            <?php
            include("resources/db.php");
            include("resources/controller.php");
            ?>

            <div class="form_container">
                <div class="form_group">
                    <input type="email" id="email" class="form_input" placeholder=" " name="usuario">
                    <label for="email" class="form_label">Correo</label>
                    <span class="form_line"></span>
                </div>
                <div class="form_group">
                    <input type="password" id="pass" class="form_input" placeholder=" " name="pass">
                    <label for="pass" class="form_label">Contraseña</label>
                    <span class="form_line"></span>
                    <!-- <img src="images/eye.png" class="showIcon" id="eye"> Icono para mostrar contraseña, no me quedó jsjs-->
                </div>
                <input type="submit" class="form_submit" value="Ingresar" name="btningresar">
                <p class="form_paragraph">¿No tienes una cuenta? <a href="registrar.php" class="form_link">Entra aquí</a></p>
            </div>
        </form>
    </div>

</body>