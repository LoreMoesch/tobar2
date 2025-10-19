<?php

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";
require_once "../Controladores/carrerasC.php";
require_once "../Modelos/carrerasM.php";
require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";
require_once "../Controladores/certificadosC.php";
require_once "../Modelos/certificadosM.php";

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

$alumno = UsuariosC::VerUsuariosC($columna, $valor);

$columna ="id";
$valor = $exp[5];

$carrera = CarrerasC::VerCarreras2C($columna, $valor);

$columna = "id";
$valor = $exp[6];

$certi = CertificadosC::VerCertificadosAC($valor);


$pdf->SetFont('helvetica', 'B', 16);

$pdf->SetXY(10, 10);$pdf->Image('images/logom1encabezado.jpg', '', '', 190, 25, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

$pdf->SetXY(95, 35);$pdf->Image('images/logoA.png', '', '', 18, 18, '', '', 'T', false, 300, '', false, false, 1, false, false, false);

$pdf->SetXY(0, 10);$pdf->Cell(0, 100, 'INSTITUTO SUPERIOR DE FORMACIÓN DOCENTE', 0, 1, 'C');
$pdf->SetXY(0, 10);$pdf->Cell(0, 115, '"INSP. ALBINO SANCHEZ BARROS"', 0, 1, 'C');
$pdf->SetXY(0, 10);$pdf->Cell(0, 130, 'MINISTERIO DE EDUCACIÓN', 0, 1, 'C');


//$pdf->SetXY(0, 10);$pdf->Cell(0, 40, '', 0, 1, 'C');

$pdf->SetFont('helvetica', 'BU', 16);

//$pdf->SetXY(0, 10);$pdf->Cell(0, 140, 'PROVINCIA DE LA RIOJA ', 0, 1, 'C');

$pdf->SetFont('helvetica', 'BU', 16);

$pdf->SetXY(0, 10);$pdf->Cell(0, 145, 'PROVINCIA DE LA RIOJA', 0, 1, 'C');

$pdf->SetXY(0, 10);$pdf->Cell(0, 160, 'CERTIFICA ', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 14);
///////////////////////////////////////////////////
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

if ($certi["tipo"]==1){
    
    $aniol="1er Año";

} else if ($certi["tipo"]==2) {

    $aniol="2do Año";

} else if ($certi["tipo"]==3) {

    $aniol="3er Año";

} else if ($certi["tipo"]==4) {

    $aniol="4to Año";

}
/* if ($carrera["id"]==10){
    
    $orienta=".";

} else if ($carrera["id"]==6) {

    $orienta=" con Orientación en Discapacidad Neuromotora.";

} else if ($carrera["id"]==7) {

    $orienta=" con Orientación en Discapacidad Auditiva.";

} else if ($carrera["id"]==8) {

    $orienta=" con Orientación en Discapacidad Intelectual.";

} else if ($carrera["id"]==9) {

    $orienta=" con Orientación en Discapacidad Visual.";
} */
				    	
$fecha=$certi["f_vence"];

$num = date("j", strtotime($fecha));
$anno = date("Y", strtotime($fecha));
$mes = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
$mes = $mes[(date('m', strtotime($fecha))*1)-1];


$pdf->SetXY(15, 10);$pdf->Cell(10, 185, '  Que el/la estudiante: '.$alumno["apellido"].', '.$alumno["nombre"].'; DNI N° '.$alumno["dni"], 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 200, 'es alumno/a de este Instituto y cursa el '.$aniol.' del Profesorado de Educación', 0, 1, 'L');
//$pdf->SetXY(15, 10);$pdf->Cell(10, 215, 'Especial'.$orienta, 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 230, '  Se extiende la presente certificación en la Ciudad de La Rioja, sin raspaduras', 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 245, 'ni enmiendas, a solicitud de parte interesada para ser presentada ante las', 0, 1, 'L');
$pdf->SetXY(15, 10);$pdf->Cell(10, 260, 'autoridades que lo requieran a los '.$fechahoy.'.', 0, 1,'L');
//$pdf->SetXY(15, 10);$pdf->Cell(10, 275, ''.$fechahoy.' -', 0, 1,'L');
  
$codigoa = $certi["codigo"];

//$pdf->SetXY(15, 10);$pdf->Cell(10, 265, 'codigo:'.$codigoa.'.', 0, 1,'L');  

$miCadena = ((string)1234567811123);


$pdf->SetFont('helvetica', 'N',10);
// ///$pdf->Text(82,190,'CÓDIGO DE VALIDACIÓN'); 
 $style = array(
	'border' => true,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);
// define barcode style
$style = array(
	'position' => '',
	'align' => 'C',
	'stretch' => false,
	'fitwidth' => true,
	'cellfitalign' => '',
	'border' => true,
	'hpadding' => 'auto',
	'vpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255),
	'text' => true,
	'font' => 'helvetica',
	'fontsize' => 8,
	'stretchtext' => 4
);
$pdf->SetXY(75,180);$pdf->write1DBarcode(''.$certi["codigo"].'', 'EAN13', '', '', '', 18, 0.4, $style, 'N');
// // QRCODE,Q : QR-CODE Better error correction
$pdf->SetXY(15,250);$pdf->write2DBarcode('https://localhost/tobar2'.$certi["codigo"].'', 'QRCODE,Q', 25, 225, 30, 30, $style, 'C');
//$pdf->SetXY(15,250);$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,Q', 20, 150, 50, 50, $style, 'N');    

// ///$pdf->SetXY(80, 195);$pdf->write1DBarcode($miCadena,'EAN13', '', '', '', 18, 0.5, $style, 'N');
// //$pdf->Cell(0, 0, '1234567890128', 0, 1);

$pdf->SetXY(60, 224);$pdf->Cell(0,0, 'Este certificado podrá ser validado ingresando a:', 0, 1,'L');
$pdf->SetXY(60, 229);$pdf->Cell(0,0, 'https://localhost/tobar2 y completando con el', 0, 1,'L');
$pdf->SetXY(60, 234);$pdf->Cell(0,0, 'código de validación que aparece arriba, o bien escaneando el código QR que', 0, 1,'L');
$pdf->SetXY(60, 239);$pdf->Cell(0,0, 'aparece en pantalla.', 0, 1,'L');
$pdf->SetXY(60, 249);$pdf->Cell(0,0, 'Este certificado tiene vigencia hasta el '.$num.' de '.$mes.' del '.$anno.'.', 0, 1,'L');


$pdf->setFontSpacing(1.8);
///$pdf->SetXY(79, 167);$pdf->Cell(10, 100, $codigoa, 0, 1,'L');



// QRCODE,H : QR-CODE Best error correction
//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,H', 20, 210, 50, 50, $style, 'N');
//$pdf->Text(20, 205, 'QRCODE H');


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

