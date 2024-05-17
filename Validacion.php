<?php
    $UserName=$_POST['UserName'];
    $Password=$_POST['Password'];
    
    include("Controlador.php");
    $Con=Conectar();
    $SQL="SELECT * FROM CUENTAS WHERE UserName='$UserName';";
    $ResultSet=Ejecutar($Con,$SQL);

    //Validar si el Usuario Existe 
    $Existe= mysqli_num_rows($ResultSet);
    if($Existe==1){
        print("El usuario Existe");
        $Fila=mysqli_fetch_row($ResultSet);
        if($Password==$Fila[1]){
            print("Contraseña Correcta");
            if($Fila[3]==1){
                print("Cuenta Activa");
                if($Fila[4]==0){
                    print("Cuenta No Bloqueda");
                    
                    print("Entrar");
                    if($Fila[2]=="U"){
                        print("Entrar como usuario");
                    }else{
                        print("Entrar como Administrador");
                    }
                }else{
                    print("Cuenta Bloqueda");
                }
            }else{
                print("Cuenta  NO Activa");
            }
        }else{
            print("Contraseña incorrecta");
            // Incrementar el contador de Intentos
            $Intentos = $Fila[5] + 1; // Incrementar intentos fallidos

            if ($Intentos >= 3) {
                // Bloquear cuenta al alcanzar 3 intentos fallidos
                $SQLUpdate = "UPDATE cuentas SET Bloqueo = 1 WHERE UserName = '$UserName';";
                $ResultUpdate = Ejecutar($Con, $SQLUpdate);

                if (!$ResultUpdate) {
                    // Error al ejecutar la consulta
                    print("Error al bloquear usuario: " . mysqli_error($Con));
                } else {
                    print("Usuario bloqueado debido a 3 intentos fallidos.");
                }
            } else {
                // Actualizar el número de intentos fallidos en la base de datos
                $SQLUpdate = "UPDATE cuentas SET Intentos = $Intentos WHERE UserName = '$UserName';";
                $ResultUpdate = Ejecutar($Con, $SQLUpdate);

                if (!$ResultUpdate) {
                    // Error al ejecutar la consulta
                    print("Error al actualizar intentos: " . mysqli_error($Con));
                } else {
                    print("Intento de inicio de sesión fallido. Intento número $Intentos.");
                }
            }
        }
    }else{
        print("El usuario  NO Existe");
    }


?>