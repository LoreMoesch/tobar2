<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

require_once "../Controladores/carrerasC.php";
require_once "../Modelos/carrerasM.php";

require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";


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
$pdf->setPrintHeader(false);

$pdf->AddPage();

$link = $_SERVER['REQUEST_URI'];

$exp = explode("/", $link);

$columna = "id";
$valor = $exp[4];

$alumno = UsuariosC::VerUsuariosC($columna, $valor);

$columna ="id";
$valor = $exp[5];

$carrera = CarrerasC::VerCarreras2C($columna, $valor);

$pdf->SetFont('helvetica', 'B', 16);

$pdf->SetXY(0, 10);$pdf->Cell(0, 10, 'INSTITUTO SUPERIOR DE FORMACIÓN DOCENTE', 0, 1, 'C');
$pdf->SetXY(0, 10);$pdf->Cell(0, 25, '"DRA. CAROLINA TOBAR GARCÍA"', 0, 1, 'C');
$pdf->SetXY(0, 10);$pdf->Cell(0, 40, 'MINISTERIO DE EDUCACIÓN, CIENCIA Y TECNOLOGÍA', 0, 1, 'C');

$pdf->SetFont('helvetica', 'BU', 14);

$pdf->SetXY(0, 10);$pdf->Cell(0, 55, 'PROVINCIA DE LA RIOJA ', 0, 1, 'C');

$pdf->SetFont('helvetica', 'BU', 16);

$pdf->SetXY(0, 10);$pdf->Cell(0, 85, 'CERTIFICA ', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 14);

switch(date("l")){
    case "Monday":
       $dia = "Lunes";
       break;
    case "Tuesday":
      $dia = "Martes";
      break;
    case "Wednesday":
       $dia = "Miercoles";
       break;
    case "Thuraday":
       $dia = "Jueves";
       break;
    case "Friday":
       $dia = "Viernes";
       break;
    case "Saturday":
       $dia = "Sabado";
       break;
    case "Sunday":
       $dia = "Domingo";
       break;
    }
//Selección del Mes
switch(date("F")){
    case "January":
       $mes= "Enero";
       break;
    case "February":
      $mes= "Febrero";
      break;
   case "March":
      $mes= "Marzo";
      break;
   case "April":
      $mes= "Abril";
      break;
   case "May":
      $mes= "Mayo";
      break;
   case "June":
      $mes= "Junio";
      break;
   case "July":
      $mes ="Julio";
      break;
   case "August":
      $mes= "Agosto";
      break;
   case "September":
      $mes= "Septiembre";
      break;
   case "October": 
      $mes= "Octubre";
      break;
   case "November":
      $mes= "Noviembre";
      break;
   case "December":
      $mes= "Diciembre";
      break;
 }
$fechahoy= date("j") . " dias del mes de " . $mes . " de " . date("Y");
$ano=date("Y");
$pdf->SetXY(15, 10);$pdf->Cell(10, 120, '      Que el/la alumno/a:   '.$alumno["apellido"].', '.$alumno["nombre"].'   D.N.I. N°  '.$alumno["dni"], 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 135, 'esta realizando el Curso Introductorio correspondiente al Ciclo Lectivo - Año '.$ano, 0, 1, 'L');
//$pdf->SetXY(15, 10);$pdf->Cell(10, 150, 'Educación Especial con  '.$carrera["nombre"], 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 155, '      Se extiende la presente certificacíon en la Ciudad de La Rioja, sin raspaduras ni', 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 170, 'enmiendas, a solicitud de parte interesada para ser presentada ante las autoridades ', 0, 1,'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 185, 'que lo requieran a los '.$fechahoy.' -', 0, 1,'L');




//$html1 = <<<EOF

//	<center><img src="images/logo.png"></center>
//	<br><br>
//
//	<h2>Certificado de Alumno/a</h2><br>
//
//	<b>Alumno/a</b>: $alumno[apellido], $alumno[nombre]<br>
//	<b>Libreta</b>: $alumno[libreta]<br>
//
//EOF;


//$pdf->writeHTML($html1, false, false, false, false, '');

$pdf->Output('Certificado-Alumno-'.$exp[5].'.pdf');

