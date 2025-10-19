<?php

class ExamenesC{

	public function CrearExamenC(){

		if(isset($_POST["estado"])){

			$tablaBD = "examenes";

			$id_carrera = $_POST["id_carrera"];

			$datosC = array("estado"=>$_POST["estado"], "id_carrera"=>$_POST["id_carrera"], "id_materia"=>$_POST["id_materia"], "profesor"=>$_POST["profesor"], "aula"=>$_POST["aula"], "fecha"=>$_POST["fecha"], "hora"=>$_POST["hora"]);

			$resultado = ExamenesM::CrearExamenM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/tobar2/Crear-Examenes/'.$id_carrera.'";
				</script>';

			}

		}

	}




	static public function VerExamenesC($columna, $valor){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenesM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerExamenesPorOrdenC($columna, $valor){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenesPorOrdenM($tablaBD, $columna, $valor);

		return $resultado;

	}



	static public function VerExamenesllC($columna, $valor){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenesllM($tablaBD, $columna, $valor);

		return $resultado;

	}
	
	static public function VerExamenesllaC(){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenesllaM($tablaBD);

		return $resultado;

	}	


	// para mostrar los dos turnos de examenes
	
	static public function VerExamenes2C($columna1, $columna2, $columna3, $valor1, $valor2, $valor3){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenes2M($tablaBD, $columna1, $columna2, $columna3, $valor1, $valor2, $valor3);

		return $resultado;

	}
	
	static public function VerExamenes22C($columna1, $columna2, $valor1, $valor2){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenes22M($tablaBD, $columna1, $columna2, $valor1, $valor2);

		return $resultado;

	}

	static public function VerExamenes322C($columna1, $columna2, $columna3, $valor1, $valor2, $valor3){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenes322M($tablaBD, $columna1, $columna2, $columna3, $valor1, $valor2, $valor3);

		return $resultado;

	}


	static public function VerExamenes1C($columna, $valor){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenes1M($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerExamenes133C($columna, $valor){

		$tablaBD = "examenes";

		$resultado = ExamenesM::VerExamenes133M($tablaBD, $columna, $valor);

		return $resultado;

	}


	public function InscribirseExamenC(){
	
		if(isset($_POST["id_alumno"])){
	
			$tablaBD = "insc_examenes";
			
			$columna = "id";

			$valor = $_POST["id_examen"];

			$resultadoa = ExamenesC::VerExamenesC($columna, $valor);

			$examena=$resultadoa["nro_llamado"];
	
			$datosC = array("id_alumno"=>$_POST["id_alumno"], "id_examen"=>$_POST["id_examen"], "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "apellido"=>$_POST["apellido"], "condicion"=>$_POST["condicion"], "fecha_insc"=>$_POST["fecha_insc"], "nro_llamado"=>$examena);
	
			$id_carrera = $_POST["id_carrera"];
	
			$resultado = ExamenesM::InscribirseExamenM($tablaBD, $datosC);
	
			if($resultado == true){
	
				echo '<script>
	
				window.location = "http://localhost/tobar2/Ver-Examenes1/'.$id_carrera.'";
	
				</script>';
	
			}
	
		}
	
	}
	

	static public function VerInscExamenliC($columna, $valor){

		$tablaBD = "insc_examenes";

		$resultado = ExamenesM::VerInscExamenliM($tablaBD, $columna, $valor);

		return $resultado;

	}


	static public function VerInscExamenC($columna, $valor){

		$tablaBD = "insc_examenes";

		$resultado = ExamenesM::VerInscExamenM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerInscExamen2C($columna, $valor){

		$tablaBD = "insc_examenes";

		$resultado = ExamenesM::VerInscExamenM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerInscExaIDC($id){

		$tablaBD = "insc_examenes";

		$resultado = ExamenesM::VerIncrExaIDM($tablaBD, $id);

		return $resultado;

	}

	static public function VerInscExamentodosC(){

		$tablaBD = "insc_examenes";

		$resultado = ExamenesM::VerInscExamentodosM($tablaBD);

		return $resultado;

	}


	// $exp[1]= $id_carrera
	// $exp[2]= $id  Examenes
	// $exp[3]= $id_materia
	// $exp[4]= id de insc_examenes

	public function BorrarInscEC(){
		$exp = explode("/", $_GET["url"]);
		$id = $exp[3];
		$id_carrera= $exp[1];
		if(isset($id)){
			$tablaBD = "insc_examenes";
			$resultado = ExamenesM::BorrarInscEM($tablaBD, $id);
			if($resultado == true){
				echo '<script>
					window.location = "http://localhost/tobar2/Ver-Examenes1";
					</script>';
			}
		}
	}
	
		public function DEC(){
			if(isset($_POST["h_ccarrera"])){
				$tablaBD = "examenes";
				$datosC = array("id_e"=>$_POST["id_e"]);
				$resultado = ExamenesM::DECM($datosC, $tablaBD);
				if($resultado == true){
					echo '<script>
					window.location = "Ver-llamado";
					</script>';
				}
			}
		}
	

	public function BorrarinscexaC(){
	    
		$exp = explode("/", $_GET["url"]);
		
		$id =$exp[1];
		
		$id_examen = $exp[2];
		
		$libre_regu = $exp[3];
		
		if(isset($id)){
		
			$tablaBD = "insc_examenes";
		
			$resultado = ExamenesM::BorrarInscEM($tablaBD, $id);
		
			if($resultado == true){
		
		      if($exp[3] == 1){
		          
				echo '<script>
		
					window.location = "http://localhost/tobar2/Inscriptos-examen/'.$exp[2].'";
		
					</script>';
		      } else if($exp[3] == 0){
		          
		          echo '<script>
		
				   window.location = "http://localhost/tobar2/Inscriptos-examenl/'.$exp[2].'";
					
		          </script>';
		      }
			}
		
		}
	
	}


	public function ActualizarExamenesC(){
	    
	    $ide=$_POST["id_profe"];

        if ($ide==0){
        
        $id=$_POST["id_pro"];
        
        } else{
            
        $id=$_POST["id_profe"];
            
        }
       
        $docente = UsuariosC::VerUsuarios1C($id);

        
        $apenombre=$docente["apellido"]." ".$docente["nombre"];
        
        
		
		if(isset($_POST["id_examen"])){

			$tablaBD = "examenes";

			//$estado = $_POST["estado_e"];
			
			//$id_promo = $_POST["id_promo"];
			
			//$id_comision = $_POST["id_comision"];
			
			//$id_materia = $_POST["id_materia"];
			
			//$id_carrera = $_POST["id_carrera"];

			//$datosC = array("id"=>$_POST["nota_id"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"], "fecha_r"=>$_POST["fecha_r"], "nota_regular"=>$_POST["notar"]);
			
			$datosC = array("id"=>$_POST["id_examen"], "nro_llamado"=>$_POST["nro_llamado"], "estado"=>$_POST["estado_e"], "profesor"=>$apenombre, "idprofe"=>$id, "fecha"=>$_POST["fecha"], "llamado"=>$_POST["llamado"], "orden"=>$_POST["orden"], "comision"=>$_POST["comision"], "tipo"=>$_POST["tipo"]);
			
			$resultado = ExamenesM::ActualizarExamenesM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Ver-llamado";
					</script>';

			}

		}

	}
		
	static public function VerTurnoC(){

		$tablaBD = "llamados";

		$resultado = ExamenesM::VerTurnoM($tablaBD);

		return $resultado;

	}
	
	static public function VerTurnoAC(){

		$tablaBD = "llamados";

		$resultado = ExamenesM::VerTurnoAM($tablaBD);

		return $resultado;

	}
	
	
	static public function VerTurnosC($columna, $valor){

		$tablaBD = "llamados";

		$resultado = ExamenesM::VerTurnosM($tablaBD, $columna, $valor);

		return $resultado;

	}		
	
		public function ActualizarTurnosC(){
	    
		if(isset($_POST["id_turno"])){

			$tablaBD = "llamados";

//			$datosC = array("id"=>$_POST["id_examen"], "estado"=>$_POST["estado_e"], "profesor"=>$apenombre, "idprofe"=>$id, "fecha"=>$_POST["fecha"], "llamado"=>$_POST["llamado"], "orden"=>$_POST["orden"], "comision"=>$_POST["comision"], "tipo"=>$_POST["tipo"]);
			
			$datosC = array("id"=>$_POST["id_turno"], "estado"=>$_POST["estado_t"]);


			$resultado = ExamenesM::ActualizarTurnosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Turno";
					</script>';

			}

		}

	}


}
