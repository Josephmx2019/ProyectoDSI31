<?php
    $ID = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Direccion = $_POST['Direccion'];
    $Telefono = $_POST['Telefono'];
    $Correo = $_POST['Correo'];

    print "ID CentrosVerificacion: " . $ID . "<br>";
    print "Nombre: " . $Nombre . "<br>";
    print "Direccion: " . $Direccion . "<br>";
    print "Telefono: " . $Telefono . "<br>";
    print "Correo: " . $Correo . "<br>";

    $sql = "INSERT INTO centrosverificacion (ID, Nombre, Direccion, Telefono, Correo) 
        VALUES ('$ID', '$Nombre', '$Direccion', '$Telefono', '$Correo')";

    include("Controlador.php");
    $Con=Conectar();
    $resultset=Ejecutar($Con,$sql);
    if($resultset==1){
        print("Registro insertado");
    }else{
        print("Registro no insertado");
    }
    Desconectar($Con);
?>
