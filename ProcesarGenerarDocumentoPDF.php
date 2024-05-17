<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $folio = $_POST["folio"]; // Obtener el folio del formulario
    $tipo_documento = $_POST["tipo_documento"]; // Obtener el tipo de documento seleccionado
    
    // Redirigir según el tipo de documento seleccionado
    switch ($tipo_documento) {
        case "Licencia":
            header("Location: NewLicenciaPDF.php?folio=$folio");
            break;
        case "TarjetaCirculacion":
            header("Location: NewTarjetaCirculacionPDF.php?folio=$folio");
            break;
        case "TarjetaVerificacion":
            header("Location: NewTarjetaVerificacionPDF.php?folio=$folio");
            break;
        default:
            // Manejar un caso por defecto o error
            break;
    }
} 
?>
