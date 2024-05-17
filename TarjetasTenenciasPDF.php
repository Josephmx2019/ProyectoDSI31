<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $fechaPago = $_POST['FechaPago'];
        $monto = $_POST['Monto'];
        $tarjetaCirID = $_POST['TarjetaCirID'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Fecha de Pago: $fechaPago",0,1);
        $pdf->Cell(0,10,"Monto: $monto",0,1);
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
    <title>Formulario de Tenencias</title>
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
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="post" action="TarjetasTenenciasPDF.php">
        <label>Fecha de Pago</label>
        <input type="date" id="FechaPago" name="FechaPago">
        <br>
        <label>Monto</label>
        <input type="number" id="Monto" name="Monto">
        <br>
        <label>ID de Tarjeta de Circulación</label>
        <input type="text" id="TarjetaCirID" name="TarjetaCirID">
        <br>
        <input type="submit">
    </form>
</body>
</html>
