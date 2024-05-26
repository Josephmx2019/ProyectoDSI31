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
            $SQL="SELECT * FROM direcciones WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Calle </label>
                    <input type="text" id="Calle" name="Calle" value="<?php  print($Fila[1]); ?>">
                    <label> Ciudad </label>
                    <input type="text" id="Ciudad" name="Ciudad" value="<?php  print($Fila[2]); ?>">
                    <label> Estado </label>
                    <input type="text" id="Estado" name="Estado" value="<?php  print($Fila[3]); ?>">
                    <label> País </label>
                    <input type="text" id="Pais" name="Pais" value="<?php  print($Fila[4]); ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php  print($ID); ?>">
                    <input type="submit" name="actualizar_direccion" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_direccion'])){
            $ID=$_POST['ID'];
            $Calle=$_POST['Calle'];
            $Ciudad=$_POST['Ciudad'];
            $Estado=$_POST['Estado'];
            $Pais=$_POST['Pais'];
            
            $Con=Conectar();
            $SQL="UPDATE direcciones SET Calle='$Calle', Ciudad='$Ciudad', Estado='$Estado', Pais='$Pais' WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            // Redireccionar o mostrar un mensaje de éxito, etc.
            header("Location: UDirecciones.php");
        }
        ?>
    </body>

</html>
