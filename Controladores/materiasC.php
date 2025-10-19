<?php

class MateriasC{

	public function CrearMateriaC(){

		if(isset($_POST["Cid"])){

			$rutaPrograma = "";

			if($_FILES["programa"]["type"] == "application/pdf"){

				$nombre = mt_rand(10,999);

				$rutaPrograma = "Vistas/programas/Prog-".$nombre.".pdf";

				move_uploaded_file($_FILES["programa"]["tmp_name"], $rutaPrograma);

			}

				$tablaBD = "materias";

				$Cid = $_POST["Cid"];

				$datosC = array("id_carrera"=>$_POST["Cid"], "codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"], "grado"=>$_POST["grado"], "tipo"=>$_POST["tipo"], "programa"=>$rutaPrograma);

				$resultado = MateriasM::CrearMateriaM($tablaBD, $datosC);

				if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Crear-Materias/'.$Cid.'";
					</script>';

				}

		}

	}

    // todos los registros SELECT * FROM $tablaBD ORDER BY grado, codigo ASC
	static public function VerMateriasC(){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMateriasM($tablaBD);

		return $resultado;

	}
	
	    // todos los registros SELECT * FROM $tablaBD ORDER BY grado, codigo ASC
	public function VerMaterias4C(){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMaterias4M($tablaBD);

		return $resultado;

	}
	
	static public function VerMaterias5C(){

		$tablaBD = "comisiones";

		$resultado = MateriasM::VerMaterias5M($tablaBD);

		return $resultado;

	}
	
	static public function VerMaterias6C($columna, $valor){

		$tablaBD = "rel_mm";

		$resultado = MateriasM::VerMaterias6M($tablaBD, $columna, $valor);

		return $resultado;

	}
	
	// un registro SELECT * FROM $tablaBD WHERE $columna = :$columna 
	static public function VerMaterias1C($columna, $valor){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMaterias1M($tablaBD, $columna, $valor);

		return $resultado;

	}
	

	
	// todos los registro SELECT * FROM $tablaBD WHERE $columna = :$columna 
	static public function VerMaterias3C($columna, $valor){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMaterias3M($tablaBD, $columna, $valor);

		return $resultado;

	}	


    // un registro SELECT * FROM $tablaBD WHERE $columna = :$columna
	static public function VerMaterias2C($columna, $valor){

		$tablaBD = "materias";

		$resultado = MateriasM::VerMaterias2M($tablaBD, $columna, $valor);

		return $resultado;

	}
    
    
    // todos los registros SELECT * FROM $tablaBD ORDER BY grado, codigo ASC
	static public function VerEquiposC($columna, $valor){

		$tablaBD = "equipos_profes";

		$resultado = MateriasM::VerEquiposM($tablaBD, $columna, $valor);

		return $resultado;

	}



	public function EliminarMateriaC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "materias";

			$id = $_GET["Mid"];

			$Cid = $_GET["Cid"];

			$resultado = MateriasM::EliminarMateriaM($tablaBD, $id);

			if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Crear-Materias/'.$Cid.'";
					</script>';

				}

		}

	}



	public function CrearComisionC(){

		if(isset($_POST["id_materia"])){

			$tablaBD = "comisiones";

			$datosC = array("id_materia"=>$_POST["id_materia"], "numero"=>$_POST["numero"], "c_maxima"=>$_POST["c_maxima"], "dias"=>$_POST["dias"], "horario"=>$_POST["horario"], "id_usuario"=>$_POST["profeU"]);

			$id_materia = $_POST["id_materia"];

			$resultado = MateriasM::CrearComisionM($tablaBD, $datosC);

			if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Crear-Comisiones/'.$id_materia.'";
					</script>';

				}

		}

	}

	public function CrearEquipoC(){

		if(isset($_POST["id_profe"])){

			$tablaBD = "equipos_profes";

			$datosC = array("notas"=>$_POST["nota"], "id_usuarios"=>$_POST["id_profe"], "id_comision"=>$_POST["comision"]);

			$id_comision = $_POST["comision"];

			$resultado = MateriasM::CrearEquipoM($tablaBD, $datosC);

			if($resultado == true){

					echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/ver-comision/'.$id_comision.'";
					</script>';

				}

		}

	}




	static public function VerComisionesC($columna, $valor){

		$tablaBD = "comisiones";

		$resultado = MateriasM::VerComisionesM($tablaBD, $columna, $valor);

		return $resultado;

	}

	static public function VerComisiones2C($columna, $valor){

		$tablaBD = "comisiones";

		$resultado = MateriasM::VerComisiones2M($tablaBD, $columna, $valor);

		return $resultado;

	}
	
	
	static public function VerRegimenC($columna, $valor){

		$tablaBD = "regimen";

		$resultado = MateriasM::VerRegimenM($tablaBD, $columna, $valor);

		return $resultado;

	}
	
	static public function VerRegimenC1(){

		$tablaBD = "regimen";

		$resultado = MateriasM::VerRegimenM1($tablaBD);

		return $resultado;

	}
	

	public function ENC(){
		    
		if(isset($_POST["id_comision"])){
			
			$tablaBD = "comisiones";
			
			$comi=$_POST["id_comision"];
			
			$mate=$_POST["id_mate"];
			
			$datosC = array("id_comision"=>$_POST["id_comision"]);
		
			$resultado = MateriasM::ENM($datosC, $tablaBD);
			
			if($resultado == true){
			
				echo '<script>
			
				window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Promo-Estudiantes/'.$comi.'/'.$mate.'";
			
				</script>';
			
			}
			
		}
			
	}


	public function BorrarComisionC(){

		if(isset($_GET["Mid"])){

			$tablaBD = "comisiones";

			$id = $_GET["Cid"];

			$Mid = $_GET["Mid"];

			$resultado = MateriasM::BorrarComisionM($tablaBD, $id);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Crear-Comisiones/'.$Mid.'";
					</script>';

			}

		}

	}
	
