<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $firma = $_POST['Firma'];
        $direccion = $_POST['Direccion'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Nombre: $nombre",0,1);
        $pdf->Cell(0,10,"Apellido: $apellido",0,1);
        $pdf->Cell(0,10,"Firma: $firma",0,1);
        $pdf->Cell(0,10,"Dirección: $direccion",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Oficiales</title>
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
    </style>
</head>
<body>
    <form method="post" action="TarjetaOficialesPDF.php">
        <label>Nombre</label>
        <input type="text" id="Nombre" name="Nombre">
        <br>
        <label>Apellido</label>
        <input type="text" id="Apellido" name="Apellido">
        <br>
        <label>Firma</label>
        <input type="text" id="Firma" name="Firma">
        <br>
        <label>Dirección</label>
        <input type="text" id="Direccion" name="Direccion">
        <br>
        <input type="submit">
    </form>
</body>
</html>
