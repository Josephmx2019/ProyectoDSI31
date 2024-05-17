<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $nombre = $_POST['Nombre'];
        $apellidos = $_POST['Apellidos'];
        $fechaNac = $_POST['FechaNac'];
        $genero = $_POST['Genero'];
        $telefono = $_POST['Telefono'];
        $correo = $_POST['Correo'];
        $direccionID = $_POST['DireccionID'];
        $tarjetaCirID = $_POST['TarjetaCirID'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Nombre: $nombre",0,1);
        $pdf->Cell(0,10,"Apellidos: $apellidos",0,1);
        $pdf->Cell(0,10,"Fecha de Nacimiento: $fechaNac",0,1);
        $pdf->Cell(0,10,"Género: $genero",0,1);
        $pdf->Cell(0,10,"Teléfono: $telefono",0,1);
        $pdf->Cell(0,10,"Correo: $correo",0,1);
        $pdf->Cell(0,10,"ID de Dirección: $direccionID",0,1);
        $pdf->Cell(0,10,"ID de Tarjeta de Circulación: $tarjetaCirID",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Propietario</title>
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
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="post" action="TarjetaPropietariosPDF.php">
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre">
        <br>
        <label>Apellidos</label>
        <input type="text" id="Apellidos" name="Apellidos">
        <br>
        <label>Fecha de Nacimiento</label>
        <input type="date" id="FechaNac" name="FechaNac">
        <br>
        <label>Género</label>
        <input type="text" id="Genero" name="Genero">
        <br>
        <label>Teléfono</label>
        <input type="text" id="Telefono" name="Telefono">
        <br>
        <label>Correo</label>
        <input type="text" id="Correo" name="Correo">
        <br>
        <label>ID de Dirección</label>
        <input type="text" id="DireccionID" name="DireccionID">
        <br>
        <label>ID de Tarjeta de Circulación</label>
        <input type="text" id="TarjetaCirID" name="TarjetaCirID">
        <br>
        <input type="submit">
    </form>
</body>
</html>