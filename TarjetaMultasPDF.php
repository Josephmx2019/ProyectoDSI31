<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $fecha = $_POST['Fecha'];
        $cantidad = $_POST['Cantidad'];
        $descripcion = $_POST['Descripcion'];
        $estado = $_POST['Estado'];
        $infraccion = $_POST['Infraccion'];
        $direccionID = $_POST['DireccionID'];
        $licenciaID = $_POST['LicenciaID'];
        $oficialID = $_POST['OficialID'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Fecha: $fecha",0,1);
        $pdf->Cell(0,10,"Cantidad: $cantidad",0,1);
        $pdf->Cell(0,10,"Descripción: $descripcion",0,1);
        $pdf->Cell(0,10,"Estado: $estado",0,1);
        $pdf->Cell(0,10,"Infracción: $infraccion",0,1);
        $pdf->Cell(0,10,"ID de Dirección: $direccionID",0,1);
        $pdf->Cell(0,10,"ID de Licencia: $licenciaID",0,1);
        $pdf->Cell(0,10,"ID de Oficial: $oficialID",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Multas</title>
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
    <form method="post" action="TarjetaMultasPDF.php">
        <label>Fecha</label>
        <input type="date" id="Fecha" name="Fecha">
        <br>
        <label>Cantidad</label>
        <input type="text" id="Cantidad" name="Cantidad">
        <br>
        <label>Descripción</label>
        <input type="text" id="Descripcion" name="Descripcion">
        <br>
        <label>Estado</label>
        <input type="text" id="Estado" name="Estado">
        <br>
        <label>Infracción</label>
        <input type="text" id="Infraccion" name="Infraccion">
        <br>
        <label>ID de Dirección</label>
        <input type="text" id="DireccionID" name="DireccionID">
        <br>
        <label>ID de Licencia</label>
        <input type="text" id="LicenciaID" name="LicenciaID">
        <br>
        <label>ID de Oficial</label>
        <input type="text" id="OficialID" name="OficialID">
        <br>
        <input type="submit">
    </form>
</body>
</html>
