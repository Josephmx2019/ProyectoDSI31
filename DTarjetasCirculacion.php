<?php
    $IdTarjetaCirculacion=$_POST['IdTarjetaCirculacion'];

    $SQL="DELETE FROM TARJETASCIRCULACION WHERE id= '$IdTarjetasCirculacion'";

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