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
            <label> Placa </label>
            <input type="text" id="Placa" name="Placa">
            <input type="submit">
        </form>

        <?php
        include("Controlador.php");
        if(isset($_POST['Placa'])){
            $Placa=$_POST['Placa'];
            
            $Con=Conectar();
            $SQL="SELECT * FROM vehiculos WHERE Placa='$Placa';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Año </label>
                    <input type="number" id="Año" name="Año" value="<?php  print($Fila[1]); ?>">
                    <label> Modelo </label>
                    <input type="text" id="Modelo" name="Modelo" value="<?php  print($Fila[2]); ?>">
                    <label> Marca </label>
                    <input type="text" id="Marca" name="Marca" value="<?php  print($Fila[3]); ?>">
                    <label> Color </label>
                    <input type="text" id="Color" name="Color" value="<?php  print($Fila[4]); ?>">
                    <label> TarjetaCirID </label>
                    <input type="text" id="TarjetaCirID" name="TarjetaCirID" value="<?php  print($Fila[5]); ?>">
                    <input type="hidden" id="Placa" name="Placa" value="<?php  print($Placa); ?>">
                    <input type="submit" name="actualizar_vehiculos" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_vehiculos'])){
            $Placa=$_POST['Placa'];
            $Año=$_POST['Año'];
            $Modelo=$_POST['Modelo'];
            $Marca=$_POST['Marca'];
            $Color=$_POST['Color'];
            $TarjetaCirID=$_POST['TarjetaCirID'];
            
            $Con=Conectar();
            $SQL="UPDATE vehiculos SET Año='$Año', Modelo='$Modelo', Marca='$Marca', Color='$Color', TarjetaCirID='$TarjetaCirID' WHERE Placa='$Placa';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            // Redireccionar o mostrar un mensaje de éxito, etc.
            header("Location: UVehiculos.php");
        }
        ?>
    </body>

</html>
