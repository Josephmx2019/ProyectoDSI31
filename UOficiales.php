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
            $SQL="SELECT * FROM oficiales WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Nombre </label>
                    <input type="text" id="Nombre" name="Nombre" value="<?php  print($Fila[1]); ?>">
                    <label> Apellido </label>
                    <input type="text" id="Apellido" name="Apellido" value="<?php  print($Fila[2]); ?>">
                    <label> Firma </label>
                    <input type="text" id="Firma" name="Firma" value="<?php  print($Fila[3]); ?>">
                    <label> Direccion </label>
                    <input type="text" id="Direccion" name="Direccion" value="<?php  print($Fila[4]); ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php  print($ID); ?>">
                    <input type="submit" name="actualizar_oficial" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_oficial'])){
            $ID=$_POST['ID'];
            $Nombre=$_POST['Nombre'];
            $Apellido=$_POST['Apellido'];
            $Firma=$_POST['Firma'];
            $Direccion=$_POST['Direccion'];
            
            $Con=Conectar();
            $SQL="UPDATE oficiales SET Nombre='$Nombre', Apellido='$Apellido', Firma='$Firma', Direccion='$Direccion' WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            // Redireccionar o mostrar un mensaje de éxito, etc.
            header("Location: UOficiales.php");
        }
        ?>
    </body>

</html>
