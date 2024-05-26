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
            <label> Id </label>
            <input type="text" id="Id" name="Id">
            <input  type="submit">
        </form>

        <?php
        include("Controlador.php");
            if(isset($_POST['Id'])){
                $Id=$_POST['Id'];
                
                $Con=Conectar();
                $SQL="SELECT * FROM centrosverificacion WHERE ID='$Id';";
                $ResultSet=Ejecutar($Con,$SQL);
                $Fila=mysqli_fetch_row($ResultSet);
                    ?>
                    <form method="POST">
                        <label> Nombre </label>
                        <input type="text" id="Nombre" name="Nombre" value="<?php  print($Fila[1]); ?>">
                        <label> Direccion </label>
                        <input type="text" id="Direccion" name="Direccion" value="<?php  print($Fila[2]); ?>">
                        <label> Telefono </label>
                        <input type="text" id="Telefono" name="Telefono" value="<?php  print($Fila[3]); ?>">
                        <label> Correo </label>
                        <input type="text" id="Correo" name="Correo" value="<?php  print($Fila[4]); ?>">
                        <input type="hidden" id="Id" name="Id" value="<?php  print($IdPropietario); ?>">
                        <input  type="submit">
                    </form>
                    <?php
                Desconectar($Con);
            }
            if(isset($_POST['Nombre'])){
                $Nombre=$_POST['Nombre'];
                $Direccion=$_POST['Direccion'];
                $Telefono=$_POST['Telefono'];
                $Correo=$_POST['Correo'];
                $Con=Conectar();
                $SQL="UPDATE centrosverificacion SET Nombre='$Nombre', Direccion='$Direccion',Telefono='$Telefono', Correo?'$Correo' WHERE ID='$Id'; ";
                $ResultSet=Ejecutar($Con,$SQL);
                Desconectar($Con);
                header("Location:UCentrosverificacion.php");
            }   
        ?>
    </body>

</html>