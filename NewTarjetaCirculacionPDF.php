<?php
if (isset($_GET['folio'])) {
    $folio = $_GET['folio'];

    require('fpdf.php');

    include("Controlador.php");
    $con = Conectar();

    $SQL = "SELECT * FROM tarjetacirculacion WHERE ID = '$folio';"; 

    $ResultSet = Ejecutar($con, $SQL);

    $Fila = mysqli_fetch_row($ResultSet);

    // Generar el archivo XML usando fopen, fwrite y fclose
    $xmlFilePath = 'C:/xampp/htdocs/DSI31/base_de_datos/vehiculo_' . $folio . '.xml';
    $xmlFile = fopen($xmlFilePath, 'w');

    if ($xmlFile) {
        fwrite($xmlFile, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
        fwrite($xmlFile, "<vehiculo>\n");

        // Agregar los datos de la fila al archivo XML
        fwrite($xmlFile, "  <ID>" . $Fila[0] . "</ID>\n");
        fwrite($xmlFile, "  <Tipo_de_Servicio>" . $Fila[1] . "</Tipo_de_Servicio>\n");
        fwrite($xmlFile, "  <Nombre>" . $Fila[2] . "</Nombre>\n");
        fwrite($xmlFile, "  <Apellidos>" . $Fila[3] . "</Apellidos>\n");
        fwrite($xmlFile, "  <Folio>" . $Fila[4] . "</Folio>\n");
        fwrite($xmlFile, "  <Vigencia>" . $Fila[5] . "</Vigencia>\n");
        fwrite($xmlFile, "  <Placa>" . $Fila[6] . "</Placa>\n");
        fwrite($xmlFile, "  <RFC>" . $Fila[7] . "</RFC>\n");
        fwrite($xmlFile, "  <Numero_de_Serie>" . $Fila[8] . "</Numero_de_Serie>\n");
        fwrite($xmlFile, "  <Modelo>" . $Fila[9] . "</Modelo>\n");
        fwrite($xmlFile, "  <Localidad>" . $Fila[10] . "</Localidad>\n");
        fwrite($xmlFile, "  <Marca>" . $Fila[11] . "</Marca>\n");
        fwrite($xmlFile, "  <Operacion>" . $Fila[12] . "</Operacion>\n");
        fwrite($xmlFile, "  <Municipio>" . $Fila[13] . "</Municipio>\n");
        fwrite($xmlFile, "  <Color>" . $Fila[14] . "</Color>\n");
        fwrite($xmlFile, "  <Origen>" . $Fila[15] . "</Origen>\n");
        fwrite($xmlFile, "  <Fecha_de_Expedicion>" . $Fila[16] . "</Fecha_de_Expedicion>\n");
        fwrite($xmlFile, "  <Oficina_Expendidora>" . $Fila[17] . "</Oficina_Expendidora>\n");
        fwrite($xmlFile, "  <Movimiento>" . $Fila[18] . "</Movimiento>\n");
        fwrite($xmlFile, "  <Numero_de_Motor>" . $Fila[19] . "</Numero_de_Motor>\n");
        fwrite($xmlFile, "  <Cilindraje>" . $Fila[20] . "</Cilindraje>\n");
        fwrite($xmlFile, "  <Clave_Vehicular>" . $Fila[21] . "</Clave_Vehicular>\n");
        fwrite($xmlFile, "  <Capacidad>" . $Fila[22] . "</Capacidad>\n");
        fwrite($xmlFile, "  <Puertas>" . $Fila[23] . "</Puertas>\n");
        fwrite($xmlFile, "  <Clase>" . $Fila[24] . "</Clase>\n");
        fwrite($xmlFile, "  <Asientos>" . $Fila[25] . "</Asientos>\n");
        fwrite($xmlFile, "  <Tipo>" . $Fila[26] . "</Tipo>\n");
        fwrite($xmlFile, "  <Combustible>" . $Fila[27] . "</Combustible>\n");
        fwrite($xmlFile, "  <Uso>" . $Fila[28] . "</Uso>\n");
        fwrite($xmlFile, "  <Transmision>" . $Fila[29] . "</Transmision>\n");
        fwrite($xmlFile, "  <RPA>" . $Fila[30] . "</RPA>\n");

        fwrite($xmlFile, "</vehiculo>");
        fclose($xmlFile);
    } else {
        echo "No se pudo crear el archivo XML.";
    }

    $pdf = new FPDF('L', 'mm', 'A4'); // 'L' para orientación horizontal
    $pdf->SetFont('Arial', '', 10);

    $pdf->Cell(195, 10, 'Tarjeta de circulación vehicular', 0, 4, 'C');
    $pdf->Image('Escudo.png', 10, 90, 35, 40);
    $pdf->Image('QRO.png', 30, 90, 35, 40);
    $pdf->Image('QR.png', 70, 90, 40, 40);

    // Encabezados de las columnas
    $pdf->Cell(20, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Tipo de Servicio', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Nombre', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Apellidos', 1, 0, 'C');
    $pdf->Cell(20, 10, 'Folio', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Vigencia', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Placa', 1, 0, 'C');
    $pdf->Cell(35, 10, 'RFC', 1, 0, 'C');
    $pdf->Cell(35, 10, 'Numero de Serie', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Modelo', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Localidad', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Marca', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Operacion', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Municipio', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Color', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Origen', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Fecha de Expedicion', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Oficina Expendidora', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Movimiento', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Numero de Motor', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Cilindraje', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Clave Vehicular', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Capacidad', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Puertas', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Clase', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Asientos', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Tipo', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Combustible', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Uso', 1, 0, 'C');
    $pdf->Cell(25, 10, 'Transmision', 1, 0, 'C');
    $pdf->Cell(25, 10, 'RPA', 1, 1, 'C');

    // Agregar datos de la fila
    for ($i = 1; $i < 31; $i++) {
        $pdf->Cell(25, 10, $Fila[$i], 1, 0, 'C');
    }

    $pdf->Output('I');
}
?>
