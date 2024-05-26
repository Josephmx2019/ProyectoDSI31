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
            $SQL="SELECT * FROM tarjetascirculacion WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            $Fila=mysqli_fetch_row($ResultSet);
                ?>
                <form method="POST">
                    <label> Expedicion </label>
                    <input type="text" id="Expedicion" name="Expedicion" value="<?php  print($Fila[1]); ?>">
                    <label> Vencimiento </label>
                    <input type="date" id="Vencimiento" name="Vencimiento" value="<?php  print($Fila[2]); ?>">
                    <label> Numero </label>
                    <input type="text" id="Numero" name="Numero" value="<?php  print($Fila[3]); ?>">
                    <input type="hidden" id="ID" name="ID" value="<?php  print($ID); ?>">
                    <input type="submit" name="actualizar_tarjetacirculacion" value="Actualizar">
                </form>
                <?php
            Desconectar($Con);
        }

        if(isset($_POST['actualizar_tarjetacirculacion'])){
            $ID=$_POST['ID'];
            $Expedicion=$_POST['Expedicion'];
            $Vencimiento=$_POST['Vencimiento'];
            $Numero=$_POST['Numero'];
            
            $Con=Conectar();
            $SQL="UPDATE tarjetascirculacion SET Expedicion='$Expedicion', Vencimiento='$Vencimiento', Numero='$Numero' WHERE ID='$ID';";
            $ResultSet=Ejecutar($Con,$SQL);
            Desconectar($Con);
            // Redireccionar o mostrar un mensaje de éxito, etc.
            header("Location: UTarjetacirculacion.php");
        }
        ?>
    </body>

</html>
