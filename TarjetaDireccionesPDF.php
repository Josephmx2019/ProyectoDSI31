<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $calle = $_POST['Calle'];
        $ciudad = $_POST['Ciudad'];
        $estado = $_POST['Estado'];
        $pais = $_POST['Pais'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Calle: $calle",0,1);
        $pdf->Cell(0,10,"Ciudad: $ciudad",0,1);
        $pdf->Cell(0,10,"Estado: $estado",0,1);
        $pdf->Cell(0,10,"País: $pais",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Direcciones</title>
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
    <form method="post" action="TarjetaDireccionesPDF.php">
        <label>Calle</label>
        <input type="text" id="Calle" name="Calle">
        <br>
        <label>Ciudad</label>
        <input type="text" id="Ciudad" name="Ciudad">
        <br>
        <label>Estado</label>
        <input type="text" id="Estado" name="Estado">
        <br>
        <label>País</label>
        <input type="text" id="Pais" name="Pais">
        <br>
        <input type="submit">
    </form>
</body>
</html>
