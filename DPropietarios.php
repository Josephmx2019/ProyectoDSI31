<?php
    $IdPropietario=$_POST['IdPropietario'];

    $SQL="DELETE FROM PROPIETARIO WHERE id= '$IdPropietario'";

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