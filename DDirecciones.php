<?php
    $IdDireccion=$_POST['IdDireccion'];

    $SQL="DELETE FROM DIRECCIONES WHERE id= '$IdDireccion'";

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