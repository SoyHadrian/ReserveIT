<?php
include "../db/db_connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM `usuario` WHERE id_usuario = $id";
$result = mysqli_query($connection, $sql);
if ($result) {
    header("Location: ../usuarios/usuarios.php?msg=Usuario eliminado");
} else {
    echo "Error: " . mysqli_error($connection);
}
