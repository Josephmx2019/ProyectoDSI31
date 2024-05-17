<?php

Function Conectar(){
    $Servidor ="127.0.0.1";
    $Usuario ="root";
    $Password = "";
    $BD = "controlvehicular31";

    $Con = mysqli_connect($Servidor,$Usuario,$Password,$BD);
    return $Con;
}

Function Ejecutar($Con, $SQL){
    $ResultSet=mysqli_query($Con,$SQL);
    return $ResultSet;
}

Function Procesar(){

}

Function Desconectar($Con){
    $R=mysqli_close($Con);
    return $R;
}

?>