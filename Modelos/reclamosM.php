<?php

require_once "ConexionBD.php";

class ReclamosM extends ConexionBD{

	static public function HacerReclamosM($tablaBD, $datosC){

		//$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, reclamo, activo, area, fecha_r, hora_r, contacto, estado) VALUES (:id_alumno, :reclamo, :activo, :area, :fecha_r, :hora_r, :contacto, :estado )");
        $pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, reclamo, activo, area, fecha_r, hora_r, contacto, estado) VALUES (:id_alumno, :reclamo, :activo, :area, :fecha_r, :hora_r, :contacto, :estado)");
		
		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":reclamo", $datosC["reclamo"], PDO::PARAM_STR);
		$pdo -> bindParam(":activo", $datosC["activo"], PDO::PARAM_INT);
		$pdo -> bindParam(":area", $datosC["area"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_r", $datosC["fecha_r"], PDO::PARAM_STR);
		$pdo -> bindParam(":hora_r", $datosC["hora_r"], PDO::PARAM_STR);
		$pdo -> bindParam(":contacto", $datosC["contacto"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		
		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



	static public function VerReclamosM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD");

			$pdo -> execute();

			return $pdo -> fetchAll();

		}else{

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

			$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

			$pdo -> execute();

			return $pdo -> fetchAll();

		}

		$pdo -> close();
		$pdo = null;

	}
static public function CambiarRM($tablaBD, $datosC){
	$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado WHERE id = :id");
	$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
	$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
	$pdo -> close();
	$pdo = null;
}

static public function BorrarRM($tablaBD, $datosC){
	$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
	$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		if($pdo -> execute()){
			return true;
		}
	$pdo -> close();
	$pdo = null;
}




}