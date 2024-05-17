<?php
    $Placa = $_POST['Placa'];
    $Anoo = $_POST['Ano'];
    $Marca = $_POST['Marca'];
    $Color = $_POST['Color'];
    $Modelo = $_POST['Modelo'];

    print("Placa: " . $Placa . "<br>");
    print("Ano: " . $Ano . "<br>");
    print("Marca: " . $Marca . "<br>");
    print("Color: " . $Color . "<br>");
    print("Modelo: " . $Modelo . "<br>");

    $sql = "INSERT INTO VALUES ('$Placa', '$Ano', '$Marca', '$Color', '$Modelo')";

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
