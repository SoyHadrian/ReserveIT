<?php
require 'PHPExcel-1.8/Classes/PHPExcel.php';

// Establecer las claves de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reserveit";

// Crear la conexión a la base de datos
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión se realizó correctamente
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_FILES['archivo'])) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $ubicacionArchivo = $_FILES['archivo']['tmp_name'];

    $excel = PHPExcel_IOFactory::load($ubicacionArchivo);

    $hoja = $excel->getActiveSheet();

    $filas = $hoja->getHighestRow();
    $columnas = $hoja->getHighestColumn();

    for ($fila = 2; $fila <= $filas; $fila++) {

        $noControl = $hoja->getCell('B' . $fila)->getValue();
        $nombre = $hoja->getCell('C' . $fila)->getValue();
        $usuario = $hoja->getCell('D' . $fila)->getValue();
        $correo = $hoja->getCell('E' . $fila)->getValue();
        $clave = $hoja->getCell('F' . $fila)->getValue();
        $rol = $hoja->getCell('G' . $fila)->getValue();


        echo "No Control: " . $noControl . "\n";
        echo "Nombre: " . $nombre . "\n";
        echo "Usuario: " . $usuario . "\n";
        echo "Correo: " . $correo . "\n";
        echo "Clave: " . $clave . "\n";
        echo "Rol: " . $rol . "\n";

        echo "\n";

        $sql = "INSERT INTO usuario ( noControl, nombre, usuario, correo, clave, rol) VALUES ('$noControl', '$nombre', '$usuario', '$correo', '$clave', '$rol')";

        if (mysqli_query($connection, $sql)) {
            echo "Datos insertados correctamente en la base de datos.";
        } else {
            echo "Error al insertar los datos: " . mysqli_error($connection);
        }
    }
    
    $excel->disconnectWorksheets();
    unset($excel);
}

mysqli_close($connection);
?>