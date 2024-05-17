<?php
    $IdLicencia=$_POST['IdLicencia'];

    $SQL="DELETE FROM Licencias WHERE id= '$IdLicencias'";

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