<?php
    $IdMulta=$_POST['IdMulta'];

    $SQL="DELETE FROM MULTAS WHERE id= '$IdMulta'";

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