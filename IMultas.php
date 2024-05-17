<?php
    $ID = $_REQUEST['ID'];
    $Fecha = $_REQUEST['Fecha'];
    $Cantidad = $_REQUEST['Cantidad'];
    $Descripcion = $_REQUEST['Descripcion'];
    $Estado = $_REQUEST['Estado'];
    $Infraccion = $_REQUEST['Infraccion'];
    $ID_Direccion = $_REQUEST['ID_Direccion'];
    $ID_Licencia = $_REQUEST['ID_Licencia'];
    $ID_Oficial = $_REQUEST['ID_Oficial'];
    $ID_Tarjeta = $_REQUEST['ID_Tarjeta'];

    print("ID Multas: " . $IDs . "<br>");
    print("Fecha: " . $Fecha . "<br>");
    print("Cantidad: " . $Cantidad . "<br>");
    print("Descripcion: " . $Descripcion . "<br>");
    print("Estado: " . $Estado . "<br>");
    print("Infraccion: " . $Infraccion . "<br>");
    print("ID Direccion: " . $ID_Direccion . "<br>");
    print("ID Licencia: " . $ID_Licencia . "<br>");
    print("ID Oficial: " . $ID_Oficial . "<br>");
    print("ID Tarjeta: " . $ID_Tarjeta . "<br>");

    $sql = "INSERT INTO Multas (ID, Fecha, Cantidad, Descripcion, Estado, Infraccion, ID_Direccion, ID_Licencia, ID_Oficial, ID_Tarjeta) 
        VALUES ('$ID', '$Fecha', '$Cantidad', '$Descripcion', '$Estado', '$Infraccion', '$ID_Direccion', '$ID_Licencia', '$ID_Oficial', '$ID_Tarjeta')";


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