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

            /* Estilos adicionales */
            .menu {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            .menu-item {
                display: inline-block;
                margin-right: 10px;
            }
            .submenu {
                display: none;
                list-style-type: none;
                padding: 0;
                margin: 0;
                position: absolute;
                background-color: #fff;
                border: 1px solid #ccc;
                border-radius: 5px;
                padding: 5px;
            }
            .menu-item:hover .submenu {
                display: block;
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
            $SQL="SELECT * FROM verificaciones WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Fecha </label>
                    <input type="text" id="Fecha" name="Fecha" value="<?php  print($Fila[1]); ?>">
                    <label> Resultado </label>
                    <input type="text" id="Resultado" name="Resultado" value="<?php  print($Fila[2]); ?>">
                    <label> Vehiculo </label>
                    <input type="text" id="Vehiculo" name="Vehiculo" value="<?php  print($Fila[3]); ?>">
                    <label> CentroVerID </label>
                    <input type="text" id="CentroVerID" name="CentroVerID" value="<?php  print($Fila[4]); ?>">
                    <label> TarjetaCirID </label>
                    <input type="text" id="TarjetaCirID" name="TarjetaCirID" value="<?php  print($Fila[5]); ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php  print($ID); ?>">
                    <input type="submit" name="actualizar_verificaciones" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_verificaciones'])){
            $ID=$_POST['ID'];
            $Fecha=$_POST['Fecha'];
            $Resultado=$_POST['Resultado'];
            $Vehiculo=$_POST['Vehiculo'];
            $CentroVerID=$_POST['CentroVerID'];
            $TarjetaCirID=$_POST['TarjetaCirID'];
            
            $Con=Conectar();
            $SQL="UPDATE verificaciones SET Fecha='$Fecha', Resultado='$Resultado', Vehiculo='$Vehiculo', CentroVerID='$CentroVerID', TarjetaCirID='$TarjetaCirID' WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            // Redireccionar o mostrar un mensaje de éxito, etc.
            header("Location: UVerificaciones.php");
        }
        ?>
    </body>

</html>
