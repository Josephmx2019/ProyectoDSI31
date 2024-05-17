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
            $SQL="SELECT * FROM multas WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Fecha </label>
                    <input type="date" id="Fecha" name="Fecha" value="<?php  print($Fila[1]); ?>">
                    <label> Cantidad </label>
                    <input type="text" id="Cantidad" name="Cantidad" value="<?php  print($Fila[2]); ?>">
                    <label> Descripcion </label>
                    <input type="text" id="Descripcion" name="Descripcion" value="<?php  print($Fila[3]); ?>">
                    <label> Estado </label>
                    <input type="text" id="Estado" name="Estado" value="<?php  print($Fila[4]); ?>">
                    <label> Infraccion </label>
                    <input type="text" id="Infraccion" name="Infraccion" value="<?php  print($Fila[5]); ?>">
                    <label> DireccionID </label>
                    <input type="text" id="DireccionID" name="DireccionID" value="<?php  print($Fila[6]); ?>">
                    <label> LicenciaID </label>
                    <input type="text" id="LicenciaID" name="LicenciaID" value="<?php  print($Fila[7]); ?>">
                    <label> OficialID </label>
                    <input type="text" id="OficialID" name="OficialID" value="<?php  print($Fila[8]); ?>">
                    <label> TarjetaID </label>
                    <input type="text" id="TarjetaID" name="TarjetaID" value="<?php  print($Fila[9]); ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php  print($ID); ?>">
                    <input type="submit" name="actualizar_multa" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_multa'])){
            $ID=$_POST['ID'];
            $Fecha=$_POST['Fecha'];
            $Cantidad=$_POST['Cantidad'];
            $Descripcion=$_POST['Descripcion'];
            $Estado=$_POST['Estado'];
            $Infraccion=$_POST['Infraccion'];
            $DireccionID=$_POST['DireccionID'];
            $LicenciaID=$_POST['LicenciaID'];
            $OficialID=$_POST['OficialID'];
            $TarjetaID=$_POST['TarjetaID'];
            
            $Con=Conectar();
            $SQL="UPDATE multas SET Fecha='$Fecha', Cantidad='$Cantidad', Descripcion='$Descripcion', Estado='$Estado', Infraccion='$Infraccion', DireccionID='$DireccionID', LicenciaID='$LicenciaID', OficialID='$OficialID', TarjetaID='$TarjetaID' WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            header("Location: UMultas.php");
        }
        ?>
    </body>

</html>
