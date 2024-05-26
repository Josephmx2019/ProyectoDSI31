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
        <form action="">
            <label>Valor</label>
            <input type="text" name="Valor" id="Valor">
            <label>Atributo</label>
            <input type="radio" name="Atributo" id="Atributo" value="ID" checked>ID
            <input type="radio" name="Atributo" id="Atributo" value="Calle">Calle
            <input type="radio" name="Atributo" id="Atributo" value="Numero">Número
            <input type="radio" name="Atributo" id="Atributo" value="Colonia">Colonia
            <input type="radio" name="Atributo" id="Atributo" value="Ciudad">Ciudad
            <input type="radio" name="Atributo" id="Atributo" value="Estado">Estado
            <input type="radio" name="Atributo" id="Atributo" value="CP">Código Postal
            <input type="submit">
        </form>

        <?php
            if(isset($_REQUEST['Valor'])){
                $Valor=$_REQUEST['Valor'];
                $Atributo=$_REQUEST['Atributo'];
                include("Controlador.php");

                $Con=Conectar();

                $SQL="SELECT * FROM direcciones WHERE $Atributo LIKE '%$Valor%'";
                $ResultSet=Ejecutar($Con,$SQL);

                $n=mysqli_num_rows($ResultSet);
                for($f=0; $f < $n; $f++){
                    $Fila=mysqli_fetch_row($ResultSet);
                    print($Fila[0]."-".$Fila[1]."-".$Fila[2]."-".$Fila[3]."-".$Fila[4]."-".$Fila[5]."-".$Fila[6]);
                    print("<br>");
                }

                Desconectar($Con);
            }
        ?>
    </body>
</html>
