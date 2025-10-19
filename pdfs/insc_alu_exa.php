<?php

require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

require_once "../Controladores/carrerasC.php";
require_once "../Modelos/carrerasM.php";

require_once "../Controladores/examenesC.php";
require_once "../Modelos/examenesM.php";

////////////////////////

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

//////////////////////////

$pdf->setPrintHeader(false);

$pdf->AddPage();

$link = $_SERVER['REQUEST_URI'];

$exp = explode("/", $link);

$columna = "id";
$valor = $exp[5];

$usuario = UsuariosC::VerUsuariosC($columna, $valor);
$fecha=date("d/m/Y");
$columna ="id";
$valor =  $exp[4];

$carrera = CarrerasC::VerCarreras2C($columna, $valor);

//////////////////

$pdf->SetFont('helvetica', 'BU', 14);

$pdf->SetXY(0, 20);$pdf->Cell(0, 7, 'CONSTANCIA INSCRIPCIÓN A RENDIR MATERIAS', 0, 1, 'C');

$pdf->SetFont('helvetica', 'BN', 12);

$pdf->SetXY(17, 35);$pdf->Cell(0, 7, 'Apellido y Nombre :    '.$usuario["apellido"].' '.$usuario["nombre"], 0, 1, 'L');

$pdf->SetXY(17, 45);$pdf->Cell(0, 7, 'Dni : '.$usuario["dni"].'       Libreta : '.$usuario["libreta"].'      Plan : '.$carrera["plan"], 0, 1, 'L');

$pdf->SetXY(17, 55);$pdf->Cell(0, 7, 'Carrera :   '.$carrera["nombre"].'      Fecha : '.$fecha, 0, 1, 'L');

$pdf->SetXY(10, 65);

$pdf->SetFont('helvetica', 'BN', 8);

$pdf->Cell(10,10,'Nro',1,0,'C');
$pdf->Cell(80,10,'Materia',1,0,'C');
$pdf->Cell(10,10,'Tipo',1,0,'C');
$pdf->Cell(25,10,'LLamado',1,0,'C');		
$pdf->Cell(12,10,'Turno',1,0,'C');		
$pdf->Cell(13,10,'Cond',1,0,'C');		

$pdf->Cell(40,10,'Fecha',1,1,'C');		

// 192

$pdf->SetFont('helvetica', 'N', 8);

$columna = "id_alumno";
$valor = $exp[5];

$inscriptos = ExamenesC::VerInscExamenC($columna, $valor);

$oo=0;

foreach ($inscriptos as $key => $value) {

$columna = "id";
$valor = $value["id_alumno"];

$alumnos = UsuariosC::VerUsuarios2C($columna, $valor);


$oo++;

$pdf->Cell(10,7,$oo,1,0,'C');


$columna = "id";
$valor = $value["id_materia"];

$materia = MateriasC::VerMaterias2C($columna, $valor);


$pdf->Cell(80,7,$materia["nom_abrevi"],1,0,'L');		
if ($materia["tipo"]=="Anual"){
$tipo="A";    
}
if ($materia["tipo"]=="2do Cuatrimestre"){
$tipo="2C";    
}
if ($materia["tipo"]=="1er Cuatrimestre"){
$tipo="1C";    
}


$pdf->Cell(10,7,$tipo,1,0,'C');


$columna = "id";
$valor = $value["id_examen"];

$exa = ExamenesC::VerExamenesC($columna, $valor);

$pdf->Cell(25,7,$exa["llamado"],1,0,'C');		
$pdf->Cell(12,7,$exa["hora"],1,0,'C');		
if ($value["condicion"]=="Regular"){
$condi="R";
} else{
$condi="L";
}
$pdf->Cell(13,7,$condi,1,0,'C');		



$pdf->Cell(40,7,$exa["fecha"],1,1,'C');

}


//$pdf->Output('Insc-Comision-'.$comision["numero"].'-'.$materia["nombre"].'.pdf');
$pdf->Output('Insc.pdf');

