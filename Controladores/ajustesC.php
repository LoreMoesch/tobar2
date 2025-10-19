<?php

class AjustesC{

	static public function VerAjustesC($columna, $valor){

		$tablaBD = "ajustes";

		$resultado = AjustesM::VerAjustesM($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function CambiarCuatrimestreC(){

		if(isset($_POST["cuatrimestreA"])){

			$tablaBD = "ajustes";

			$cuatrimestre = $_POST["cuatrimestreA"];

			$resultado = AjustesM::CambiarCuatrimestreM($tablaBD, $cuatrimestre);

			if($resultado == true){

				echo '<script>

				window.location = "Editar-Inicio";
				</script>';

			}

		}

	}




	public function ActualizarAjustesC(){

		if(isset($_POST["1_fecha_inicio"])){

			$tablaBD = "ajustes";

			$datosC = array("1_fecha_inicio"=>$_POST["1_fecha_inicio"], "1_fecha_fin"=>$_POST["1_fecha_fin"], "2_fecha_inicio"=>$_POST["2_fecha_inicio"], "2_fecha_fin"=>$_POST["2_fecha_fin"], "1examenes_i"=>$_POST["1examenes_i"], "1examenes_f"=>$_POST["1examenes_f"], "2examenes_i"=>$_POST["2examenes_i"], "2examenes_f"=>$_POST["2examenes_f"], "materias_i"=>$_POST["materias_i"], "materias_f"=>$_POST["materias_f"]);

			$resultado = AjustesM::ActualizarAjustesM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "inicio";
				</script>';

			}

		}

	}


		public function HMC(){
			if(isset($_POST["h_materias"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "h_materias"=>$_POST["h_materias"]);
				$resultado = AjustesM::HMM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Carreras";
					</script>';
				}
			}
		}

		public function HMMC(){
			if(isset($_POST["mto"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "mto"=>$_POST["mto"]);
				$resultado = AjustesM::HMMM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "inicio";
					</script>';
				}
			}
		}

		public function DMMC(){
			if(isset($_POST["mto"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "mto"=>$_POST["mto"]);
				$resultado = AjustesM::DMMM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "inicio";
					</script>';
				}
			}
		}

		
		public function HCC(){
			if(isset($_POST["h_ccarrera"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "h_ccarrera"=>$_POST["h_ccarrera"]);
				$resultado = AjustesM::HCM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Carreras";
					</script>';
				}
			}
		}
		
		public function DCC(){
			if(isset($_POST["h_ccarrera"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>0, "h_ccarrera"=>$_POST["h_ccarrera"]);
				$resultado = AjustesM::DCM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Carreras";
					</script>';
				}
			}
		}
		
		public function HEC(){
			if(isset($_POST["h_examenes"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "h_examenes"=>$_POST["h_examenes"]);
				$resultado = AjustesM::HEM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Examenes";
					</script>';
				}
			}
		}

		public function VTMC(){
			if(isset($_POST["Exa_e"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "Exa_es"=>$_POST["Exa_e"]);
				$resultado = AjustesM::VTMM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Ver-llamado";
					</script>';
				}
			}
		}
		public function VAMC(){
			if(isset($_POST["Exa_a"])){
				$tablaBD = "ajustes";
				$datosC = array("id"=>1, "Exa_act"=>$_POST["Exa_a"]);
				$resultado = AjustesM::VAMM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Ver-llamado";
					</script>';
				}
			}
		}


}
