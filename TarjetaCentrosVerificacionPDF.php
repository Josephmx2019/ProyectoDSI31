<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $nombre = $_POST['Nombre'];
        $direccion = $_POST['Direccion'];
        $telefono = $_POST['Telefono'];
        $correo = $_POST['Correo'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Nombre del Centro: $nombre",0,1);
        $pdf->Cell(0,10,"Dirección: $direccion",0,1);
        $pdf->Cell(0,10,"Teléfono: $telefono",0,1);
        $pdf->Cell(0,10,"Correo: $correo",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Centros de Verificación</title>
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
        input[type="tel"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="post" action="TarjetaCentrosVerificacionPDF.php">
        <label>Nombre del Centro</label>
        <input type="text" id="Nombre" name="Nombre">
        <br>
        <label>Dirección</label>
        <input type="text" id="Direccion" name="Direccion">
        <br>
        <label>Teléfono</label>
        <input type="tel" id="Telefono" name="Telefono">
        <br>
        <label>Correo</label>
        <input type="email" id="Correo" name="Correo">
        <br>
        <input type="submit">
    </form>
</body>
</html>
