<?php
// complete_report.php

session_start(); // Iniciar la sesión

include "../db/db_connection.php";

if (isset($_GET['id'])) {
    $id_reporte = $_GET['id'];

    // Actualizar el campo "estado" a "Finalizado" en la tabla "asignacion"
    $updateQuery = "UPDATE asignacion SET estado = 'Finalizado' WHERE id_reporte = $id_reporte";
    mysqli_query($connection, $updateQuery);

    // Establecer el mensaje de éxito en la variable de sesión
    $_SESSION['success_msg'] = "Reporte completado exitosamente.";

    // Redireccionar de vuelta a la página anterior
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit();
} else {
    // Manejar el caso en el que no se proporciona un ID válido
    // Establecer el mensaje de error en la variable de sesión
    $_SESSION['error_msg'] = "Error: ID de reporte no válido.";

    // Redireccionar de vuelta a la página anterior
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
    exit();
}
?>