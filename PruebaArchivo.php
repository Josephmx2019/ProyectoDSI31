<?php
    // 1.- Abrir el archivo
    $Manejador = fopen("Datos1.txt", "a");

    // 2.- Escribir en el archivo
    fwrite($Manejador, "Hola");

    // 3.- Cerrar el archivo
    fclose($Manejador);

    // 1.- Abrir el archivo
    $Manejador = fopen("Datos1.txt", "r");

    // 2.- Escribir en el archivo
    $Linea = fgets($Manejador);
    print($Linea);

    // 3.- Cerrar el archivo
    fclose($Manejador);
?>