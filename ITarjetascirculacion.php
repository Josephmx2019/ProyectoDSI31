<?php
    $ID_Tarjetas_Circulacion = $_REQUEST['ID_Tarjetas_Circulacion'];
    $Expedicion = $_REQUEST['Expedicion'];
    $Vencimiento = $_REQUEST['Vencimiento'];
    $Numero = $_REQUEST['Numero'];

    print("ID Tarjetas Circulacion: " . $ID_Tarjetas_Circulacion . "<br>");
    print("Expedicion: " . $Expedicion . "<br>");
    print("Vencimiento: " . $Vencimiento . "<br>");
    print("Numero: " . $Numero . "<br>");

    $sql = "INSERT INTO TarjetasCirculacion VALUES ('$ID_Tarjetas_Circulacion', '$Expedicion', '$Vencimiento', '$Numero')";

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
