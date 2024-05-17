<?php
    if (isset($_GET['folio'])) {
        $folio = $_GET['folio'];
        
        require('fpdf.php');

        include("Controlador.php");
        $con = Conectar();

        $SQL = "SELECT * FROM vdatoslicencia WHERE ID = '$folio';";

        $ResultSet = Ejecutar($con,$SQL);

        $Fila = mysqli_fetch_row($ResultSet);

        // Generar el archivo XML usando fopen, fwrite y fclose
        $xmlFilePath = 'C:/xampp/htdocs/DSI31/licencia_' . $folio . '.xml';
        $xmlFile = fopen($xmlFilePath, 'w');

        if ($xmlFile) {
            fwrite($xmlFile, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n");
            fwrite($xmlFile, "<licencia>\n");
            fwrite($xmlFile, "  <ID>" . $Fila[0] . "</ID>\n");
            fwrite($xmlFile, "  <Nombre>" . $Fila[1] . "</Nombre>\n");
            fwrite($xmlFile, "  <Apellido>" . $Fila[2] . "</Apellido>\n");
            fwrite($xmlFile, "  <FechaNacimiento>" . $Fila[3] . "</FechaNacimiento>\n");
            fwrite($xmlFile, "  <FechaExpedicion>" . $Fila[5] . "</FechaExpedicion>\n");
            fwrite($xmlFile, "  <FechaValidez>" . $Fila[4] . "</FechaValidez>\n");
            fwrite($xmlFile, "  <NumeroEmergencia>" . $Fila[7] . "</NumeroEmergencia>\n");
            fwrite($xmlFile, "  <GrupoSanguineo>" . $Fila[11] . "</GrupoSanguineo>\n");
            fwrite($xmlFile, "  <DonadorOrganos>" . $Fila[12] . "</DonadorOrganos>\n");
            fwrite($xmlFile, "  <Restricciones>" . $Fila[13] . "</Restricciones>\n");
            fwrite($xmlFile, "</licencia>");
            fclose($xmlFile);
        } else {
            echo "No se pudo crear el archivo XML.";
        }

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage('P', 'A4', 0);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(165, 10, 'Estados Unidos Mexicanos', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(195, 10, 'Poder Ejecutivo del Estado de Queretaro', 0, 4, 'C');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(210, 10, 'Secretaria de Seguridad Ciudadana', 0, 2, 'C');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(172, 10, 'Licencia para conducir', 0, 8, 'C');
        $pdf->Image('Escudo.png', 10, 10, 35, 40);
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(125, 50, '', 0, 8, 'R');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(125, 10, 'No. de Licencia', 0, 8, 'R');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->SetTextColor(255, 0, 0);
        $pdf->Cell(125, 10, $Fila[0], 0, 2, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Cell(125, 10, 'AUTOMOVILISTA', 0, 2, 'R');
        $pdf->Image('Foto.jpg', 140, 60, 60, 60);
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(190, 10, 'Nombre', 0, 1, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(190, 10, $Fila[1], 0, 1, 'R');
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(190, 10, $Fila[2], 0, 1, 'R');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(190, 10, 'Observaciones', 0, 1, 'R');
        
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Fecha de Nacimiento', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(50, 10, $Fila[3], 0, 4, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 10, 'Fecha de Expedicion', 0, 2, 'L');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(50, 10, $Fila[5], 0, 4, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Valida hasta                                                        firma', 0, 2, 'L');
        $pdf->Image('Firma.png', 100, 220, 15, 20);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(50, 10, $Fila[4], 0, 4, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Antiguedad', 0, 4, 'L');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(50, 10, '14', 0, 4, 'L');

        $imagen = 'C:/xampp/htdocs/DSI31/A.png'; // Ruta completa al archivo A.png
        $pdf->Image($imagen, 10, 252, 20, 20);
        //$pdf->Image('A.png', 10, 252, 20, 20);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 10, 'AUTORIZO PARA QUE LA PRESENTE SEA', 0, 1, 'C');
        $pdf->Cell(190, 10, 'RECABADA COMO GARANTIA DE INFRACCION', 0, 1, 'C');
        $pdf->Image('Queretaro.png', 180, 252, 20, 20);

        $pdf->AddPage('P', 'A4', 0);
        $pdf->Image('911.jpg', 10, 10, 20, 15);
        $pdf->SetFont('Arial', '', 20);
        $pdf->Cell(165, 20, 'B211571223', 0, 1, 'C');
        $pdf->Image('089.png', 180, 10, 20, 15);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 20, $Fila[10], 0, 1, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(190, 20, 'AV.GUADALUPE', 0, 1, 'R');
        $pdf->Image('Coches.jpg', 5, 70, 195, 10);
        
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(165, 30, 'Restricciones', 0, 1, 'L');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(165, 5, $Fila[13], 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, 'Grupo Sanguineo', 0, 1, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(190, 10, $Fila[11], 0, 1, 'R');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, 'Donador de Organos', 0, 1, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(190, 10, $Fila[12], 0, 1, 'R');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, 'Numero de Emergencia', 0, 1, 'R');
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(190, 10, $Fila[7], 0, 1, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 10, 'MTRO. EN GPA. MIGUEL ANGEL CONTRERAS ALVAREZ SECRETARIO DE SEGURIDAD CIUDADANA', 0, 1, 'R');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, 'Fundamento Legal', 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 10, 'Articulo 19 fraccion Xl y 33 fraccion I de la Ley Organica del Poder Ejecutivo del Estado de Queretaro, articulo 9 fraccion xl y 55 de la ley de Transito del Estado de Queretaro articulo 4 de la ley de Procedimentos Adminstrativos del Estado de Queretaro, articulos 134 135 136 137, 138, 139 140 141, 142 y 143 del Reglamento de Transito del Estado de Queretaro articulo 6 fraccion/ inciso 20 de la ley de la Secretaria de Seguridad ciudadana', 0, 1, 'L');

        $pdf->Image('Escudo.png', 160, 252, 20, 20);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(190, 70, 'Secretaria de Seguridad Ciudadana', 0, 1, 'R');

        $pdf->Output('I');
    }
?>