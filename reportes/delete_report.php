<?php
include "../db/db_connection.php";
$id = $_GET['id'];
$sql_asignacion = "DELETE FROM `asignacion` WHERE id_reporte = $id";
$result_asignacion = mysqli_query($connection, $sql_asignacion);
if ($result_asignacion) {
    $sql = "DELETE FROM `reporte` WHERE id_reporte = $id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("Location: reportes.php?msg=Reporte eliminado");
    } else {
        echo "Error: " . mysqli_error($connection);
    }
} else {
    echo "Error: " . mysqli_error($connection);
}
?>