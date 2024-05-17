<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $expedicion = $_POST['Expedicion'];
        $vencimiento = $_POST['Vencimiento'];
        $numero = $_POST['Numero'];
        $tipo = $_POST['Tipo'];
        $conductorID = $_POST['ConductorID'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Fecha de Expedición: $expedicion",0,1);
        $pdf->Cell(0,10,"Fecha de Vencimiento: $vencimiento",0,1);
        $pdf->Cell(0,10,"Número de Licencia: $numero",0,1);
        $pdf->Cell(0,10,"Tipo de Licencia: $tipo",0,1);
        $pdf->Cell(0,10,"ID del Conductor: $conductorID",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Licencias</title>
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
        input[type="text"],
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
    <form method="post" action="TarjetaLicenciasPDF.php">
        <label>Fecha de Expedición</label>
        <input type="date" id="Expedicion" name="Expedicion">
        <br>
        <label>Fecha de Vencimiento</label>
        <input type="date" id="Vencimiento" name="Vencimiento">
        <br>
        <label>Número de Licencia</label>
        <input type="text" id="Numero" name="Numero">
        <br>
        <label>Tipo de Licencia</label>
        <input type="text" id="Tipo" name="Tipo">
        <br>
        <label>ID del Conductor</label>
        <input type="text" id="ConductorID" name="ConductorID">
        <br>
        <input type="submit">
    </form>
</body>
</html>