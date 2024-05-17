<?php
    $IdVerificacion=$_POST['IdVerificacion'];

    $SQL="DELETE FROM VERIFICACION WHERE id= '$IdVerificacion'";

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