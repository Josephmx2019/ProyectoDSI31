<?php
    // Verificar si se han enviado datos por el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Capturar los datos del formulario
        $tipoDeServicio = $_POST['Tipo_de_servicio'];
        $holograma = $_POST['Holograma'];
        $folio = $_POST['Folio'];
        $vigencia = $_POST['Vigencia'];
        $placa = $_POST['Placa'];
        $rfc = $_POST['RFC'];
        $numeroDeSerie = $_POST['Numero_de_serie'];
        $modelo = $_POST['Modelo'];
        $localidad = $_POST['Localidad'];
        $marcaLineaSublinea = $_POST['Marca_Linea_Sublinea'];
        $operacion = $_POST['Operacion'];
        $municipio = $_POST['Municipio'];
        $folioDePlaca = $_POST['Folio_de_placa'];
        $numeroDeConstanciaDeInscripcion = $_POST['Numero_de_constancia_de_inscripcion'];
        $cilindraje = $_POST['Cilindraje'];
        $capacidad = $_POST['Capacidad'];
        $puertas = $_POST['Puertas'];
        $asientos = $_POST['Asientos'];
        $combustible = $_POST['Combustible'];
        $transmision = $_POST['Transmision'];
        $claveVehicular = $_POST['Clave_vehicular'];
        $clase = $_POST['Clase'];
        $tipo = $_POST['Tipo'];
        $uso = $_POST['Uso'];
        $rpa = $_POST['RPA'];
        $fechaDeExpedicion = $_POST['Fecha_de_expedicion'];
        $oficinaExpendedora = $_POST['Oficina_expendedora'];
        $movimiento = $_POST['Movimiento'];
        $numeroDeMotor = $_POST['Numero_de_motor'];
        $orden = $_POST['Orden'];
        $color = $_POST['Color'];

        // Crear el objeto FPDF
        require('fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);

        // Agregar los datos capturados al PDF
        $pdf->Cell(0,10,"Tipo de Servicio: $tipoDeServicio",0,1);
        $pdf->Cell(0,10,"Holograma: $holograma",0,1);
        $pdf->Cell(0,10,"Folio: $folio",0,1);
        $pdf->Cell(0,10,"Vigencia: $vigencia",0,1);
        $pdf->Cell(0,10,"Placa: $placa",0,1);
        $pdf->Cell(0,10,"RFC: $rfc",0,1);
        $pdf->Cell(0,10,"Número de Serie: $numeroDeSerie",0,1);
        $pdf->Cell(0,10,"Modelo: $modelo",0,1);
        $pdf->Cell(0,10,"Localidad: $localidad",0,1);
        $pdf->Cell(0,10,"Marca/Linea/Sublinea: $marcaLineaSublinea",0,1);
        $pdf->Cell(0,10,"Operación: $operacion",0,1);
        $pdf->Cell(0,10,"Municipio: $municipio",0,1);
        $pdf->Cell(0,10,"Folio de Placa: $folioDePlaca",0,1);
        $pdf->Cell(0,10,"Número de Constancia de Inscripción: $numeroDeConstanciaDeInscripcion",0,1);
        $pdf->Cell(0,10,"Cilindraje: $cilindraje",0,1);
        $pdf->Cell(0,10,"Capacidad: $capacidad",0,1);
        $pdf->Cell(0,10,"Puertas: $puertas",0,1);
        $pdf->Cell(0,10,"Asientos: $asientos",0,1);
        $pdf->Cell(0,10,"Combustible: $combustible",0,1);
        $pdf->Cell(0,10,"Transmisión: $transmision",0,1);
        $pdf->Cell(0,10,"Clave Vehicular: $claveVehicular",0,1);
        $pdf->Cell(0,10,"Clase: $clase",0,1);
        $pdf->Cell(0,10,"Tipo: $tipo",0,1);
        $pdf->Cell(0,10,"Uso: $uso",0,1);
        $pdf->Cell(0,10,"RPA: $rpa",0,1);
        $pdf->Cell(0,10,"Fecha de Expedición: $fechaDeExpedicion",0,1);
        $pdf->Cell(0,10,"Oficina Expendedora: $oficinaExpendedora",0,1);
        $pdf->Cell(0,10,"Movimiento: $movimiento",0,1);
        $pdf->Cell(0,10,"Número de Motor: $numeroDeMotor",0,1);
        $pdf->Cell(0,10,"Orden: $orden",0,1);
        $pdf->Cell(0,10,"Color: $color",0,1);

        // Salida del PDF
        $pdf->Output();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Administrador</title>
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
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Estilos adicionales */
        .menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .menu-item {
            display: inline-block;
            margin-right: 10px;
        }
        .submenu {
            display: none;
            list-style-type: none;
            padding: 0;
            margin: 0;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 5px;
        }
        .menu-item:hover .submenu {
            display: block;
        }
    </style>
</head>
<body>
    <form method="post" action="TarjetaCirculacionPDF.php">
        <label>Tipo de servicio</label>
        <input type="text" id="Tipo_de_servicio" name="Tipo_de_servicio">
        <br>
        <label>Holograma</label>
        <input type="text" id="Holograma" name="Holograma">
        <br>
        <label>Folio</label>
        <input type="number" id="Folio" name="Folio">
        <br>
        <label>Vigencia</label>
        <input type="text" id="Vigencia" name="Vigencia">
        <br>
        <label>Placa</label>
        <input type="text" id="Placa" name="Placa">
        <br>
        <label>RFC</label>
        <input type="text" id="RFC" name="RFC">
        <br>
        <label>Número de serie</label>
        <input type="text" id="Numero_de_serie" name="Numero_de_serie">
        <br>
        <label>Modelo</label>
        <input type="number" id="Modelo" name="Modelo">
        <br>
        <label>Localidad</label>
        <input type="text" id="Localidad" name="Localidad">
        <br>
        <label>Marca/Linea/Sublinea</label>
        <input type="text" id="Marca_Linea_Sublinea" name="Marca_Linea_Sublinea">
        <br>
        <label>Operacion</label>
        <input type="text" id="Operacion" name="Operacion">
        <br>
        <label>Municipio</label>
        <input type="text" id="Municipio" name="Municipio">
        <br>
        <label>Folio de placa</label>
        <input type="text" id="Folio_de_placa" name="Folio_de_placa">
        <br>
        <label>Número de constancia de inscripción</label>
        <input type="text" id="Numero_de_constancia_de_inscripcion" name="Numero_de_constancia_de_inscripcion">
        <br>
        <label>Cilindraje</label>
        <input type="number" id="Cilindraje" name="Cilindraje">
        <br>
        <label>Capacidad</label>
        <input type="number" id="Capacidad" name="Capacidad">
        <br>
        <label>Puertas</label>
        <input type="number" id="Puertas" name="Puertas">
        <br>
        <label>Asientos</label>
        <input type="number" id="Asientos" name="Asientos">
        <br>
        <label>Combustible</label>
        <input type="text" id="Combustible" name="Combustible">
        <br>
        <label>Transmisión</label>
        <input type="text" id="Transmision" name="Transmision">
        <br>
        <label>Clave vehicular</label>
        <input type="text" id="Clave_vehicular" name="Clave_vehicular">
        <br>
        <label>Clase</label>
        <input type="number" id="Clase" name="Clase">
        <br>
        <label>Tipo</label>
        <input type="number" id="Tipo" name="Tipo">
        <br>
        <label>Uso</label>
        <input type="number" id="Uso" name="Uso">
        <br>
        <label>RPA</label>
        <input type="text" id="RPA" name="RPA">
        <br>
        <label>Fecha de expedición</label>
        <input type="date" id="Fecha_de_expedicion" name="Fecha_de_expedicion">
        <br>
        <label>Oficina expendedora</label>
        <input type="number" id="Oficina_expendedora" name="Oficina_expendedora">
        <br>
        <label>Movimiento</label>
        <input type="text" id="Movimiento" name="Movimiento">
        <br>
        <label>Número de motor</label>
        <input type="text" id="Numero_de_motor" name="Numero_de_motor">
        <br>
        <label>Orden</label>
        <input type="text" id="Orden" name="Orden">
        <br>
        <label>Color</label>
        <input type="text" id="Color" name="Color">
        <br>
        <input type="submit">
    </form>
</body>
</html>