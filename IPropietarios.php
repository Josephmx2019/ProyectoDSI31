<?php
    $IdPropietarios = $_GET['Id_Propietarios'];
    $Nombre = $_GET['Nombre'];
    $Apellido = $_GET['Apellido'];
    $Direccion = $_GET['Direccion'];
    $RFC = $_GET['RFC'];
    $Genero = $_GET['Genero'];
    $Telefono = $_GET['Telefono'];
    $Correo = $_GET['Correo'];

    print("IdPropietario: " . $IdPropietarios . "<br>");
    print("Nombre: " . $Nombre . "<br>");
    print("Apellido: " . $Apellido . "<br>");
    print("Direccion: " . $Direccion . "<br>");
    print("RFC: " . $RFC . "<br>");
    print("Genero: " . $Genero . "<br>");
    print("Telefono: " . $Telefono . "<br>");
    print("Correo: " . $Correo . "<br>");

    $SQL = "INSERT INTO Propietario VALUES ('$IdPropietarios', '$Nombre', '$Apellido', '$Direccion', '$RFC', '$Genero', '$Telefono', '$Correo')";

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
