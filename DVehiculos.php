<?php
    $IdVehiculo=$_POST['IdVehiculo'];

    $SQL="DELETE FROM VEHICULOS WHERE id= '$IdVehiculo'";

    include("Controlador.php");
    $Con=Conectar();
    $ResultSet=Ejecutar($Con,$SQL);
    Desconectar($Con);

    if($ResultSet==1){
        print("Registro Eliminado");
    }else{
        print("Registro no Eliminado");
    }
?>