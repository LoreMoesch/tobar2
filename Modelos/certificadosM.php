<?php

require_once "ConexionBD.php";

class CertificadosM extends ConexionBD{

	static public function PedirCertificadosM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (id_alumno, estado, tipo, f_pedido, codigo, f_vence, auto, nro) VALUES (:id_alumno, :estado, :tipo, :f_pedido, :codigo, :f_vence, :auto, :nro )");

		$pdo -> bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
		$pdo -> bindParam(":codigo", $datosC["codigo"], PDO::PARAM_INT);
		$pdo -> bindParam(":auto", $datosC["auto"], PDO::PARAM_INT);
		$pdo -> bindParam(":nro", $datosC["nro"], PDO::PARAM_INT);
		$pdo -> bindParam(":f_pedido", $datosC["f_pedido"], PDO::PARAM_STR);
		$pdo -> bindParam(":f_vence", $datosC["f_vence"], PDO::PARAM_STR);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
		$pdo -> bindParam(":tipo", $datosC["tipo"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}
	
	static public function PresenteM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, fecha_hora, fecha, hora, fk_profe, flag_s) VALUES (:nombre, :fecha_hora, :fecha, :hora, :fk_profe, :flag_s)");

		$pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
		$pdo -> bindParam(":fecha_hora", $datosC["fecha_hora"], PDO::PARAM_STR);
		$pdo -> bindParam(":fk_profe", $datosC["fk_profe"], PDO::PARAM_INT);
		$pdo -> bindParam(":flag_s", $datosC["flag_s"], PDO::PARAM_INT);
        $pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function VerCertificadosAM($tablaBD, $valor){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

			$pdo -> bindParam(":id", $valor, PDO::PARAM_INT);

			$pdo -> execute();

			return $pdo -> fetch();

	

		$pdo -> close();
		$pdo = null;

	}



	static public function VerCertificadosM($tablaBD, $columna, $valor){

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
	
	static public function EliminarPresenteM($tablaBD, $id){

		//$pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");
       
        $pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET flag_s = 0 WHERE id = :id");

		$pdo -> bindParam(":id", $id, PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

	static public function VerPresentesM($tablaBD, $columna, $valor){

		if($columna == null){

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD ORDER BY fecha_hora");

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



	static public function CambiarEM($tablaBD, $datosC){

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = :estado, auto = 1 WHERE id = :id");

		$pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        //$pdo -> bindParam(":auto", $datosC["auto"], PDO::PARAM_INT);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}



}