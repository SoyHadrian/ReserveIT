<?php

/* Renombra el archivo a la vez que lo pasa a la carpeta de files */
$archivo_temporal = $_FILES['archivo']['tmp_name'];
$archivo_final = 'files/archivo.xls';
rename($archivo_temporal, $archivo_final);
$nombre_archivo = "files/archivo.xls";


// Verifica si el archivo existe
if (file_exists($nombre_archivo)) {
    // Abre el archivo en modo lectura
    $archivo = fopen($nombre_archivo, "r");

    // Lee el contenido del archivo
    $contenido = fread($archivo, filesize($nombre_archivo));
    // Imprime el contenido del archivo
    echo $contenido;

    // Cierra el archivo
    fclose($archivo);
    // Elimina el archivo
    unlink($nombre_archivo);
    echo "El archivo se ha eliminado correctamente.";
}
