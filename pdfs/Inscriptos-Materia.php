<?php

require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";
require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";
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
        $valor=$exp[4];
        $comision = MateriasC::VerComisiones2C($columna, $valor);

        $columna = "id";
        $valor = $comision["id_materia"];
        $materia = MateriasC::VerMaterias2C($columna, $valor);

        $columna = "id";
        $valor = $comision["id_usuario"];
        $profe= UsuariosC::VerUsuariosC($columna, $valor);

        $columna ="id";
        $valor = $materia["id_carrera"];
        $carrera = CarrerasC::VerCarreras2C($columna, $valor);
       
        $pdf->SetFont('helvetica', 'BU', 14);
        $pdf->SetXY(0, 8);$pdf->Cell(0, 7, 'INFORME COMISION', 0, 1, 'C');
        $pdf->SetFont('helvetica', 'BN', 10);
        $pdf->SetXY(17, 15);$pdf->Cell(0, 7, 'Asignatura :    '.$comision["nombre"].'           Profe : '.$profe["nombre"].' '.$profe["apellido"], 0, 1, 'L');
        $pdf->SetXY(17, 20);$pdf->Cell(0, 7, 'Comision Numero : '.$comision["id"].'           Dias : '.$comision["dias"].'         Horarios: '.$comision["horario"], 0, 1, 'L');
        $pdf->SetXY(17, 25);$pdf->Cell(0, 7, 'Carreras :   '.$comision["carreras"], 0, 1, 'L');
        $pdf->SetXY(10, 35);
        $pdf->SetFont('helvetica', 'BN', 8);
        $pdf->Cell(8,8,'Num',1,0,'C');
        $pdf->Cell(50,8,'Apellido/s y Nombre/s',1,0,'C');		
        $pdf->Cell(20,8,'Dni',1,0,'C');		
        $pdf->Cell(20,8,'Libreta',1,0,'C');		
        $pdf->Cell(27,8,'Clasificacion',1,0,'C');
        $pdf->Cell(15,8,'Nota',1,0,'C');
        $pdf->Cell(48,8,'Observaciones',1,1,'C');		
        $pdf->SetFont('helvetica', 'N', 7);
        $columna = "id_comision";
        $valor = $exp[4];
        $inscriptos = MateriasC::VerInscMateriasC($columna, $valor);
        $oo=0;
        $notis="";
        //$pdf->SetXY(10, 43);
        foreach ($inscriptos as $key => $value) {
            $columna = "id";
            $valor = $value["id_alumno"];
            $alumnos = UsuariosC::VerUsuarios2C($columna, $valor);
            foreach ($alumnos as $key => $v) {
                if($value["id_comision"] == $exp[4]){
                    $oo++;
                    $columna = "id";
                    $valor = $exp[4];
                    $comision = MateriasC::VerComisiones2C($columna, $valor);
                    $columna = "id_materia";
                    $valor = $value["id_materia"];
                    $nota = MateriasC::VerNotasiC($columna, $valor);
                    //$nota = MateriasC::VerNotasiC($columna, $valor);
                    //$nota = MateriasC::VerNotasiC($columna, $valor);
                    //$nota = MateriasC::VerNotasiC($columna, $valor);
                    $aaa=0;            
                    foreach ($nota as $key => $N) {
                            if($N["id_alumno"] == $value["id_alumno"] && $N["id_materia"] == $value["id_materia"] ){
                                $aaa=1; 
                                $estado =$N["estado"];
                                $notis= $N["nota_regular"];
                            }
                    }
                    if ($aaa==0 || $estado=="Sin Estado"){
                        $estado="Sin Clasificar";
                    }
                    $pdf->Cell(8,7,$oo,1,0,'C');
                    $pdf->Cell(50,7,$v["apellido"].' '. $v["nombre"],1,0,'C');		
                    $pdf->Cell(20,7,$v["dni"],1,0,'C');		
                    $pdf->Cell(20,7,$v["libreta"],1,0,'C');		
                    $pdf->Cell(27,7,$estado,1,0,'C');
                    $pdf->Cell(15,7,$notis,1,0,'C');
                    $pdf->Cell(48,7,'',1,1,'C');		
                    $notis="";
                }
            }       
         }
        $pdf->Output('Comision-'.$exp[4].'-'.$comision["nombre"].'.pdf');

// set some text to print
// $txt = <<<EOD
// TCPDF Example 003222

// Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
// EOD;

// print a block of text using Write()
//$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
//$pdf->Output('example_003.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+