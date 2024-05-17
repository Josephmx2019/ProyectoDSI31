<?php
    $IdPropietarios = $_REQUEST['Id_Oficiales'];
    $Nombre = $_REQUEST['Nombre'];
    $Apellido = $_REQUEST['Apellido'];
    $Direccion = $_REQUEST['Direccion'];
    $RFC = $_REQUEST['Firma'];

    print("IdPropietario: " . $IdPropietarios . "<br>");
    print("Nombre: " . $Nombre . "<br>");
    print("Apellido: " . $Apellido . "<br>");
    print("Direccion: " . $Direccion . "<br>");
    print("RFC: " . $RFC . "<br>");

    $sql = "INSERT INTO Propietarios (IdPropietario, Nombre, Apellido, Direccion, RFC) VALUES ('$IdPropietarios', '$Nombre', '$Apellido', '$Direccion', '$RFC')";

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
