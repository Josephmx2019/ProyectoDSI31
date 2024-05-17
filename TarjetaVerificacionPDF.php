<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $tipoDeServicio = $_POST['Tipo_de_servicio'];
        $marca = $_POST['Marca'];
        $submarca = $_POST['Submarca'];
        $anioModelo = $_POST['Anio_Modelo'];
        $placas = $_POST['Placas'];
        $numeroDeSerie = $_POST['Numero_de_serie'];
        $clase = $_POST['Clase'];
        $tipoDeCombustible = $_POST['Tipo_de_combustible'];
        $niv = $_POST['NIV'];
        $numeroDeCilindraje = $_POST['Numero_de_cilindraje'];
        $tipoDeCarroceria = $_POST['Tipo_de_carroceria'];
        $entidadFederativa = $_POST['Entidad_federativa'];
        $municipio = $_POST['Municipio'];
        $noDeCentro = $_POST['No_De_centro'];
        $noDeLineaDeVerificacion = $_POST['No_De_linea_de_verificacion'];
        $tecnicoVerificador = $_POST['Tecnico_verificador'];
        $fechaDeExpedicion = $_POST['Fecha_de_expedicion'];
        $horaDeEntrada = $_POST['Hora_de_entrada'];
        $horaDeSalida = $_POST['Hora_de_salida'];
        $motivoDeVerificacion = $_POST['Motivo_de_verificacion'];
        $folioDeCertificado = $_POST['Folio_de_certificado'];
        $semestre = $_POST['Semestre'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Tipo de Servicio: $tipoDeServicio",0,1);
        $pdf->Cell(0,10,"Marca: $marca",0,1);
        $pdf->Cell(0,10,"Submarca: $submarca",0,1);
        $pdf->Cell(0,10,"Año/Modelo: $anioModelo",0,1);
        $pdf->Cell(0,10,"Placas: $placas",0,1);
        $pdf->Cell(0,10,"Número de Serie: $numeroDeSerie",0,1);
        $pdf->Cell(0,10,"Clase: $clase",0,1);
        $pdf->Cell(0,10,"Tipo de Combustible: $tipoDeCombustible",0,1);
        $pdf->Cell(0,10,"No. Identificación vehicular (NIV): $niv",0,1);
        $pdf->Cell(0,10,"Número de Cilindraje: $numeroDeCilindraje",0,1);
        $pdf->Cell(0,10,"Tipo de Carrocería: $tipoDeCarroceria",0,1);
        $pdf->Cell(0,10,"Entidad Federativa: $entidadFederativa",0,1);
        $pdf->Cell(0,10,"Municipio: $municipio",0,1);
        $pdf->Cell(0,10,"No.De centro: $noDeCentro",0,1);
        $pdf->Cell(0,10,"No. De línea de verificación: $noDeLineaDeVerificacion",0,1);
        $pdf->Cell(0,10,"Técnico Verificador: $tecnicoVerificador",0,1);
        $pdf->Cell(0,10,"Fecha de Expedición: $fechaDeExpedicion",0,1);
        $pdf->Cell(0,10,"Hora de Entrada: $horaDeEntrada",0,1);
        $pdf->Cell(0,10,"Hora de Salida: $horaDeSalida",0,1);
        $pdf->Cell(0,10,"Motivo de Verificación: $motivoDeVerificacion",0,1);
        $pdf->Cell(0,10,"Folio de Certificado: $folioDeCertificado",0,1);
        $pdf->Cell(0,10,"Semestre: $semestre",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Verificación Vehicular</title>
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
        input[type="number"],
        select,
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <form method="post" action="TarjetaVerificacionPDF.php">
        <label>Tipo de servicio</label>
        <input type="text" id="Tipo_de_servicio" name="Tipo_de_servicio">
        <br>
        <label>Marca</label>
        <input type="text" id="Marca" name="Marca">
        <br>
        <label>Submarca</label>
        <input type="text" id="Submarca" name="Submarca">
        <br>
        <label>Año/Modelo</label>
        <input type="number" id="Anio_Modelo" name="Anio_Modelo">
        <br>
        <label>Placas</label>
        <input type="text" id="Placas" name="Placas">
        <br>
        <label>Número de serie</label>
        <input type="text" id="Numero_de_serie" name="Numero_de_serie">
        <br>
        <label>Clase</label>
        <input type="text" id="Clase" name="Clase">
        <br>
        <label>Tipo de combustible</label>
        <input type="text" id="Tipo_de_combustible" name="Tipo_de_combustible">
        <br>
        <label>No. Identificación vehicular (NIV)</label>
        <input type="text" id="NIV" name="NIV">
        <br>
        <label>Número de cilindraje</label>
        <input type="text" id="Numero_de_cilindraje" name="Numero_de_cilindraje">
        <br>
        <label>Tipo de carrocería</label>
        <input type="text" id="Tipo_de_carroceria" name="Tipo_de_carroceria">
        <br>
        <label>Entidad federativa</label>
        <input type="text" id="Entidad_federativa" name="Entidad_federativa">
        <br>
        <label>Municipio</label>
        <input type="text" id="Municipio" name="Municipio">
        <br>
        <label>No.De centro</label>
        <input type="text" id="No_De_centro" name="No_De_centro">
        <br>
        <label>No. De linea de verificación</label>
        <input type="text" id="No_De_linea_de_verificacion" name="No_De_linea_de_verificacion">
        <br>
        <label>Técnico verificador</label>
        <input type="text" id="Tecnico_verificador" name="Tecnico_verificador">
        <br>
        <label>Fecha de expedición</label>
        <input type="date" id="Fecha_de_expedicion" name="Fecha_de_expedicion">
        <br>
        <label>Hora de entrada</label>
        <input type="time" id="Hora_de_entrada" name="Hora_de_entrada">
        <br>
        <label>Hora de salida</label>
        <input type="time" id="Hora_de_salida" name="Hora_de_salida">
        <br>
        <label>Motivo de verificación</label>
        <input type="text" id="Motivo_de_verificacion" name="Motivo_de_verificacion">
        <br>
        <label>Folio de certificado</label>
        <input type="text" id="Folio_de_certificado" name="Folio_de_certificado">
        <br>
        <label>Semestre</label>
        <input type="number" id="Semestre" name="Semestre">
        <br>
        <input type="submit">
    </form>
</body>
</html>
