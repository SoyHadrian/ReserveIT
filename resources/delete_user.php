<?php
include "db_connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM `usuario` WHERE id = $id";
$result = mysqli_query($connection, $sql);
if($result){
    header("Location: ../pages/usuarios.php?msg=Usuario eliminado");
}
else{
    echo "Error: " . mysqli_error($connection);
}
?>