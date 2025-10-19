<?php

require_once "ConexionBD.php";

class ExamenesM extends ConexionBD{

	static public function CrearExamenM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_carrera, id_materia, estado, aula, profesor, hora, fecha) VALUES (:id_carrera, :id_materia, :estado, :aula, :profesor, :hora, :fecha)");

		$pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":aula", $datosC["aula"], PDO::PARAM_STR);
		$pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);

		if($pdo->execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function VerExamenesPorOrdenM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT DISTINCT id_comision, hora FROM $tablaBD WHERE $columna = :$columna and comun = 1");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
		
		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	static public function VerExamenesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id_comision");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}


	static public function VerExamenesllM($tablaBD, $columna, $valor){


		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY hora, fecha");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

     	return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}
	
	static public function VerExamenesllaM($tablaBD){


		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY orden_dia,nombre");

		$pdo -> execute();

     	return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}	


	static public function VerExamenes1M($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetchAll();
		

		$pdo -> close();
		$pdo = null;

	}

	static public function VerExamenes133M($tablaBD, $columna, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna AND estado = 1");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetchAll();
		

		$pdo -> close();
		$pdo = null;

	}



	static public function VerExamenes2M($tablaBD, $columna1, $columna2, $columna3, $valor1, $valor2, $valor3){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna1 = :$columna1 AND $columna2 = :$columna2  AND $columna3 = :$columna3 AND estado = 1" );

			$pdo -> bindParam(":".$columna1, $valor1, PDO::PARAM_STR);
			
			$pdo -> bindParam(":".$columna2, $valor2, PDO::PARAM_INT);

            $pdo -> bindParam(":".$columna3, $valor3, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetchAll();
		

		$pdo -> close();
		$pdo = null;

	}

	static public function VerExamenes322M($tablaBD, $columna1, $columna2, $columna3, $valor1, $valor2, $valor3){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna1 = :$columna1 AND $columna2 = :$columna2  AND $columna3 = :$columna3 AND estado = 1" );

			$pdo -> bindParam(":".$columna1, $valor1, PDO::PARAM_STR);
			
			$pdo -> bindParam(":".$columna2, $valor2, PDO::PARAM_INT);

            $pdo -> bindParam(":".$columna3, $valor3, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetchAll();
		

		$pdo -> close();
		$pdo = null;

	}

	static public function VerExamenes22M($tablaBD, $columna1, $columna2, $valor1, $valor2){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna1 = :$columna1 AND $columna2 = :$columna2 AND estado = 1" );

			$pdo -> bindParam(":".$columna1, $valor1, PDO::PARAM_STR);
			
			$pdo -> bindParam(":".$columna2, $valor2, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetchAll();
		

		$pdo -> close();
		$pdo = null;

	}



	static public function InscribirseExamenM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_examen, libreta, id_materia, apellido, condicion, fecha_insc, llamado) VALUES (:id_alumno, :id_examen, :libreta, :id_materia, :apellido, :condicion, :fecha_insc, :nro_llamado)");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);

		$pdo -> bindParam(":id_examen", $datosC["id_examen"], PDO::PARAM_INT);

		$pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);

		$pdo -> bindParam(":condicion", $datosC["condicion"], PDO::PARAM_STR);

		$pdo -> bindParam(":fecha_insc", $datosC["fecha_insc"], PDO::PARAM_STR);

		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":nro_llamado", $datosC["nro_llamado"], PDO::PARAM_INT);

        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);

		if($pdo->execute()){

			return true;

		}

		$pdo -> close();

		$pdo = null;

	}

	static public function VerInscExamenliM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna and condicion = 'Libre' ORDER BY apellido");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
	
	static public function VerInscExamenM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
	
	static public function VerInscExamen2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
	
	

	static public function VerInscExamentodosM($tablaBD){

	$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id");

			$pdo -> execute();

			return $pdo -> fetchAll();

	}
	

	static public function BorrarInscEM($tablaBD, $id){
	
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
	
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
	
		if($pdo -> execute()){
	
			return true;
	
		}
	
		$pdo -> close();
	
		$pdo = null;
	
	  	}

	static public function VerIncrExaIDM($tablaBD, $id){


		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id",$id, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	static public function DECM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado =0 WHERE id = :id_e");
//		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_e", $datosC["id_e"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	
	static public function ActualizarExamenesM($tablaBD, $datosC){

//		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado, fecha_r = :fecha_r, nota_regular = :nota_regular, libro = :libro, folio = :folio WHERE id = :id");

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET nro_llamado = :nro_llamado, estado = :estado, profesor= :profesor, id_profe= :idprofe, fecha= :fecha , llamado= :llamado, orden= :orden, id_comision= :comision, tipo= :tipo WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":idprofe", $datosC["idprofe"], PDO::PARAM_INT);
		$pdo -> bindParam(":nro_llamado", $datosC["nro_llamado"], PDO::PARAM_INT);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":llamado", $datosC["llamado"], PDO::PARAM_STR);
		$pdo -> bindParam(":orden", $datosC["orden"], PDO::PARAM_STR);
		$pdo -> bindParam(":comision", $datosC["comision"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
	
	static public function VerTurnoM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id");

		$pdo -> execute();

     	return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}
	
	static public function VerTurnoAM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE estado=1 ORDER BY id");

		$pdo -> execute();

     	return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}
	
	static public function VerTurnosM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetch();

		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ActualizarTurnosM($tablaBD, $datosC){


//		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado, profesor= :profesor, id_profe= :idprofe, fecha= :fecha , llamado= :llamado, orden= :orden, id_comision= :comision, tipo= :tipo WHERE id = :id");

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");


		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
//		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
//		$pdo -> bindParam(":idprofe", $datosC["idprofe"], PDO::PARAM_INT);
//		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PA//RAM_STR);
//		$pdo -> bindParam(":llamado", $datosC["llamado"], PDO::PARAM_STR);
//		$pdo -> bindParam(":orden", $datosC["orden"], PDO::PARAM_STR);
//		$pdo -> bindParam(":comision", $datosC["comision"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
//		$pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}




}
