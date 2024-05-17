<?php
    $ID = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $Genero = $_POST['Genero'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];
    $DireccionID = $_POST['DireccionID'];

    print("ID Conductores: " . $ID . "<br>");
    print("Nombre: " . $Nombre . "<br>");
    print("Apellidos: " . $Apellidos . "<br>");
    print("Fecha de Nacimiento: " . $FechaNacimiento . "<br>");
    print("Genero: " . $Genero . "<br>");
    print("Telefono: " . $Telefono . "<br>");
    print("Correo: " . $Correo . "<br>");
    print("Direccion ID: " . $DireccionID . "<br>");

    $sql = "INSERT INTO Conductores (ID, Nombre, Apellidos, FechaNac, Genero, Telefono, Correo, DireccionID) VALUES ('$ID', '$Nombre', '$Apellidos', '$FechaNacimiento', '$Genero', '$Telefono', '$Correo', '$DireccionID')";


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
