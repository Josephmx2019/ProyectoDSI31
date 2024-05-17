<?php
    include("Controlador.php");
    $Con=Conectar();
    $SQL="SELECT *FROM Propietarios;";
    $Resultset=Ejecutar($Con,$SQL);

    $Resultado=mysqli_num_rows($Resultset);
    print($Resultado);
    Desconectar($Con);
?>