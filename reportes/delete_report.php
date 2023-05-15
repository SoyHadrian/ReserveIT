<?php
include "../db/db_connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM `reporte` WHERE id_reporte = $id";
$result = mysqli_query($connection, $sql);
if ($result) {
    header("Location: reportes.php?msg=Laboratorio eliminado");
} else {
    echo "Error: " . mysqli_error($connection);
}
