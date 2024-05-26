<html>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menú de Administrador</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            /* Estilos para el formulario */
            form {
                max-width: 400px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 10px;
                background-color: #f9f9f9;
            }
            label {
                display: block;
                font-weight: bold;
                margin-bottom: 5px;
            }
            input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }
            input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 10px 20px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
            
    </head>
    <body>
        <form method="post">
            <label> ID </label>
            <input type="text" id="ID" name="ID">
            <input type="submit">
        </form>

        <?php
        include("Controlador.php");
        if(isset($_POST['ID'])){
            $ID=$_POST['ID'];
            
            $Con=Conectar();
            $SQL="SELECT * FROM propietario WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Nombre </label>
                    <input type="text" id="Nombre" name="Nombre" value="<?php  print($Fila[1]); ?>">
                    <label> Apellidos </label>
                    <input type="text" id="Apellidos" name="Apellidos" value="<?php  print($Fila[2]); ?>">
                    <label> FechaNac </label>
                    <input type="text" id="FechaNac" name="FechaNac" value="<?php  print($Fila[3]); ?>">
                    <label> Genero </label>
                    <input type="text" id="Genero" name="Genero" value="<?php  print($Fila[4]); ?>">
                    <label> Telefono </label>
                    <input type="text" id="Telefono" name="Telefono" value="<?php  print($Fila[5]); ?>">
                    <label> Correo </label>
                    <input type="text" id="Correo" name="Correo" value="<?php  print($Fila[6]); ?>">
                    <label> DireccionID </label>
                    <input type="text" id="DireccionID" name="DireccionID" value="<?php  print($Fila[7]); ?>">
                    <label> TarjetaCirID </label>
                    <input type="text" id="TarjetaCirID" name="TarjetaCirID" value="<?php  print($Fila[8]); ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php  print($ID); ?>">
                    <input type="submit" name="actualizar_propietario" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_propietario'])){
            $ID=$_POST['ID'];
            $Nombre=$_POST['Nombre'];
            $Apellidos=$_POST['Apellidos'];
            $FechaNac=$_POST['FechaNac'];
            $Genero=$_POST['Genero'];
            $Telefono=$_POST['Telefono'];
            $Correo=$_POST['Correo'];
            $DireccionID=$_POST['DireccionID'];
            $TarjetaCirID=$_POST['TarjetaCirID'];
            
            $Con=Conectar();
            $SQL="UPDATE propietario SET Nombre='$Nombre', Apellidos='$Apellidos', FechaNac='$FechaNac', Genero='$Genero', Telefono='$Telefono', Correo='$Correo', DireccionID='$DireccionID', TarjetaCirID='$TarjetaCirID' WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            // Redireccionar o mostrar un mensaje de éxito, etc.
            header("Location: UPropietario.php");
        }
        ?>
    </body>

</html>
