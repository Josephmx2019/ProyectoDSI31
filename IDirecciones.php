<?php
    $ID = $_REQUEST['ID'];
    $Calle = $_REQUEST['Calle'];
    $Ciudad = $_REQUEST['Ciudad'];
    $Estado = $_REQUEST['Estado'];
    $Pais = $_REQUEST['Pais'];

    print("ID Direcciones: " . $ID . "<br>");
    print("Calle: " . $Calle . "<br>");
    print("Ciudad: " . $Ciudad . "<br>");
    print("Estado: " . $Estado . "<br>");
    print("Pais: " . $Pais . "<br>");

    $sql = "INSERT INTO Direcciones (ID, Calle, Ciudad, Estado, Pais) VALUES ('$ID', '$Calle', '$Ciudad', '$Estado', '$Pais')";

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
