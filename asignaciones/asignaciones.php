<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location: ../index.php");
} elseif ($_SESSION["rol"] != "Administrador") {
    header("location: ../user.php");
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReserveIT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="shortcut icon" href="../images/R.png" type="image/x-icon">
</head>

<body>
    <header class="header">
        <div class="logo">
            <a href="../pages/admin.php"><img src="../images/logo.png" alt="Logo de la compañía"></a>
        </div>
        <nav>
            <div class="content">
                <ul class="nav-links">
                    <li><a><?php echo $_SESSION["nombre"] ?></a></li>
                </ul>
            </div>
        </nav>
        <a href="../db/controler_close_session.php" class="btn btn-rounded"><button class="btn btn-rounded">Cerrar sesión</button></a>
    </header>
    <div class="content2">
        <ul class="nav-links">
            <li><a href="../horarios/horarios.php">Horarios</a></li>
            <li><a href="../laboratorios/laboratorios.php">Laboratorios</a></li>
            <li><a href="../usuarios/usuarios.php">Usuarios</a></li>
            <li><a href="../reportes/reportes.php">Reportes</a></li>
            <li><a href="../asignaciones/asignaciones.php">Asignaciones</a></li>
        </ul>
    </div>
    <div class="contenedor col-xs-12 col-sm-12 col-md-12">
        <div class="table-responsive">
        <table class="table table-hover text-center fs-6">
            <thead class="table-dark" style="vertical-align: middle;">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Laboratorio</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../db/db_connection.php";
                $sql = "SELECT u.nombre, u.rol, r.titulo, r.descripcion, r.laboratorio, a.prioridad, a.estado, a.id_asignacion
                        FROM asignacion a
                        INNER JOIN usuario u ON a.id_usuario = u.id_usuario
                        INNER JOIN reporte r ON a.id_reporte = r.id_reporte";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $prioridadColor = '';
                    $estadoColor = '';

                    switch ($row['prioridad']) {
                        case 1:
                            $prioridadColor = 'red';
                            break;
                        case 2:
                            $prioridadColor = 'orange';
                            break;
                        case 3:
                            $prioridadColor = 'yellow';
                            break;
                        default:
                            $prioridadColor = 'inherit';
                            break;
                    }

                    switch ($row['estado']) {
                        case 'En curso':
                            $estadoColor = 'green';
                            break;
                        case 'Finalizado':
                            $estadoColor = 'blue';
                            break;
                        default:
                            $estadoColor = 'inherit';
                            break;
                    }
                ?>
                    <tr>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['rol'] ?></td>
                        <td><?php echo $row['titulo'] ?></td>
                        <td><?php echo $row['descripcion'] ?></td>
                        <td><?php echo $row['laboratorio'] ?></td>
                        <td style="background-color: <?php echo $prioridadColor; ?>"><?php echo $row['prioridad'] ?></td>
                        <td style="background-color: <?php echo $estadoColor; ?>"><?php echo $row['estado'] ?></td>
                        <td>
                        <form method="POST">
                            <input type="hidden" name="id_asignacion" value="<?php echo $row['id_asignacion'] ?>">
                            <button type="submit" class="btn btn-danger btn-eliminar" data-id="<?php echo $row['id_asignacion'] ?>">Eliminar</button>
                        </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        </div>
    </div>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('table').on('click', '.btn-eliminar', function() {
    var idAsignacion = $(this).data('id');
    if (confirm('¿Estás seguro de que deseas eliminar este registro?')) {
      $.ajax({
        url: 'eliminar_registro.php',
        method: 'POST',
        data: { id_asignacion: idAsignacion },
        success: function(response) {
          alert(response);
          $(this).closest('tr').remove();
        },
        error: function() {
          alert('Error al eliminar el registro');
        }
      });
    }
  });
});
</script>

</html>