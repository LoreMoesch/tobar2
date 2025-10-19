<?php

require_once "ConexionBD.php";

class AjustesM extends ConexionBD{



	static public function VerAjustesM($tablaBD, $columna, $valor){
		$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_INT);
		$pdo -> execute();
		return $pdo -> fetch();
		$pdo -> close();
		$pdo = null;
	}




	static public function CambiarCuatrimestreM($tablaBD, $cuatrimestre){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET cuatrimestre = :cuatrimestre WHERE id = 1");

		$pdo -> bindParam(":cuatrimestre", $cuatrimestre, PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}




	static public function ActualizarAjustesM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET 1_fecha_inicio = :1_fecha_inicio, 1_fecha_fin = :1_fecha_fin, 2_fecha_inicio = :2_fecha_inicio, 2_fecha_fin = :2_fecha_fin, 1examenes_i = :1examenes_i, 1examenes_f = :1examenes_f, 2examenes_i = :2examenes_i, 2examenes_f = :2examenes_f, materias_i = :materias_i, materias_f = :materias_f WHERE id = 1");

		$pdo -> bindParam(":1_fecha_inicio", $datosC["1_fecha_inicio"], PDO::PARAM_STR);
		$pdo -> bindParam(":1_fecha_fin", $datosC["1_fecha_fin"], PDO::PARAM_STR);
		$pdo -> bindParam(":2_fecha_inicio", $datosC["2_fecha_inicio"], PDO::PARAM_STR);
		$pdo -> bindParam(":2_fecha_fin", $datosC["2_fecha_fin"], PDO::PARAM_STR);
		$pdo -> bindParam(":1examenes_i", $datosC["1examenes_i"], PDO::PARAM_STR);
		$pdo -> bindParam(":1examenes_f", $datosC["1examenes_f"], PDO::PARAM_STR);
		$pdo -> bindParam(":2examenes_i", $datosC["2examenes_i"], PDO::PARAM_STR);
		$pdo -> bindParam(":2examenes_f", $datosC["2examenes_f"], PDO::PARAM_STR);
		$pdo -> bindParam(":materias_i", $datosC["materias_i"], PDO::PARAM_STR);
		$pdo -> bindParam(":materias_f", $datosC["materias_f"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function HMM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET h_materias = :h_materias WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":h_materias", $datosC["h_materias"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}

	static public function HMMM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET mto = :mto WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":mto", $datosC["mto"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	static public function DMMM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET mto = :mto WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":mto", $datosC["mto"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}

	static public function HCM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET h_ccarrera = :h_ccarrera WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":h_ccarrera", $datosC["h_ccarrera"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	
	static public function DCM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET h_ccarrera = :h_ccarrera WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":h_ccarrera", $datosC["h_ccarrera"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}

	static public function HEM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET h_examenes = :h_examenes WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":h_examenes", $datosC["h_examenes"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	
		static public function VTMM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET exa_estado = :Exa_es WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":Exa_es", $datosC["Exa_es"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}
	
		static public function VAMM($datosC, $tablaBD){
		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET exa_estado = :Exa_act WHERE id = :id");
		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":Exa_act", $datosC["Exa_act"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}
		$pdo -> close();
		$pdo = null;
	}	

}
