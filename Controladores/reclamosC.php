<?php


class ReclamosC{

public function HacerReclamosC(){
	if(isset($_POST["id_alumno"])){
		$tablaBD = "reclamos";
		$datosC = array("id_alumno"=>$_POST["id_alumno"], "reclamo"=>$_POST["reclamo"], "activo"=>$_POST["activo"], "area"=>$_POST["area"], "fecha_r"=>$_POST["dia"], "hora_r"=>$_POST["hora"], "contacto"=>$_POST["contacto"], "estado"=>$_POST["estado"]);
		$resultado = ReclamosM::HacerReclamosM($tablaBD, $datosC);
		if($resultado == true){
			echo '<script>
			window.location = "http://localhost/tobar2/reclamosa";
			</script>';
		}
	}
}
 
static public function VerReclamosC($columna, $valor){
	$tablaBD = "reclamos";
	$resultado = ReclamosM::VerReclamosM($tablaBD, $columna, $valor);
	return $resultado;
}


public function CambiarRC($valora){
	$tablaBD = "reclamos";
	$estado="listo";
	$datosC = array("id"=>$valora, "estado"=>$estado);
	$resultado = reclamosM::CambiarRM($tablaBD, $datosC);
	if($resultado == true){
		echo '<script>
		window.location = "http://localhost/tobar2/Reclamos";
		</script>';
	}
}


public function BorrarRC($valorb){
	$tablaBD = "reclamos";
	$datosC = array("id"=>$valorb);
	$resultado = reclamosM::BorrarRM($tablaBD, $datosC);
	if($resultado == true){
		echo '<script>
		window.location = "http://localhost/tobar2/Reclamos";
		</script>';
	}
}


}
