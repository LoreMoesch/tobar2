<?php

require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

require_once "../Controladores/examenesC.php";
require_once "../Modelos/examenesM.php";

require_once "../Controladores/carrerasC.php";
require_once "../Modelos/carrerasM.php";

require_once('../TCPDF-main/tcpdf.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		//$this->setFont('helvetica', 'B', 20);
		// Title
		//$this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	//Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->setY(-15);
		// Set font
		$this->setFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
// $pdf->setCreator(PDF_CREATOR);
// $pdf->setAuthor('Nicola Asuni');
// $pdf->setTitle('TCPDF Example 003');
// $pdf->setSubject('TCPDF Tutorial');
// $pdf->setKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->setFont('times', 'BI', 12);

// add a page
//$pdf->AddPage();
$pdf->setPrintHeader(false);
$pdf->AddPage();
$link = $_SERVER['REQUEST_URI'];
$exp = explode("/", $link);
$columna = "id";
$valor = $exp[4];
$examen = ExamenesC::VerExamenesC($columna, $valor);
$columna = "id";
$valor = $examen["id_materia"];
$materia = MateriasC::VerMaterias2C($columna, $valor);
if ($examen["comun"] == 1) {
    $tipo=$examen["tipo"];
} else {
    $tipo=$materia["tipo"];    
}
$columna ="id";
$valor = $materia["id_carrera"];

$carrera = CarrerasC::VerCarreras2C($columna, $valor);

// Establecer la fuente
//$pdf->SetFont('arial', 'BI', 16);
// negrita subrayado U cursiva I --$pdf->SetFont('helvetica', 'BU', 12);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', 'BU', 12); $pdf->Cell(192, 30, '', 1, 1, 'C');

$pdf->SetXY(0, 10);$pdf->Cell(0, 7, 'ACTA VOLANTE DE EXAMENES', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);

$pdf->SetXY(17, 19);$pdf->Cell(0, 7, 'Examenes de Alumnos: '.$carrera["nombre"].'', 0, 1, 'L');

//$pdf->SetXY(77, 19);$pdf->Cell(0, 7, 'LLamado :  '.$llama, 0, 1, 'L');

$pdf->SetXY(17, 26);$pdf->Cell(0, 7, 'Asignatura : '.$examen["nombre"].'         Tipo : '.$tipo.'         Llamado : '.$examen["llamado"], 0, 0, 'L');

//$pdf->SetXY(17, 26);$pdf->Cell(0, 7, 'Asignatura : '.$materia["nombre"].'       - Tipo : '.$materia["tipo"], 0, 0, 'L');

//$pdf->SetXY(122, 26);$pdf->Cell(0, 7, 'Carrera : '.$nomc.' '.$carreraid1, 0, 0, 'L');

$pdf->SetXY(17, 33);$pdf->Cell(0, 7, 'Año : '.$materia["grado"], 0, 0, 'L');

$pdf->SetXY(47, 33);$pdf->Cell(0, 7, 'Turno :'.$examen["hora"], 0, 0, 'L');

$pdf->SetXY(92, 33);$pdf->Cell(0, 7, 'Fecha :'.$examen["fecha"], 0, 0, 'L');

$pdf->SetXY(135, 33);$pdf->Cell(0, 7, 'Libro :  ', 0, 0, 'L');

$pdf->SetXY(160, 33);$pdf->Cell(0, 7, 'Folio :  ', 0, 0, 'L');

// 2 nro > baja
$pdf->SetXY(170, 15);$pdf->SetFont('helvetica','B',7); $pdf->Cell(0,0,'ISFD Dra Carolina',0,1,'R');
// 1 horizontal
$pdf->SetXY(150, 20);$pdf->SetFont('helvetica','B',7); $pdf->Cell(47,0,'  Tobar Garcia',0,1,'R');

$pdf->SetXY(168, 33);

$pdf->Ln(7);
//$pdf->Image('logo.jpg', 182,12, 12, 15, 'JPG');
//$pdf->Image('sis.jpg', 17,11, 20, 8, 'JPG');

$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('helvetica','B',6);

//cuadros
// cuadro numero de orden
$pdf->Cell(10,10,'',1,0,'C');
// cuadro numero de permiso
$pdf->Cell(10,10,'',1,0,'C');
// nombre y apellido
$pdf->Cell(64,10,'',1,0,'C');		
//dni
$pdf->Cell(18,10,'',1,0,'C');		
//matricula
$pdf->Cell(13,10,'',1,0,'C');
// firma alumno
$pdf->Cell(20,10,'',1,0,'C');
// calificaciones
$pdf->Cell(20,10,'',1,0,'C');
// nota final
$pdf->Cell(37,10,'',1,1,'C');


$pdf->SetXY(12, 46);

//abajo
$pdf->Cell(6,5,'Orden',0,0,'C');
$pdf->Cell(13,5,'Permiso',0,0,'C');
$pdf->Cell(64,8,'',0,0,'C');		
$pdf->Cell(18,8,'',0,0,'C');		
$pdf->Cell(13,8,'',0,0,'C');
$pdf->Cell(18,5,'del Alumno',0,0,'C');

$pdf->SetXY(145, 46);

$pdf->Cell(10,4,'Esc.',1,0,'C');
$pdf->Cell(10,4,'Oral',1,0,'C');
$pdf->Cell(10,4,'Nros',1,0,'C');
$pdf->Cell(27,4,'Letras',1,1,'C');
//$pdf->Cell(18,4,'Concepto ',1,1,'C');57

$pdf->SetXY(12, 40);

//arriba
$pdf->Cell(6,7,'Nº de',0,0,'C');
$pdf->Cell(12,7,'Nº de',0,0,'C');
$pdf->Cell(64,7,'Apellido/s y Nombre/s',0,0,'C');		
$pdf->Cell(18,7,'Dni',0,0,'C');		
$pdf->Cell(13,7,'Matricula',0,0,'C');
$pdf->Cell(20,7,'Firma',0,0,'C');
$pdf->Cell(18,7,'Calificaciones',0,0,'C');
$pdf->Cell(40,7,'Nota Final',0,1,'C');

$pdf->SetXY(10, 51);

//$html1 = <<<EOF

//	<center><img src="https://localhost/tobar/tcpdf/pdf/images/logoC.png " width="200" height="60" align="middle"></center>
//	<br><br>
    
    
//	<h2 class="title" style="text-align: center;">ACTA VOLANTE DE EXAMENES</h2>
	
//	<h3>Inscriptos para el Exámen de: $materia[nombre]</h3>

//	<h2>Fecha: $examen[fecha] - Hora: $examen[hora] - Aula: $examen[aula]</h2>

//	<table style="border: 1px solid black; text-align:center; font-size:15px">

//		<tr>

//			<td style="border: 1px solid black width:115px;">N°</td>
//			<td style="border: 1px solid black width:115px;">Libreta</td>
//			<td style="border: 1px solid black width:250px;">Alumno</td>

//		</tr>

//	</table>

//EOF;


//$pdf->writeHTML($html1, false, false, false, false, '');

$n = 1;





//for ($i=1;$i<=10;$i++)
//{
//$pdf->Cell(10,6,$i2,1,1,'C');
//}

//32
$ggg = 31 - $n;
$i = 1;
$pdf->SetFont('helvetica','B',8);

$pdf->Cell(192,6,'Acta Sin Alumnos Inscriptos',1,1,'C');

while ($i <= $ggg) {
    $i++;  
$pdf->Cell(192,6,$i2,1,1,'C');
}

//$ca=$ggg;

//$pdf->Cell(192,$ca,'',1,1,'C');

//$pdf->Cell(0, 5,'Pagina '.$pag.' de '.$paga, 0, 0, 'C');
//-13
$pdf->SetFont('helvetica','B',8);
$pdf->SetXY(17, 238);$pdf->Cell(0, 7, 'A continuación del último alumno deberá firmar el Secretario. ', 0, 0, 'L');

$pdf->SetXY(30, 251);$pdf->Cell(0, 7, '..........................', 0, 0, 'L');
$pdf->SetXY(30, 254);$pdf->Cell(0, 7, '   Presidente ', 0, 0, 'L');

$pdf->SetXY(75, 251);$pdf->Cell(0, 7, '..........................', 0, 0, 'L');
$pdf->SetXY(75, 254);$pdf->Cell(0, 7, '        Vocal ', 0, 0, 'L');

$pdf->SetXY(110, 251);$pdf->Cell(0, 7, '.........................', 0, 0, 'L');
$pdf->SetXY(110, 254);$pdf->Cell(0, 7, '        Vocal ', 0, 0, 'L');

$pdf->SetXY(150, 248);$pdf->Cell(0, 7, 'Total Alumnos  :    '.$ii, 0, 0, 'L');
$pdf->SetXY(150, 253);$pdf->Cell(0, 7, 'Aprobados : _____________ ', 0, 0, 'L');
$pdf->SetXY(150, 258);$pdf->Cell(0, 7, 'Aplazados : ______________ ', 0, 0, 'L');
$pdf->SetXY(150, 263);$pdf->Cell(0, 7, 'Ausentes  : ______________ ', 0, 0, 'L');

$pdf->SetFont('helvetica','B',8);

$pdf->SetXY(25, 262);$pdf->Cell(0, 7, '______ de _____________________________ De 20_________', 0, 0, 'L');
//$pdf->SetXY(20, 280);$pdf->Cell(0, 7, '          1-2-3                 4-5-6-7-8-9-10 ', 0, 0, 'L');

$pdf->SetXY(10, 245);
$pdf->Cell(192,26,'',1,1,'C');


$pdf->Output('Inscriptos-Examen-'.$materia["nombre"].'.pdf');
