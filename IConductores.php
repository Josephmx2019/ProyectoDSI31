<?php
    $ID = $_POST['ID'];
    $Nombre = $_POST['Nombre'];
    $Apellidos = $_POST['Apellidos'];
    $FirmaTmp = file_get_contents($_FILES['Firma']['tmp_name']);
    $FotoTmp = file_get_contents($_FILES['Foto']['tmp_name']);
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $Genero = $_POST['Genero'];
    $GrupoSanguineo = $_POST['GrupoSanguineo'];
    $DonadorOrganos = $_POST['DonadorOrganos'];
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

    $sql = "INSERT INTO Conductores (ID, Nombre, Apellidos, Foto, Firma, FechaNac, Genero, GrupoSang, DonadorOrg, Telefono, Correo, DireccionID) VALUES ('$ID', '$Nombre', '$Apellidos', '$FotoTmp', '$FirmaTmp', '$FechaNacimiento', '$Genero', '$GrupoSanguineo','$DonadorOrganos', '$Telefono', '$Correo', '$DireccionID')";
    


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
