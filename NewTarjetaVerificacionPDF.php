<?php
    if (isset($_GET['folio'])) {
        $folio = $_GET['folio'];
        
        require('fpdf.php');

        include("Controlador.php");
        $con = Conectar();

        $SQL = "SELECT * FROM tarjetaverificacion WHERE ID = '$folio';"; 

        $ResultSet = Ejecutar($con, $SQL);

        $Fila = mysqli_fetch_row($ResultSet);

        $xmlFilePath = 'C:/xampp/htdocs/DSI31/tarjeta_verificacion_' . $folio . '.xml';
    $xmlFile = fopen($xmlFilePath, 'w');

    if ($xmlFile) {
        fwrite($xmlFile, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
        fwrite($xmlFile, "<tarjeta_verificacion>\n");

        // Agregar los datos de la fila al archivo XML
        fwrite($xmlFile, "  <ID>" . $Fila[0] . "</ID>\n");
        fwrite($xmlFile, "  <Tipo_de_Servicio>" . $Fila[1] . "</Tipo_de_Servicio>\n");
        fwrite($xmlFile, "  <Marca>" . $Fila[2] . "</Marca>\n");
        fwrite($xmlFile, "  <Submarca>" . $Fila[3] . "</Submarca>\n");
        fwrite($xmlFile, "  <Año_Modelo>" . $Fila[4] . "</Año_Modelo>\n");
        fwrite($xmlFile, "  <Placas>" . $Fila[5] . "</Placas>\n");
        fwrite($xmlFile, "  <Numero_de_Serie>" . $Fila[6] . "</Numero_de_Serie>\n");
        fwrite($xmlFile, "  <Clase>" . $Fila[7] . "</Clase>\n");
        fwrite($xmlFile, "  <Tipo_de_Combustible>" . $Fila[8] . "</Tipo_de_Combustible>\n");
        fwrite($xmlFile, "  <No_Identificacion_Vehicular>" . $Fila[9] . "</No_Identificacion_Vehicular>\n");
        fwrite($xmlFile, "  <Numero_de_Cilindros>" . $Fila[10] . "</Numero_de_Cilindros>\n");
        fwrite($xmlFile, "  <Tipo_de_Carroceria>" . $Fila[11] . "</Tipo_de_Carroceria>\n");
        fwrite($xmlFile, "  <Entidad_Federativa>" . $Fila[12] . "</Entidad_Federativa>\n");
        fwrite($xmlFile, "  <Municipio>" . $Fila[13] . "</Municipio>\n");
        fwrite($xmlFile, "  <No_Centro_de_Verificacion>" . $Fila[14] . "</No_Centro_de_Verificacion>\n");
        fwrite($xmlFile, "  <No_de_Linea_de_Verificacion>" . $Fila[15] . "</No_de_Linea_de_Verificacion>\n");
        fwrite($xmlFile, "  <Tecnico_Verificador>" . $Fila[16] . "</Tecnico_Verificador>\n");
        fwrite($xmlFile, "  <Fecha_de_Expedicion>" . $Fila[17] . "</Fecha_de_Expedicion>\n");
        fwrite($xmlFile, "  <Hora_de_Entrada>" . $Fila[18] . "</Hora_de_Entrada>\n");
        fwrite($xmlFile, "  <Hora_de_Salida>" . $Fila[19] . "</Hora_de_Salida>\n");
        fwrite($xmlFile, "  <Motivo_de_Verificacion>" . $Fila[20] . "</Motivo_de_Verificacion>\n");
        fwrite($xmlFile, "  <Folio_de_Certificado>" . $Fila[21] . "</Folio_de_Certificado>\n");
        fwrite($xmlFile, "  <Semestre>" . $Fila[22] . "</Semestre>\n");

        fwrite($xmlFile, "</tarjeta_verificacion>");
        fclose($xmlFile);
    } else {
        echo "No se pudo crear el archivo XML.";
    }

        $pdf = new FPDF('L', 'mm', 'A4'); // 'L' para orientación horizontal
        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(195, 10, 'Programa estatal de verificación vehicular', 0, 4, 'C');
        $pdf->Cell(195, 10, 'Poder Ejecutivo del Estado de Queretaro', 0, 4, 'C');
        $pdf->Image('Escudo.png', 10, 10, 35, 40);
        $pdf->Image('QRO.png', 20, 10, 35, 40);
        $pdf->Image('Código de barras.webp', 70, 10, 35, 40);
        $pdf->Image('QR.png', 70, 30, 40, 40);

        // Encabezados de las columnas
        $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tipo de Servicio', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Marca', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Submarca', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Año Modelo', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Placas', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Numero de Serie', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Clase', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tipo de Combustible', 1, 0, 'C');
        $pdf->Cell(30, 10, 'No Identificación Vehicular', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Numero de Cilindros', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tipo de Carroceria', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Entidad Federativa', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Municipio', 1, 0, 'C');
        $pdf->Cell(30, 10, 'No Centro de Verificacion', 1, 0, 'C');
        $pdf->Cell(30, 10, 'No de Linea de Verificacion', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Tecnico Verificador', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Fecha de Expedición', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Hora de Entrada', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Hora de Salida', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Motivo de Verificación', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Folio de Certificado', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Semestre', 1, 1, 'C');

        // Agregar datos de la fila
        for ($i = 1; $i < 23; $i++) {
            $pdf->Cell(30, 10, $Fila[$i], 1, 0, 'C');
        }

        $pdf->Output('I');
    }
?>
