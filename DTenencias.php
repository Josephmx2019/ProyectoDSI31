<?php
    $IdTenencia=$_POST['IdTenencia'];

    $SQL="DELETE FROM TENENCIA WHERE id= '$IdTenencia'";

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