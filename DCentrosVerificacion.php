<?php
    $IdCentroVerificacion=$_POST['IdCentroVerificacion'];

    $SQL="DELETE FROM CENTROSVERIFICACION WHERE id= '$IdCentroVerificacion'";

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