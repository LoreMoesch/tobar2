<?php


class CertificadosC{

	public function PedirCertificadosC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "certificados";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "tipo"=>$_POST["tipo"], "estado"=>$_POST["estado"]);

			$resultado = CertificadosM::PedirCertificadosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/tobar2/Constancia-Alumno";
				</script>';

			}

		}

	}

	public function PedirCertificados1C(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "certificados";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "tipo"=>$_POST["tipo"], "estado"=>$_POST["estado"]);

			$resultado = CertificadosM::PedirCertificadosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/tobar2/Constancia-Alumno1";
				</script>';

			}

		}

	}
	
	public function PedirCertificados24C(){

		if(isset($_POST["id_alumno"])){
		    
		    $permitted_chars = '0123456789012';
		    
            // Output: 54esmdr0qf 
            
            $codigoa = substr(str_shuffle($permitted_chars), 0, 12);

            date_default_timezone_set('america/argentina/buenos_aires');
            
            $fpedido= date("Y-m-d");
            
            $f_vence = strtotime('+30 day', strtotime($fpedido));

            $f_vence = date('Y-m-d', $f_vence);
            
            $auto=0;
            
            $nro=$_POST["nroa"]+1;
            
			$tablaBD = "certificados";
			
			$datosC = array("id_alumno"=>$_POST["id_alumno"], "tipo"=>$_POST["tipo"], "estado"=>$_POST["estado"], "codigo"=>$codigoa, "f_pedido"=>$fpedido, "f_vence"=>$f_vence, "auto"=>$auto, "nro"=>$nro );

			$resultado = CertificadosM::PedirCertificadosM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/tobar2/Constancia-Alumno24";
				</script>';

			}

		}

	}
	
		public function PresenteC(){

			$tablaBD = "asistencia";
			
			$nombre = $_SESSION["nombre"];
			
			$apellido = $_SESSION["apellido"];
			
			$nomape=$apellido.' '.$nombre;
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			$hoy = date("Y-m-d H:i:s");
			
			$dia = date("Y-m-d");
			
			$hora = date("H:i:s");
			
			$id_profe = $_SESSION["id"];
			
			$flag_s = 1;

			$datosC = array("fecha_hora"=>$hoy, "fecha"=>$dia, "hora"=>$hora, "nombre"=>$nomape, "fk_profe"=>$id_profe , "flag_s"=>$flag_s);

			$resultado = CertificadosM::PresenteM($tablaBD, $datosC);

			if($resultado == true){
                
               // echo '<script>
				//window.location = "http://localhost/tobar2/inicio";
				//</script>';

                session_destroy();
                
				echo '<script>
				window.location = "httpss://classroom.google.com/";
				</script>';

			}

	}
	
	static public function VerPresentesC($columna, $valor){

		$tablaBD = "asistencia";

		$resultado = CertificadosM::VerPresentesM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerCertificadosAC($valor){

		$tablaBD = "certificados";

		$resultado = CertificadosM::VerCertificadosAM($tablaBD, $valor);

		return $resultado;

	}

	static public function VerCertificadosC($columna, $valor){

		$tablaBD = "certificados";

		$resultado = CertificadosM::VerCertificadosM($tablaBD, $columna, $valor);

		return $resultado;

	}

    public function EliminarPresenteC(){

					
			if(isset($_POST["Pid"])){

				$tablaBD = "asistencia";

				$id = $_POST["Pid"];

				$resultado = CertificadosM::EliminarPresenteM($tablaBD, $id);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/Asistencia";
					</script>';

				}

			}

		}

	public function CambiarEC(){

		if(isset($_POST["Eid"])){

			$tablaBD = "certificados";

			$datosC = array("id"=>$_POST["Eid"], "estado"=>$_POST["estado"], "auto"=>$_POST["autoa"]);

			$resultado = CertificadosM::CambiarEM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "Certificados";
				</script>';

			}

		}

	}




}
