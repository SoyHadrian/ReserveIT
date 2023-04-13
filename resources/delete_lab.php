<?php
include "db_connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM `laboratorio` WHERE id = $id";
$result = mysqli_query($connection, $sql);
if($result){
    header("Location: ../pages/laboratorios.php?msg=Laboratorio eliminado");
}
else{
    echo "Error: " . mysqli_error($connection);
}
?>