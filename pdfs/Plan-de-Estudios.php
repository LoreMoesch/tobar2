<?php

require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

require_once "../Controladores/examenesC.php";
require_once "../Modelos/examenesM.php";

require_once "../Controladores/carrerasC.php";
require_once "../Modelos/carrerasM.php";

//////////////////////////////
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

//////////////////////////////

$pdf->setPrintHeader(false);

$pdf->AddPage();

$link = $_SERVER['REQUEST_URI'];

$exp = explode("/", $link);

$columna = "id";
$valor = $exp[5];

$usuario = UsuariosC::VerUsuariosC($columna, $valor);

//$columna = "id";
//$valor = $examen["id_materia"];

//$materia = MateriasC::VerMaterias2C($columna, $valor);

$columna ="id";
$valor =$exp[4];

$carrera = CarrerasC::VerCarreras2C($columna, $valor);

$num=0;
$notac=0;

// Establecer la fuente
//$pdf->SetFont('arial', 'BI', 16);
// negrita subrayado U cursiva I --$pdf->SetFont('helvetica', 'BU', 12);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', 'BU', 12); $pdf->Cell(192, 18, '', 1, 1, 'C');

$pdf->SetXY(0, 10);$pdf->Cell(0, 7, 'PLAN DE ESTUDIOS', 0, 1, 'C');

$pdf->SetFont('helvetica', 'N', 8);
$pdf->SetXY(17, 15);$pdf->Cell(0, 7, 'Alumno : '.$usuario["apellido"].' '.$usuario["nombre"].'               Libreta : '.$usuario["libreta"].'                 Dni : '.$usuario["dni"].'   (id:'.$usuario["id"].')', 0, 0, 'L');
$pdf->SetXY(17, 20);$pdf->Cell(0, 7, 'Carrera : '.$carrera["nombre"], 0, 1, 'L');

$pdf->SetXY(170, 15);$pdf->SetFont('helvetica','B',7); $pdf->Cell(0,0,'ISFD Dra Carolina',0,1,'R');
$pdf->SetXY(150, 20);$pdf->SetFont('helvetica','B',7); $pdf->Cell(47,0,'  Tobar Garcia',0,1,'R');

$pdf->SetXY(10, 28);


//$pdf->setCellPaddings(0, 1, 0, 0);
$pdf->SetFont('helvetica','B',8);

//cuadros encabezado
//$pdf->Cell(8,7,'',1,0,'C');
//$pdf->Cell(76,7,'',1,0,'C');		
//$pdf->Cell(10,7,'',1,0,'C');		
//$pdf->Cell(10,7,'',1,0,'C');
//$pdf->Cell(20,7,'',1,0,'C');
//$pdf->Cell(18,7,'',1,0,'C');
//$pdf->Cell(15,7,'',1,0,'C');
//$pdf->Cell(15,7,'',1,0,'C');
//$pdf->Cell(20,7,'',1,1,'C');

//$pdf->SetXY(10, 30);

//arriba
$pdf->Cell(8,7,'Cod.',1,0,'C');
$pdf->Cell(76,7,'Materia',1,0,'C');		
$pdf->Cell(9,7,'Año',1,0,'C');		
$pdf->Cell(9,7,'Tipo',1,0,'C');
$pdf->Cell(34,7,'Cursada',1,0,'C');
$pdf->Cell(18,7,'Nota Final',1,0,'C');
$pdf->Cell(10,7,'Libro',1,0,'C');
$pdf->Cell(10,7,'Folio',1,0,'C');
$pdf->Cell(18,7,'Fecha',1,1,'C');

$pdf->SetXY(10, 35);

$n = 1;
$columna = "id_carrera";
$valor =  $exp[4];
$materia = MateriasC::VerMaterias3C($columna, $valor);

$pdf->SetFont('times','B',9);

foreach ($materia as $key => $mate) {
	$pdf->Cell(8,6.5,$mate["codigo"],1,0,'C');
    $pdf->Cell(76,6.5,$mate["nom_abrevi"],1,0,'L');
	$pdf->Cell(9,6.5,$mate["grado"],1,0,'C');
    if ($mate["tipo"]=="2do Cuatrimestre"){
        $pdf->Cell(9,6.5,'2C',1,0,'C');
    }else if ($mate["tipo"]=="1er Cuatrimestre"){
        $pdf->Cell(9,6.5,'1C',1,0,'C');
    }else{
        $pdf->Cell(9,6.5,'A',1,0,'C');
    }
	$columna = "id_materia";
	$valor = $mate["id"];
	///// segun la orientacion ////
	
	if ( $exp[4] == 8){
									    
	        $nota = MateriasC::VerNotasiC($columna, $valor);

	} else if ( $exp[4] == 6){
									    
	        $nota = MateriasC::VerNotasnC($columna, $valor);

	} else if ( $exp[4] == 7){

	        $nota = MateriasC::VerNotassC($columna, $valor);

	} else if ( $exp[4] == 9){

	        $nota = MateriasC::VerNotascC($columna, $valor);

	}  
	
	
	//$nota = MateriasC::VerNotasC($columna, $valor);
	
	///// segun la orientacion ////	
	
	foreach ($nota as $key => $N) {
		if($N["id_alumno"] == $exp[5] && $N["id_materia"] == $mate["id"]){
            $pdf->Cell(34,6.5,$N["estado"],1,0,'C');
            //$not=$N["nota_final"].' '.$N["estado_final"];
            $not=$N["nota_final"];

            $pdf->Cell(18,6.5,$not,1,0,'C');
            $pdf->Cell(10,6.5,$N["libro"],1,0,'C');
            $pdf->Cell(10,6.5,$N["folio"],1,0,'C');
            $pdf->Cell(18,6.5,$N["fecha"],1,0,'C');
            $num = $num + 1;
            
            $notac = $notac + $not;
            
		}else{
		    //$pdf->Cell(20,6.5,'',1,1,'C');
		}
	}
    $pdf->Cell(1,6.5,'',0,1,'C');
		
    $n = ($n+1);

   

}	
$pdf->Cell(144,6.5,'',0,0,'C');
$pdf->Cell(30,6.5,'Promedio : ',1,0,'C');
$promedio = $notac/$num;
$format_number = number_format($promedio, 2, '.', '');
$pdf->Cell(18,6.5,$format_number,1,0,'C');

$pdf->Output('Plan-Estudiosn-'.$usuario["nombre"].'.pdf');

