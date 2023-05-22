<?php
if (isset($_POST['id_asignacion'])) {
    $idAsignacion = $_POST['id_asignacion'];
    include "../db/db_connection.php";
    $sql = "DELETE FROM asignacion WHERE id_asignacion = '$idAsignacion'";

    if (mysqli_query($connection, $sql)) {
        echo "El registro ha sido eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($connection);
    }
    mysqli_close($connection);
} else {
    echo "No se proporcionó el parámetro necesario para eliminar el registro.";
}
?>