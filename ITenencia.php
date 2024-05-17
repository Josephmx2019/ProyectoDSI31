<?php

    $ID_Tenencia = $_REQUEST['ID_Tenencia'];
    $Fecha_Pago = $_REQUEST['Fecha_Pago'];
    $Monto = $_REQUEST['Monto'];
    $ID_Tarjeta_Circulacion = $_REQUEST['ID_Tarjeta_Circulacion'];

    print("ID Tenencia: " . $ID_Tenencia . "<br>");
    print("Fecha de pago: " . $Fecha_Pago . "<br>");
    print("Monto: " . $Monto . "<br>");
    print("ID Tarjeta Circulacion: " . $ID_Tarjeta_Circulacion . "<br>");

    $sql = "INSERT INTO Tenencia VALUES ('$ID_Tenencia', '$Fecha_Pago', '$Monto', '$ID_Tarjeta_Circulacion')";

    include("Controlador.php");
    $Con=Conectar();
    $resultest=Ejecutar($Con,$SQL);
    if($resultest==1){
        print("Registro insertado");
    }else{
        print("Registro no insertado");
    }
    Desconectar($Con);
?>