/////////// 4 orientaciones

	public function ColocarNotaLnC(){

		if(isset($_POST["id_alumno"])){
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }    
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];

			$tablaBD = "notas_n";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado"=>$estado1);

			$resultado = MateriasM::ColocarNotaLM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Inscriptos-examenl/'.$_POST["id_examen"].'";
					</script>';

			}

		}

	}
	
		public function ColocarNotaLsC(){

		if(isset($_POST["id_alumno"])){
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }    
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];

			$tablaBD = "notas_s";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado"=>$estado1);

			$resultado = MateriasM::ColocarNotaLM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Inscriptos-examenl/'.$_POST["id_examen"].'";
					</script>';

			}

		}

	}	public function ColocarNotaLiC(){

		if(isset($_POST["id_alumno"])){
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }    
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];

			$tablaBD = "notas_i";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado"=>$estado1);

			$resultado = MateriasM::ColocarNotaLM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Inscriptos-examenl/'.$_POST["id_examen"].'";
					</script>';

			}

		}

	}	public function ColocarNotaLcC(){

		if(isset($_POST["id_alumno"])){
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }    
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];

			$tablaBD = "notas_c";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado"=>$estado1);

			$resultado = MateriasM::ColocarNotaLM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Inscriptos-examenl/'.$_POST["id_examen"].'";
					</script>';

			}

		}

	}
	
	
	//// 4 orientaciones ////
    
	public function ColocarNotanC(){

		if(isset($_POST["id_alumno"])){

			$alumno=$_POST["id_alumno"];
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");
			
			//If ($_POST["estado"]=="Regular"){
			    
			$nota_r=$_POST["notar"];  
			//$nota_f=0;  
			//}
			
			$nota_f=$_POST["nota_f"];
			//else {
			//  $nota_f=$_POST["notar"];  
			//  $nota_r=0;  
			//}
            
			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			//$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"]);

         
 
			$tablaBD = "notas_n";

			$datosC = array("id_carrera"=>$_POST["id_carrera"],"comision"=>$_POST["comision"],"fechaa"=>$fechaa,"hora"=>$hora,"nomyape"=>$_POST["nomyape"], "usuario"=>$_POST["usuario"], "proceso"=>$_POST["proceso"],"id_alumno"=>$_POST["id_alumno"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor_final"=>$_POST["profe_f"], "estado_final"=>$estado_f, "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$nota_r, "nota_final"=>$nota_f, "fecha_r"=>$_POST["fecha_r"], "profesor"=>$_POST["profesor"]);

			$resultado = MateriasM::ColocarNotaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$alumno.'";
					</script>';

			}

		}

	}

	public function ColocarNotacC(){

		if(isset($_POST["id_alumno"])){

			$alumno=$_POST["id_alumno"];
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");
			
			//If ($_POST["estado"]=="Regular"){
			    
			$nota_r=$_POST["notar"];  
			//$nota_f=0;  
			//}
			
			$nota_f=$_POST["nota_f"];
			//else {
			//  $nota_f=$_POST["notar"];  
			//  $nota_r=0;  
			//}
            
			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			//$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"]);

         
 
			$tablaBD = "notas_c";

			$datosC = array("id_carrera"=>$_POST["id_carrera"], "comision"=>$_POST["comision"],"fechaa"=>$fechaa,"hora"=>$hora,"nomyape"=>$_POST["nomyape"], "usuario"=>$_POST["usuario"], "proceso"=>$_POST["proceso"],"id_alumno"=>$_POST["id_alumno"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor_final"=>$_POST["profe_f"], "estado_final"=>$estado_f, "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$nota_r, "nota_final"=>$nota_f, "fecha_r"=>$_POST["fecha_r"], "profesor"=>$_POST["profesor"]);

			$resultado = MateriasM::ColocarNotaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$alumno.'";
					</script>';

			}

		}

	}
	
		public function ColocarNotaiC(){

		if(isset($_POST["id_alumno"])){
		    
		    $alumno=$_POST["id_alumno"];

			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");
			
			//If ($_POST["estado"]=="Regular"){
			    
			$nota_r=$_POST["notar"];  
			//$nota_f=0;  
			//}
			
			$nota_f=$_POST["nota_f"];
			//else {
			//  $nota_f=$_POST["notar"];  
			//  $nota_r=0;  
			//}
            
			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			//$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"]);

         
 
			$tablaBD = "notas_i";

			$datosC = array("id_carrera"=>$_POST["id_carrera"], "comision"=>$_POST["comision"],"fechaa"=>$fechaa,"hora"=>$hora,"nomyape"=>$_POST["nomyape"], "usuario"=>$_POST["usuario"], "proceso"=>$_POST["proceso"],"id_alumno"=>$_POST["id_alumno"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor_final"=>$_POST["profe_f"], "estado_final"=>$estado_f, "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$nota_r, "nota_final"=>$nota_f, "fecha_r"=>$_POST["fecha_r"], "profesor"=>$_POST["profesor"]);

			$resultado = MateriasM::ColocarNotaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$alumno.'";
					</script>';

			}

		}

	}

	public function ColocarNotasC(){

		if(isset($_POST["id_alumno"])){

			$alumno=$_POST["id_alumno"];
			$libreta = $_POST["libreta"];
			$id_carrera = $_POST["id_carrera"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");
			
			//If ($_POST["estado"]=="Regular"){
			    
			$nota_r=$_POST["notar"];  
			//$nota_f=0;  
			//}
			
			$nota_f=$_POST["nota_f"];
			//else {
			//  $nota_f=$_POST["notar"];  
			//  $nota_r=0;  
			//}
            
			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			//$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"]);

         
 
			$tablaBD = "notas_s";

			$datosC = array("id_carrera"=>$_POST["id_carrera"], "comision"=>$_POST["comision"],"fechaa"=>$fechaa,"hora"=>$hora,"nomyape"=>$_POST["nomyape"], "usuario"=>$_POST["usuario"], "proceso"=>$_POST["proceso"],"id_alumno"=>$_POST["id_alumno"], "llamado"=>$_POST["llamado"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha"=>$_POST["fecha"], "profesor_final"=>$_POST["profe_f"], "estado_final"=>$estado_f, "libreta"=>$_POST["libreta"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$nota_r, "nota_final"=>$nota_f, "fecha_r"=>$_POST["fecha_r"], "profesor"=>$_POST["profesor"]);

			$resultado = MateriasM::ColocarNotaM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$alumno.'";
					</script>';

			}

		}

	}

//// 4 orientaciones ////


	public function ColocarNotaDiC(){

		if(isset($_POST["id_alumno"])){

			$libreta = $_POST["libreta"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_comision = $_POST["id_comision"];

			$tablaBD = "notas_i";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libro"=>$_POST["libro"], "llamado"=>$_POST["llamado"], "folio"=>$_POST["folio"], "libreta"=>$_POST["libreta"], "comision"=>$_POST["id_comision"], "comun"=>$_POST["comun"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$_POST["notar"], "profesor"=>$_POST["profesor"], "fecha_r"=>$_POST["fecha_r"]);

			$resultado = MateriasM::ColocarNotaDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/'.$id_comision.'";
					</script>';

			}

		}

	}

	public function ColocarNotaDnC(){

		if(isset($_POST["id_alumno"])){

			$libreta = $_POST["libreta"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_comision = $_POST["id_comision"];

			$tablaBD = "notas_n";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libro"=>$_POST["libro"], "llamado"=>$_POST["llamado"], "folio"=>$_POST["folio"], "libreta"=>$_POST["libreta"], "comision"=>$_POST["id_comision"], "comun"=>$_POST["comun"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$_POST["notar"], "profesor"=>$_POST["profesor"], "fecha_r"=>$_POST["fecha_r"]);

			$resultado = MateriasM::ColocarNotaDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}
	
		public function ColocarNotaDsC(){

		if(isset($_POST["id_alumno"])){

			$libreta = $_POST["libreta"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_comision = $_POST["id_comision"];

			$tablaBD = "notas_s";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libro"=>$_POST["libro"], "llamado"=>$_POST["llamado"], "folio"=>$_POST["folio"], "libreta"=>$_POST["libreta"], "comision"=>$_POST["id_comision"], "comun"=>$_POST["comun"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$_POST["notar"], "profesor"=>$_POST["profesor"], "fecha_r"=>$_POST["fecha_r"]);

			$resultado = MateriasM::ColocarNotaDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}
	
		public function ColocarNotaDcC(){

		if(isset($_POST["id_alumno"])){

			$libreta = $_POST["libreta"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_comision = $_POST["id_comision"];

			$tablaBD = "notas_c";

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "libro"=>$_POST["libro"], "llamado"=>$_POST["llamado"], "folio"=>$_POST["folio"], "libreta"=>$_POST["libreta"], "comision"=>$_POST["id_comision"], "comun"=>$_POST["comun"], "id_materia"=>$_POST["id_materia"], "estado"=>$_POST["estado"], "nota_regular"=>$_POST["notar"], "profesor"=>$_POST["profesor"], "fecha_r"=>$_POST["fecha_r"]);

			$resultado = MateriasM::ColocarNotaDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}



    //notas 
    
	//// ColocarNotaLC //// Nota-Examenl.php 
    
    //// ColocarNotaC  //// Nota-Materia.php ///
	
	//// ColocarNotaDC //// Nota-MateriaD.php
    
    //// VerNotasC     //// C-Materias.php ....
	                   //// Comprobante-Exa.php ....
	                   //// Inscriptos-Examen1.php
	                   //// Inscriptos-Examen1_l.php
	                   //// Inscriptos-Materia.php
	                   //// Plan-de-Estudios.php ///
	                   //// Comision-Estudiantes.php
	                   //// Comision_estudiantes.php
	                   //// Inscriptos-examen.php
	                   //// Inscriptos-examenl.php
	                   //// Materias.php ///
	                   //// Materias1.php
	                   //// Materias2.php//
	                   //// Nota-Materia.php ///
	                   //// Nota-MateriaD.php /
	                   //// Promo-Estudiantes.php ///
	                   //// Ver-Examenes1.php ///
	                   //// Ver-Plan.php ///
	
	//// VerNotasAC    //// Estudiantes.php                   

    //// VerNotas2C    //// Editar-Nota.php ///
                       //// Editar-NotaD.php
                       //// Nota-Examen.php
                       //// Nota-Examenl.php
                       //// Nota-Examenle.php
                       
    //// CambiarNotaC  //// Editar-Nota.php ///
    
    //// CambiarNotaDC //// Editar-NotaD.php
    
    //// CambiarNota1C //// Nota-Examen.php
    
    //// CambiarNota1LC //// Nota-Examenle.php
    
    //// informes       //// Plan-de-Estudios.php ///
    
    
                       
///////// notas para las 4 orientaciones ///////////

 static public function VerNotasC($columna, $valor){

	  $tablaBD = "notas";

		$resultado = MateriasM::VerNotasM($tablaBD, $columna, $valor);

		return $resultado;

	}


 static public function VerNotasiC($columna, $valor){

	  $tablaBD = "notas_i";

		$resultado = MateriasM::VerNotasM($tablaBD, $columna, $valor);

		return $resultado;

	}
	
 static public function VerNotascC($columna, $valor){

	  $tablaBD = "notas_c";

		$resultado = MateriasM::VerNotasM($tablaBD, $columna, $valor);

		return $resultado;

	}

 static public function VerNotassC($columna, $valor){

	  $tablaBD = "notas_s";

		$resultado = MateriasM::VerNotasM($tablaBD, $columna, $valor);

		return $resultado;

	}
	
 static public function VerNotasnC($columna, $valor){

	  $tablaBD = "notas_n";

		$resultado = MateriasM::VerNotasM($tablaBD, $columna, $valor);

		return $resultado;

	}

//////// notas para las 4 orientaciones ////////


 static public function VerNotasnAC($columna, $valor){

	  $tablaBD = "notas_n";

		$resultado = MateriasM::VerNotasAM($tablaBD, $columna, $valor);

		return $resultado;

	}

 static public function VerNotasiAC($columna, $valor){

	  $tablaBD = "notas_i";

		$resultado = MateriasM::VerNotasAM($tablaBD, $columna, $valor);

		return $resultado;

	}

 static public function VerNotassAC($columna, $valor){

	  $tablaBD = "notas_s";

		$resultado = MateriasM::VerNotasAM($tablaBD, $columna, $valor);

		return $resultado;

	}

 static public function VerNotascAC($columna, $valor){

	  $tablaBD = "notas_c";

		$resultado = MateriasM::VerNotasAM($tablaBD, $columna, $valor);

		return $resultado;

	}




//un registro
/////////// 4 orientacones ////

	static public function VerNotas2nC($columna, $valor){

		$tablaBD = "notas_n";

		$resultado = MateriasM::VerNotas2M($tablaBD, $columna, $valor);

		return $resultado;

	}
	static public function VerNotas2iC($columna, $valor){

		$tablaBD = "notas_i";

		$resultado = MateriasM::VerNotas2M($tablaBD, $columna, $valor);

		return $resultado;

	}
	static public function VerNotas2sC($columna, $valor){

		$tablaBD = "notas_s";

		$resultado = MateriasM::VerNotas2M($tablaBD, $columna, $valor);

		return $resultado;

	}
	static public function VerNotas2cC($columna, $valor){

		$tablaBD = "notas_c";

		$resultado = MateriasM::VerNotas2M($tablaBD, $columna, $valor);

		return $resultado;

	}
/////////// 4 orientacones ////


/////// 4 orientaciones ////

	public function CambiarNotanC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_n";

			$libreta = $_POST["libreta"];
			
			$id_carrera = $_POST["id_carrera"];
			
			$id_alu = $_POST["id_alumno"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			//$hoy = date("Y-m-d H:i:s");
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");

			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamadod"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"], "comision"=>$_POST["comision"]);

			$datosB = array("id_carrera"=> $_POST["id_carrera"], "proceso"=>$_POST["proceso"], "usuario"=>$_POST["usuario"], "estadof_anterior"=>$_POST["estadof_anterior"], "estado_anterior"=>$_POST["estado_anterior"], "notaf_anterior"=>$_POST["notaf_anterior"], "nota_anterior"=>$_POST["nota_anterior"], "comision_anterior"=>$_POST["comision_anterior"], "fechaa"=>$fechaa, "hora"=>$hora, "nomyape"=>$_POST["nomyape"], "id_alumno"=>$_POST["id_alumno"], "llamadoreg"=>$_POST["llamadoreg"], "llamadod"=>$_POST["llamadod"]);


			$resultado = MateriasM::CambiarNotaM($tablaBD, $datosC, $datosB);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$id_alu.'";
					</script>';

			}

		}

	}
	
		public function CambiarNotasC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_s";

			$libreta = $_POST["libreta"];
			
			$id_carrera = $_POST["id_carrera"];
			
			$id_alu = $_POST["id_alumno"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			//$hoy = date("Y-m-d H:i:s");
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");

			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamadod"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"], "comision"=>$_POST["comision"]);

			$datosB = array("id_carrera"=> $_POST["id_carrera"], "proceso"=>$_POST["proceso"], "usuario"=>$_POST["usuario"], "estadof_anterior"=>$_POST["estadof_anterior"], "estado_anterior"=>$_POST["estado_anterior"], "notaf_anterior"=>$_POST["notaf_anterior"], "nota_anterior"=>$_POST["nota_anterior"], "comision_anterior"=>$_POST["comision_anterior"], "fechaa"=>$fechaa, "hora"=>$hora, "nomyape"=>$_POST["nomyape"], "id_alumno"=>$_POST["id_alumno"], "llamadoreg"=>$_POST["llamadoreg"], "llamadod"=>$_POST["llamadod"]);


			$resultado = MateriasM::CambiarNotaM($tablaBD, $datosC, $datosB);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$id_alu.'";
					</script>';

			}

		}

	}

		public function CambiarNotacC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_c";

			$libreta = $_POST["libreta"];
			
			$id_carrera = $_POST["id_carrera"];
			
			$id_alu = $_POST["id_alumno"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			//$hoy = date("Y-m-d H:i:s");
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");

			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamadod"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"], "comision"=>$_POST["comision"]);

			$datosB = array("id_carrera"=> $_POST["id_carrera"], "proceso"=>$_POST["proceso"], "usuario"=>$_POST["usuario"], "estadof_anterior"=>$_POST["estadof_anterior"], "estado_anterior"=>$_POST["estado_anterior"], "notaf_anterior"=>$_POST["notaf_anterior"], "nota_anterior"=>$_POST["nota_anterior"], "comision_anterior"=>$_POST["comision_anterior"], "fechaa"=>$fechaa, "hora"=>$hora, "nomyape"=>$_POST["nomyape"], "id_alumno"=>$_POST["id_alumno"], "llamadoreg"=>$_POST["llamadoreg"], "llamadod"=>$_POST["llamadod"]);


			$resultado = MateriasM::CambiarNotaM($tablaBD, $datosC, $datosB);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$id_alu.'";
					</script>';

			}

		}

	}

	public function CambiarNotaiC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_i";

			$libreta = $_POST["libreta"];
			
			$id_carrera = $_POST["id_carrera"];
			
			$id_alu = $_POST["id_alumno"];
			
			date_default_timezone_set('america/argentina/buenos_aires');
			
			//$hoy = date("Y-m-d H:i:s");
			
			$fechaa = date("Y-m-d");
			
			$hora = date("H:i:s");

			If ($_POST["estado_final"]=="Ninguno"){
			    
			  $estado_f="";  
			}else {
			  $estado_f=$_POST["estado_final"];  
			}

			$datosC = array("id"=>$_POST["nota_id"], "estado"=>$_POST["estado"], "estado_final"=>$estado_f, "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "nota_final"=>$_POST["nota_f"], "nota_regular"=>$_POST["nota_r"], "llamado"=>$_POST["llamadod"], "libro"=>$_POST["libro"], "folio"=>$_POST["folio"], "fecha_r"=>$_POST["fecha_r"], "profesor_final"=>$_POST["profe_f"], "comision"=>$_POST["comision"]);

			$datosB = array("id_carrera"=> $_POST["id_carrera"], "proceso"=>$_POST["proceso"], "usuario"=>$_POST["usuario"], "estadof_anterior"=>$_POST["estadof_anterior"], "estado_anterior"=>$_POST["estado_anterior"], "notaf_anterior"=>$_POST["notaf_anterior"], "nota_anterior"=>$_POST["nota_anterior"], "comision_anterior"=>$_POST["comision_anterior"], "fechaa"=>$fechaa, "hora"=>$hora, "nomyape"=>$_POST["nomyape"], "id_alumno"=>$_POST["id_alumno"], "llamadoreg"=>$_POST["llamadoreg"], "llamadod"=>$_POST["llamadod"]);


			$resultado = MateriasM::CambiarNotaM($tablaBD, $datosC, $datosB);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Ver-Plan/'.$id_carrera.'/'.$libreta.'/'.$id_alu.'";
					</script>';

			}

		}

	}

