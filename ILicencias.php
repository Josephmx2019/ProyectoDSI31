<?php
    $ID = $_POST['ID'];
    $FechaExpedicion = date('y/m/d');
    setlocale(LC_TIME, 'spanish');
    $FechaVencimiento = date('y/m/d');
    setlocale(LC_TIME, 'spanish');
    $Numero = $_POST['Numero'];
    $Tipo = $_POST['Tipo'];
    $Antiguedad = $_POST['Antiguedad'];
    $ConductorID = $_POST['Conductor_ID'];

    print("ID Licencias: " . $ID . "<br>");
    print("Fecha de Expedicion: " . $FechaExpedicion . "<br>");
    print("Fecha de Vencimiento: " . $FechaVencimiento . "<br>");
    print("Numero: " . $Numero . "<br>");
    print("Tipo: " . $Tipo . "<br>");
    print("Antiguedad: ".$Antiguedad."<br>");
    print("Conductor ID: " . $ConductorID . "<br>");

    $sql = "INSERT INTO Licencias (ID, Expedicion, Vencimiento, Numero, Tipo, Antiguedad, ConductorID) VALUES ('$ID', '$FechaExpedicion', '$FechaVencimiento', '$Numero', '$Tipo', '$Antiguedad', '$ConductorID')";

    include("Controlador.php");
    $Con=Conectar();
    $resultest=Ejecutar($Con,$sql);
    if($resultest==1){
        print("Registro insertado");
    }else{
        print("Registro no insertado");
    }
    Desconectar($Con);
?>

