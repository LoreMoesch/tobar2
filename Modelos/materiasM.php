<?php

require_once "ConexionBD.php";

class MateriasM extends ConexionBD{

	static public function CrearMateriaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre, grado, tipo, programa) VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :programa)");

		$pdo -> bindParam("id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam("codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam("grado", $datosC["grado"], PDO::PARAM_STR);
		$pdo -> bindParam("tipo", $datosC["tipo"], PDO::PARAM_STR);
		$pdo -> bindParam("programa", $datosC["programa"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function VerEquiposM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY id_usuarios");
		
		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}

	static public function VerRegimenM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}

	static public function VerRegimenM1($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY id_materia");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}



	static public function VerMateriasM($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY grado, codigo ASC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
	

		public function VerMaterias4M($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY grado, codigo ASC");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
	
		static public function VerMaterias5M($tablaBD){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY anio, nombre");

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}
	
		static public function VerMaterias6M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();
		
		return $pdo -> fetch();

		$pdo -> close();
		
		$pdo = null;

	}
	
	
	static public function VerMaterias1M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
 
        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		
		$pdo = null;

	}


	
		static public function VerMaterias3M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY grado, codigo ASC");
 
        $pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();
		
		$pdo -> close();
		
		$pdo = null;

	}

	static public function VerMaterias2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY codigo ASC");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}


	static public function EliminarMateriaM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function CrearComisionM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_materia, c_maxima, numero, dias, horario, id_usuario) VALUES (:id_materia, :c_maxima, :numero, :dias, :horario, :id_usuario)");

		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":c_maxima", $datosC["c_maxima"], PDO::PARAM_INT);
		$pdo -> bindParam(":numero", $datosC["numero"], PDO::PARAM_INT);
		$pdo -> bindParam(":dias", $datosC["dias"], PDO::PARAM_STR);
		$pdo -> bindParam(":horario", $datosC["horario"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function CrearEquipoM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_usuarios, notas, id_comision) VALUES (:id_usuarios, :notas, :id_comision)");

		$pdo -> bindParam(":id_usuarios", $datosC["id_usuarios"], PDO::PARAM_INT);
		$pdo -> bindParam(":notas", $datosC["notas"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);
		//$pdo -> bindParam(":dias", $datosC["dias"], PDO::PARAM_STR);
		//$pdo -> bindParam(":horario", $datosC["horario"], PDO::PARAM_STR);
		//$pdo -> bindParam(":id_usuario", $datosC["id_usuario"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function VerComisionesM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY numero ASC");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();
		$pdo = null;

	}


	static public function VerComisiones2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function BorrarComisionM($tablaBD, $id){

		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo-> close();
		$pdo = null;

	}

	static public function ColocarNota1M($tablaBD, $datosC1){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia) VALUES (:id_alumno, :id_materia)");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		//$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
		//$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		//$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		//$pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
		//$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ColocarNotaDM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, libreta, id_materia, estado, profesor, fecha_r, nota_regular, comisionc, matec, folio, libro, llamado ) VALUES (:id_alumno, :libreta, :id_materia, :estado, :profesor, :fecha_r, :nota_regular, :comision, :comun, :folio, :libro, :llamado)");

		$pdo -> bindParam(":comun", $datosC["comun"], PDO::PARAM_INT);
		$pdo -> bindParam(":comision", $datosC["comision"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":llamado", $datosC["llamado"], PDO::PARAM_INT);
		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_r", $datosC["fecha_r"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_regular", $datosC["nota_regular"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":folio", $datosC["folio"], PDO::PARAM_STR);
        $pdo -> bindParam(":libro", $datosC["libro"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function ColocarNotaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, libreta, id_materia, estado, nota_regular, nota_final, fecha_r, profesor, estado_final, profesor_final, fecha, llamado, comisionc, folio, libro ) VALUES (:id_alumno, :libreta, :id_materia, :estado, :nota_regular, :nota_final, :fecha_r, :profesor, :estado_final, :profesor_final, :fecha, :llamado, :comision, :folio, :libro); INSERT INTO `auditorias_notas` (`id`,`id_notas`, `usuario`, `proceso`, `nota_anterior`, `nota_nueva`, `estado_anterior`, `estado_nuevo`, `comision_anterior`, `comision_nueva`, `estadof_anterior`, `estadof_nuevo`, `notaf_anterior`, `notaf_nueva`, `fecha`, `hora`, `id_alumno`, `nomyape`, `llamado_anterior`, `llamado_nuevo`,`id_carrera`) VALUES (NULL,NULL,:usuario ,:proceso ,NULL ,:nota_regular ,NULL ,:estado ,NULL ,:comision ,NULL ,:estado_final ,NULL ,:nota_final ,:fechaa ,:hora ,:id_alumno, :nomyape ,:llamado ,NULL,:id_carrera);");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_r", $datosC["fecha_r"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_regular", $datosC["nota_regular"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado_final", $datosC["estado_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor_final", $datosC["profesor_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":llamado", $datosC["llamado"], PDO::PARAM_INT);
        $pdo -> bindParam(":folio", $datosC["folio"], PDO::PARAM_STR);
        $pdo -> bindParam(":libro", $datosC["libro"], PDO::PARAM_STR);
        $pdo -> bindParam(":comision", $datosC["comision"], PDO::PARAM_INT);
        $pdo -> bindParam(":fechaa", $datosC["fechaa"], PDO::PARAM_STR);
		$pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo -> bindParam(":usuario", $datosC["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":proceso", $datosC["proceso"], PDO::PARAM_STR);
		$pdo -> bindParam(":nomyape", $datosC["nomyape"], PDO::PARAM_STR);
        $pdo -> bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
    
    static public function ColocarNotaLM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, libreta, id_materia, estado_final, nota_final, libro, folio, profesor, fecha, estado) VALUES (:id_alumno, :libreta, :id_materia, :estado_final, :nota_final, :libro, :folio, :profesor, :fecha, :estado)");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":libreta", $datosC["libreta"], PDO::PARAM_STR);
    	$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado_final", $datosC["estado_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":libro", $datosC["libro"], PDO::PARAM_STR);
		$pdo -> bindParam(":folio", $datosC["folio"], PDO::PARAM_STR);
		
		//$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

//// para las 4 orientaciones /////////////

	static public function VerNotasM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}

	static public function VerNotasiM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}

	static public function VerNotassM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}
	static public function VerNotascM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}
	static public function VerNotasnM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo -> close();

		$pdo = null;

	}

//// para las 4 orientaciones /////////////

	static public function VerNotasAM($tablaBD, $columna, $valor){


				$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

				$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

				$pdo -> execute();

				return $pdo -> fetchAll();


			$pdo -> close();
			$pdo = null;

		}


	static public function VerNotas2M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo -> close();
		$pdo = null;

	}



	static public function CambiarNotaM($tablaBD, $datosC, $datosB){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado, estado_final = :estado_final, fecha = :fecha, profesor = :profesor, nota_final = :nota_final, nota_regular = :nota_regular, llamado = :llamado, folio = :folio, libro = :libro, fecha_r = :fecha_r, profesor_final = :profesor_final, comisionc = :comision WHERE id = :id; INSERT INTO `auditorias_notas` (`id`,`id_notas`, `usuario`, `proceso`, `nota_anterior`, `nota_nueva`, `estado_anterior`, `estado_nuevo`, `comision_anterior`, `comision_nueva`, `estadof_anterior`, `estadof_nuevo`, `notaf_anterior`, `notaf_nueva`, `fecha`, `hora`, `id_alumno`, `nomyape`, `llamado_anterior`, `llamado_nuevo`, `id_carrera`) VALUES (NULL,:id,:usuario ,:proceso ,:nota_anterior ,:nota_regular ,:estado_anterior ,:estado ,:comision_anterior ,:comision ,:estadof_anterior ,:estado_final ,:notaf_anterior ,:nota_final ,:fechaa ,:hora ,:id_alumno, :nomyape ,:llamadoreg ,:llamadod ,:id_carrera);");


		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado_final", $datosC["estado_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
        $pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
        $pdo -> bindParam(":nota_regular", $datosC["nota_regular"], PDO::PARAM_STR);
        $pdo -> bindParam(":llamado", $datosC["llamado"], PDO::PARAM_INT);
        $pdo -> bindParam(":folio", $datosC["folio"], PDO::PARAM_STR);
        $pdo -> bindParam(":comision", $datosC["comision"], PDO::PARAM_STR);
        $pdo -> bindParam(":libro", $datosC["libro"], PDO::PARAM_STR);
        $pdo -> bindParam(":profesor_final", $datosC["profesor_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_r", $datosC["fecha_r"], PDO::PARAM_STR);
		
		$pdo -> bindParam(":usuario", $datosB["usuario"], PDO::PARAM_STR);
		$pdo -> bindParam(":proceso", $datosB["proceso"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_anterior", $datosB["nota_anterior"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado_anterior", $datosB["estado_anterior"], PDO::PARAM_STR);
		$pdo -> bindParam(":comision_anterior", $datosB["comision_anterior"], PDO::PARAM_INT);
        $pdo -> bindParam(":estadof_anterior", $datosB["estadof_anterior"], PDO::PARAM_STR);
		$pdo -> bindParam(":notaf_anterior", $datosB["notaf_anterior"], PDO::PARAM_STR);
		$pdo -> bindParam(":fechaa", $datosB["fechaa"], PDO::PARAM_STR);
		$pdo -> bindParam(":hora", $datosB["hora"], PDO::PARAM_STR);
		$pdo -> bindParam(":nomyape", $datosB["nomyape"], PDO::PARAM_STR);
		$pdo -> bindParam(":id_alumno", $datosB["id_alumno"], PDO::PARAM_STR);
		$pdo -> bindParam(":llamadoreg", $datosB["llamadoreg"], PDO::PARAM_INT);
		$pdo -> bindParam(":llamadod", $datosB["llamadod"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_carrera", $datosB["id_carrera"], PDO::PARAM_INT);
		
		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
	
		static public function CambiarCaliDM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado, fecha_r = :fecha_r, nota_regular = :nota_regular, libro = :libro, folio = :folio WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		//$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_r", $datosC["fecha_r"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_regular", $datosC["nota_regular"], PDO::PARAM_STR);
		$pdo -> bindParam(":libro", $datosC["libro"], PDO::PARAM_STR);
		$pdo -> bindParam(":folio", $datosC["folio"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function CambiarNota1M($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET fecha = :fecha, profesor = :profesor, estado_final = :estado_final, nota_final = :nota_final, folio = :folio, libro = :libro, estado = :estado WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":libro", $datosC["libro"], PDO::PARAM_STR);
        $pdo -> bindParam(":folio", $datosC["folio"], PDO::PARAM_STR);
		$pdo -> bindParam(":profesor", $datosC["profesor"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado_final", $datosC["estado_final"], PDO::PARAM_STR);
		$pdo -> bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function InscribirMateriaM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia, id_comision, apellido, orden) VALUES (:id_alumno, :id_materia, :id_comision, :apellido, :orden)");

		$pdo -> bindParam(":orden", $datosC["orden"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        
		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function InscribirMateriaM2($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia, id_comision, apellido, orden) VALUES (:id_alumno, :id_materia, :id_comision, :apellido, :orden)");

		$pdo -> bindParam(":orden", $datosC["orden"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        
		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function InscribirMateria1M($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia, id_comision, apellido) VALUES (:id_alumno, :id_materia, :id_comision, :apellido)");

        //, apellido
        //, :apellido

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
		$pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        
		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}


	static public function VerInscMateriasM($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna ORDER BY apellido");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo->close();
		$pdo = null;

	}


	static public function VerInscMaterias2M($tablaBD, $columna, $valor){
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo->close();
		$pdo = null;
	}

	static public function Cambiar1461M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_materia = 109 WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo->close();

		$pdo = null;

	}

	static public function Cambiar1471M($tablaBD, $columna, $valor){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET id_materia = 111 WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo->close();

		$pdo = null;

	}


	static public function BorrarInscMM($tablaBD, $id){
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}

	static public function BorrarInscMM2($tablaBD, $id, $id_materia){
	    
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id_alumno = :id and id_materia = :id_materia ");
		
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		$pdo -> bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
		
		if($pdo -> execute()){
		
			return true;
		
		}
		
		$pdo -> close();
		
		$pdo = null;
	
	}

	static public function BorrarEquipoM($tablaBD, $id){
	    
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id ");
		
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		
		if($pdo -> execute()){
		
			return true;
		
		}
		
		$pdo -> close();
		
		$pdo = null;
	
	}
	

	static public function CambiarediM($tablaBD, $id, $enviado){
	    
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET enviado = :enviado WHERE id = :id");
		
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		
		$pdo -> bindParam(":enviado", $enviado, PDO::PARAM_INT);
		
		if($pdo -> execute()){
		
			return true;
		
		}
		
		$pdo -> close();
		
		$pdo = null;
	
	}



	static public function BorrarInsc1MM($tablaBD, $id){
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	
	static public function VaciarRegistrosMateriasM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD");
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}

	static public function VaciarRegistrosExamenesM($tablaBD){
		$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD");
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	
    static public function ENM($datosC, $tablaBD){
		
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET enviado = 1 WHERE id = :id_comision");
		
		$pdo -> bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);
		
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
}
