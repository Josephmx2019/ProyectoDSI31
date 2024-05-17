<?php
    $UserName = $_POST['UserName'];
    $PASSWORD = $_POST['PASSWORD'];

    include("Controlador.php");
    $Con=Conectar();
    $sql = "SELECT * FROM CUENTAS WHERE UserName= '$UserName' ";

    $resultset=Ejecutar($Con,$sql);
    $Existe= mysql_num_rows($resultset);
    
    if($Existe==1){
        print("El usuario Existe");
        $Fila=mysql_fetch_row($resultset)
        if($PASSWORD==$Fila[1]){
            print("Contraseña Correcta");
            if($Fila[3]==1){
                print("Cuenta Activa");
                if($Fila[4]==0){
                    print("Cuenta NO Bloqueada");
                    print("Entrar");
                    if($Fila[2]=="U"){
                        print("Entrar como administrador");
                    }elseif($Fila[2]=="A") {
                        print("Entrar como usuario");
                    }
                }else{
                    print("Cuenta Bloqueada");
                }
            }else{
                print("Cuenta NO Activa");
            }
        }else{
            print("Contraseña Incorrecta")
            $intentos++;

            if ($intentos >= 3) {
                print("Demasiados intentos fallidos");
      
            }
        }
    }else{
        print("El usuario NO Existe");
    }
    Desconectar($Con);
?>