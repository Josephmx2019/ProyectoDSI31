<?php
    $IdVerificaciones = $_POST['Id_Verificaciones'];
    $Fecha = $_POST['Fecha'];
    $Resultado = $_POST['Resultado'];
    $Vehiculo = $_POST['Vehiculo'];
    $IdCentroVerificacion = $_POST['Id_Centro_Verificacion'];

    print("ID Verificaciones: " . $IdVerificaciones . "<br>");
    print("Fecha: " . $Fecha . "<br>");
    print("Resultado: " . $Resultado . "<br>");
    print("Vehículo: " . $Vehiculo . "<br>");
    print("ID Centro Verificación: " . $IdCentroVerificacion . "<br>");

    $sql = "INSERT INTO Verificaciones VALUES ('$IdVerificaciones', '$Fecha', '$Resultado', '$Vehiculo', '$IdCentroVerificacion')";

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