/////// 4 orientaciones ////

	public function CambiarNotanDC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_n";

			$libreta = $_POST["libreta"];
			
			$id_promo = $_POST["id_promo"];
			
			$id_comision = $_POST["id_comision"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_carrera = $_POST["id_carrera"];

			$datosC = array("id"=>$_POST["nota_id"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"], "fecha_r"=>$_POST["fecha_r"], "nota_regular"=>$_POST["notar"]);

			$resultado = MateriasM::CambiarCaliDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}

	public function CambiarNotacDC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_c";

			$libreta = $_POST["libreta"];
			
			$id_promo = $_POST["id_promo"];
			
			$id_comision = $_POST["id_comision"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_carrera = $_POST["id_carrera"];

			$datosC = array("id"=>$_POST["nota_id"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"], "fecha_r"=>$_POST["fecha_r"], "nota_regular"=>$_POST["notar"]);

			$resultado = MateriasM::CambiarCaliDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}

	public function CambiarNotaiDC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_i";

			$libreta = $_POST["libreta"];
			
			$id_promo = $_POST["id_promo"];
			
			$id_comision = $_POST["id_comision"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_carrera = $_POST["id_carrera"];

			$datosC = array("id"=>$_POST["nota_id"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"], "fecha_r"=>$_POST["fecha_r"], "nota_regular"=>$_POST["notar"]);

			$resultado = MateriasM::CambiarCaliDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}
	
  public function CambiarNotasDC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_s";

			$libreta = $_POST["libreta"];
			
			$id_promo = $_POST["id_promo"];
			
			$id_comision = $_POST["id_comision"];
			
			$id_materia = $_POST["id_materia"];
			
			$id_carrera = $_POST["id_carrera"];

			$datosC = array("id"=>$_POST["nota_id"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"], "fecha_r"=>$_POST["fecha_r"], "nota_regular"=>$_POST["notar"]);

			$resultado = MateriasM::CambiarCaliDM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Promo-Estudiantes/'.$id_comision.'";
					</script>';

			}

		}

	}

	
	
	

//////////////////////////////

	public function CambiarNota1nC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_n";

			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"]);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examen/'.$id_examen.'";
					</script>';

			}

		}

	}

	public function CambiarNota1iC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_i";

			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"]);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examen/'.$id_examen.'";
					</script>';

			}

		}

	}

	public function CambiarNota1sC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_s";

			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"]);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examen/'.$id_examen.'";
					</script>';

			}

		}

	}

	public function CambiarNota1cC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_c";

			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$_POST["estado"]);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examen/'.$id_examen.'";
					</script>';

			}

		}

	}


