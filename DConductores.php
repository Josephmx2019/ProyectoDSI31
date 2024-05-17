<?php
    $IdConductor=$_POST['IdConductor'];

    $SQL="DELETE FROM CONDUCTORES WHERE id= '$IdConductor'";

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