//////////////////////////////////////////////////


	public function CambiarNota1LnC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_n";
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }
            
			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$estado1);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examenl/'.$id_examen.'";
					</script>';

			}

		}

	}
	public function CambiarNota1LsC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_s";
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }
            
			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$estado1);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examenl/'.$id_examen.'";
					</script>';

			}

		}

	}
	public function CambiarNota1LiC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_i";
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }
            
			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$estado1);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examenl/'.$id_examen.'";
					</script>';

			}

		}

	}
	public function CambiarNota1LcC(){

		if(isset($_POST["id_alumno"])){

			$tablaBD = "notas_c";
            $estado1="";
            if ($_POST["estado_final"]="Aprobado"){
                $estado1="Libre";
            }
            
			$libreta = $_POST["libreta"];
			$id_examen = $_POST["id_examen"];
			$id_materia= $_POST["id_materia"];

			$datosC = array("id"=>$_POST["nota_id"], "fecha"=>$_POST["fecha"], "profesor"=>$_POST["profesor"], "estado_final"=>$_POST["estado_final"], "nota_final"=>$_POST["nota_final"], "folio"=>$_POST["folio"], "libro"=>$_POST["libro"], "estado"=>$estado1);

			$resultado = MateriasM::CambiarNota1M($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

					window.location = "http://localhost/tobar2/Vistas/Modulos/Inscriptos-examenl/'.$id_examen.'";
					</script>';

			}

		}

	}
	
	
////////////////////

	public function InscribirMateriaC(){
	    
		if(isset($_POST["id_alumno"])){
		
			$tablaBD = "insc_materias";
			
			//if ($_POST["id_comision"]==89 || $_POST["id_comision"]==80){
			    
			//    $comision=52;
			    
			//}else if ($_POST["id_comision"]==110 || $_POST["id_comision"]==15 ){
			    
			//    $comision=61;
			    
			//} else if ($_POST["id_comision"]==90 || $_POST["id_comision"]==14 ){
			    
			//    $comision=62;
			    
			//}else if ($_POST["id_comision"]==111 || $_POST["id_comision"]==81){
			    
			//    $comision=101;
			    
			//}else if ($_POST["id_comision"]==2 || $_POST["id_comision"]==82){
			    
			//    $comision=91;
			    
			//}else if ($_POST["id_comision"]==3 || $_POST["id_comision"]==16){
			    
			//    $comision=73;
			    
			//}else if ($_POST["id_comision"]==4 || $_POST["id_comision"]==83){
			    
			//    $comision=102;
			    
			//}else if ($_POST["id_comision"]==5 || $_POST["id_comision"]==18){
			    
			//    $comision=55;
			    
			//}else if ($_POST["id_comision"]==6 || $_POST["id_comision"]==84){
			    
			//    $comision=103;
			    
			//}else if ($_POST["id_comision"]==7 || $_POST["id_comision"]==17){
			    
			//    $comision=56;
			    
			//}else if ($_POST["id_comision"]==8 || $_POST["id_comision"]==85){
			    
			//    $comision=57;
			    
			//}else if ($_POST["id_comision"]==9 || $_POST["id_comision"]==19){
			    
			//    $comision=67;
			    
			//}else if ($_POST["id_comision"]==12 || $_POST["id_comision"]==88){
			    
			//    $comision=60;
			    
			// }else if ($_POST["id_comision"]==13 || $_POST["id_comision"]==20){
			    
			//    $comision=108;
			    
			//}else {
			        
			    $comision=$_POST["id_comision"];
			
			//}
			
			
			$datosC = array("id_alumno"=>$_POST["id_alumno"], "id_materia"=>$_POST["id_materia"], "id_comision"=>$comision, "apellido"=>$_POST["apellido"], "orden"=>$_POST["orden"]);
			
			$resultado = MateriasM::InscribirMateriaM($tablaBD, $datosC);

			if($resultado == true){

			 echo '<script>
			    	window.location = "http://localhost/tobar2/Vistas/Modulos/Materias";
			       </script>';

			}

		}

	}

	public function InscribirMateriaC2(){
	    
		if(isset($_POST["id_alumno"])){
		
			$tablaBD = "insc_materias";

		    $comision=$_POST["id_comision"];
		    
		    $carre=$_POST["id_carrera"];
		    
		    $alu=$_POST["id_alumno"];

			$datosC = array("id_alumno"=>$_POST["id_alumno"], "id_materia"=>$_POST["id_materia"], "id_comision"=>$comision, "apellido"=>$_POST["apellido"], "orden"=>$_POST["orden"]);
			
			$resultado = MateriasM::InscribirMateriaM2($tablaBD, $datosC);

			if($resultado == true){

			 echo '<script>
			    	window.location = "http://localhost/tobar2/Vistas/Modulos/Materias2/'.$carre.'/'.$alu.'";
			       </script>';

			}

		}

	}


	public function InscribirMateria1C(){
	    
	    $columna="id";
		
		$valor = $_POST["alumno"];

        $usuarion = UsuariosC::VerUsuariosC($columna, $valor);
                
		$apellido=$usuarion["apellido"];

		if(isset($_POST["alumno"])){
		    
		    $comision=$_POST["id_comision"];
		    
		    $materia=$_POST["id_materia"];
		    
			$tablaBD = "insc_materias";
		
			$datosC = array("id_alumno"=>$_POST["alumno"], "id_materia"=>$_POST["id_materia"], "id_comision"=>$_POST["id_comision"],"apellido"=>$apellido);
			
			// ,"apellido"=>$_POST["apellido"]
			
			$resultado = MateriasM::InscribirMateria1M($tablaBD, $datosC);

			if($resultado == true){

			 echo '<script>
			    	window.location = "http://localhost/tobar2/Vistas/Modulos/Comision-Estudiantes/'.$comision.'/'.$materia.'";
			       </script>';

			}

		}

	}

	static public function VerInscMateriasC($columna, $valor){

		$tablaBD = "insc_materias";

		$resultado = MateriasM::VerInscMateriasM($tablaBD, $columna, $valor);

		return $resultado;

	}


    static public function VerInscMaterias2C($columna, $valor){

		$tablaBD = "insc_materias";

		$resultado = MateriasM::VerInscMaterias2M($tablaBD, $columna, $valor);

		return $resultado;

	}

    static public function Cambiar1461C($columna, $valor){

		$resultado = MateriasM::Cambiar1461M($columna, $valor);

		return $resultado;

	}
	
    static public function Cambiar1471C($columna, $valor){

		$tablaBD = "insc_materias";

		$resultado = MateriasM::Cambiar1471M($tablaBD, $columna, $valor);

		return $resultado;

	}
	

	public function BorrarInscMC(){
		$exp = explode("/", $_GET["url"]);
		$id = $exp[3];
		if(isset($id)){
			$tablaBD = "insc_materias";
			$resultado = MateriasM::BorrarInscMM($tablaBD, $id);
			if($resultado == true){
				echo '<script>
					window.location = "http://localhost/tobar2/Vistas/Modulos/Materias";
					</script>';
			}
		}
	}


	public function BorrarInscMC2(){
	    
		$exp = explode("/", $_GET["url"]);
		
		$id_materia =$exp[2];
		
		$id = $exp[3];
		
		if(isset($id)){
		
			$tablaBD = "insc_materias";
		
			$resultado = MateriasM::BorrarInscMM2($tablaBD, $id, $id_materia);
		
			if($resultado == true){
		
				echo '<script>
		
					window.location = "http://localhost/tobar2/Vistas/Modulos/Materias2/'.$exp[1].'/'.$exp[3].'";
		
					</script>';
		
			}
		
		}
	
	}
	
	public function BorrarEquipoC(){
	    
		$exp = explode("/", $_GET["url"]);
		
		$id =$exp[1];
		
		$id_comision = $exp[2];
		
		if(isset($id)){
		
			$tablaBD = "equipos_profes";
		
			$resultado = MateriasM::BorrarEquipoM($tablaBD, $id);
		
			if($resultado == true){
		
				echo '<script>
		
					window.location = "http://localhost/tobar2/Vistas/Modulos/ver-comision/'.$exp[2].'";
		
					</script>';
		
			}
		
		}
	
	}
	
	public function CambiarediC(){
	    
		$exp = explode("/", $_GET["url"]);
		
		$id =$exp[1];
		
		$enviado = $exp[2];
		
		if(isset($id)){
		
			$tablaBD = "comisiones";
		
			$resultado = MateriasM::CambiarediM($tablaBD, $id, $enviado);
		
			if($resultado == true){
		
				echo '<script>
		
					window.location = "http://localhost/tobar2/Vistas/Modulos/ver-comision/'.$exp[1].'";
		
					</script>';
		
			}
		
		}
	
	}
	
	public function BorrarInsc1MC(){
		
		if(isset($_GET["Uid"])){

			$tablaBD = "insc_materias";
			
			$id = $_GET["Uid"];
		
			$resultado = MateriasM::BorrarInsc1MM($tablaBD, $id);
			
			if($resultado == true){
				echo '<script>
					window.location = "http://localhost/tobar2/Vistas/Modulos/Comision-Estudiantes/";
					</script>';
			}
		}
	}
	

	public function VaciarRegistrosMateriasC(){
		if(isset($_POST["E"])){
			$tablaBD = "insc_materias";
			$resultado = MateriasM::VaciarRegistrosMateriasM($tablaBD);
			if($resultado == true){
				echo '<script>
					window.location = "http://localhost/tobar2/Vistas/Modulos/Carreras";
					</script>';
			}
		}
	}

	public function VaciarRegistrosExamenesC(){
		if(isset($_POST["EE"])){
			$tablaBD = "insc_examenes";
			$resultado = MateriasM::VaciarRegistrosExamenesM($tablaBD);
			if($resultado == true){
				echo '<script>
					window.location = "http://localhost/tobar2/Vistas/Modulos/Examenes";
					</script>';
			}
		}
	}


}
